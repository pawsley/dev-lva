let datid = "";
$(document).ready(function () {
    generateid();
    $('#duedate').val(updateDateNow(datid));
    getselect2();
    calculateFinal();
    createOrder();
});
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'PenKasir/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const newid = response.newID;

        // Set the value in the input field
        $('#ordid').val((newid !== def ? newid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function getselect2() {
    $('#seltipe').select2({
        language: 'id',
        placeholder: 'Pilih Tipe Agen',
        allowClear: true,
        ajax: {
            url: base_url + 'PenKasir/loadtipecustomer',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.diskon,
                            text: item.nama_sbc,
                        };
                    }),
                };
            },
            cache: false,
        }
    }).on('change', function(){
        calculateFinal();
    });
    $('#selkat').select2({
        language: 'id',
        placeholder: 'Produk Katalog',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'penjualan/data-katalog/';
            },
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return { q: params.term };
            },
            processResults: function(data) {
                let groups = {};
                let results = [];

                data.forEach(function(item) {
                    let groupName = item.nama_katalog + ' - ' + item.tipe;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_katalog_dtl,
                        text: item.nama_katalog + ' - (' + item.size + ')'
                    });
                });

                Object.keys(groups).forEach(function(groupName) {
                    results.push({
                        text: groupName,
                        children: groups[groupName]
                    });
                });

                return { results: results };
            },
            cache: false,
        },
    }).on('change', function() {
        let selectedValue = $(this).val();
        $.ajax({
            type: 'GET',
            url: base_url + 'PenKasir/loadkatalog/' + selectedValue,
            dataType: 'json',
            success: function(response) {
                response.forEach(function(daf) {
                    if ($('#list-order').find(`#${daf.id_katalog_dtl}`).length === 0) {
                        $('#list-order').append(`
                            <tr id="order-detail" data-idkdl="${daf.id_katalog_dtl}" data-idkat="${daf.id_katalog}">
                                <td><div class="light-product-box"><img class="img-50" src="${base_url+'assets/lvaimages/katalog/'+daf.img_katalog}" alt="katalog"></div></td>
                                <td>${daf.nama_katalog}</td>
                                <td id="dsize">${daf.size}</td>
                                <td>${formatcurrency.format(daf.harga_jual)}</td>
                                <td><input class="form-control qty-input" type="number" min="1" name="qty[]" placeholder="0" required oninput="calculateTotal(this, ${daf.harga_jual}, '${daf.id_katalog_dtl}')"/></td>
                                <td id="total-${daf.id_katalog_dtl}">Rp 0</td>
                                <td><i class="icon-trash"></i></td>
                            </tr>
                        `);
                    }
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#selcst').select2({
        language: 'id',
        placeholder: 'Pilih Customer',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'PenKasir/loadcustomer/';
            },
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return { q: params.term };
            },
            processResults: function(data) {
                let groups = {};
                let results = [];

                data.forEach(function(item) {
                    let groupName = item.tipe_cst;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_cst,
                        text: item.nama_cst,
                        wa : item.wa_cst,
                        email : item.email_cst,
                        id_sbc : item.id_sbc,
                        nama_sbc : item.tipe_cst,
                        diskon : item.diskon,
                    });
                });

                Object.keys(groups).forEach(function(groupName) {
                    results.push({
                        text: groupName,
                        children: groups[groupName]
                    });
                });

                return { results: results };
            },
            cache: false,
        },
        templateResult: function (data) {
            if (!data.id) {
                return data.text;
            }
            return getSelect2Data(data);
        }
    });
    $('#selcst').on('select2:select', function(e) {
        var data = e.params.data;
        $('#wa').val(data.wa && data.wa !== '' ? data.wa : " - ");
        $('#email').val(data.email && data.email !== '' ? data.email : " - ");
        $("#seltipe").empty().append('<option data-id="'+data.id+'" value="' +data.diskon+ '">' +data.nama_sbc+ '</option>').trigger('change.select2');
    });    
}
function getSelect2Data(data) {
    var $option = $('<span></span>');
    $option.text(data.text);
    $option.attr('data-wa', data.wa);
    $option.attr('data-email', data.email);
    $option.attr('data-id_sbc', data.id_sbc);
    $option.attr('data-nama_sbc', data.nama_sbc);
    $option.attr('data-diskon', data.diskon);
    return $option;
}
function calculateTotal(input, harga_jual, id) {
    let qty = parseInt($(input).val()) || 0;
    let subTotal = qty * harga_jual;
    $('#total-' + id).text(formatcurrency.format(subTotal));
    calculateFinal();
}
function calculateFinal() {
    let subtotal = 0;

    $('#list-order tr').each(function() {
        let totalText = $(this).find('td').eq(5).text().replace('Rp', '').replace(/\./g, '').trim();
        let total = parseFloat(totalText) || 0;
        subtotal += total;
    });

    $('#subtotal').text(formatcurrency.format(subtotal));
    var disdata = $('#seltipe').val();
    let discount = disdata !==null ? parseFloat(disdata) : 0;
    let discountAmount = (subtotal * discount) / 100;
    let grandTotal = subtotal - discountAmount;
    $('#diskon').text(' - '+formatcurrency.format(discountAmount));
    $('#grand').text(formatcurrency.format(grandTotal));
}
function createOrder() {
    $('#form-order').off('submit').on('submit', function (e) {
        e.preventDefault();
        $('#spinner_submit').removeClass('d-none');
        $('#tx_submit').addClass('d-none');
        $('#btn_submit').prop('disabled', true);

        var tableData = [];
        $('#list-order tr').each(function () {
            let id_katalog = $(this).data('idkat');
            let id_katalog_dtl = $(this).data('idkdl');
            let size = $(this).find('#dsize').text();
            let qty = $(this).find('.qty-input').val();
            let total = $(this).find('#total-'+id_katalog_dtl).text().replace(/[-Rp\s.]/g, '');
            tableData.push({
                id_katalog: id_katalog,
                id_katalog_dtl: id_katalog_dtl,
                detail_size: size,
                qty_order: qty,
                harga_jual_order: total
            });
        });
        
        
        var formData = new FormData(this);
        formData.append('order_id', $('#ordid').val());
        formData.append('orderdate', $('#duedate').val());
        formData.append('selcst', $('#selcst').val());
        formData.append('catatan', $('#txtcatatan').val());
        formData.append('predis', $('#seltipe').val());
        formData.append('nomdis', $('#diskon').text().replace(/[-Rp\s.]/g, ''));
        formData.append('sub', $('#subtotal').text().replace(/[-Rp\s.]/g, ''));
        formData.append('grand', $('#grand').text().replace(/[-Rp\s.]/g, ''));
        // details
        formData.append('table_data', JSON.stringify(tableData));
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ': ' + pair[1]);
        }
        $.ajax({
            url: base_url + 'PenKasir/createorder',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    swal("Order "+response.message, {
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                } else {
                    swal('Order '+response.message, {
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                }
            },
            complete: function () {
                $('#form-order').find('select').val('0').trigger('change.select2');
                $('#form-order').find('input, textarea').val('');
                $('#list-order').empty();

                $('#spinner_submit').addClass('d-none');
                $('#tx_submit').removeClass('d-none');
                $('#btn_submit').prop('disabled', false);
                $('#duedate').val(updateDateNow(datid));
                generateid();
                calculateTotal();
                calculateFinal();
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred while saving data.');
            }
        });
    });
}