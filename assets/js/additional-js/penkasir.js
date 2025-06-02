let datid = "";
var discval = 0;
let rowIdCounter = 0;
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
    let lastSelected = null;
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
        discval = data.diskon;
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
                let groups = {}, results = [];

                data.forEach(item => {
                    let groupName = item.nama_katalog + ' - ' + item.tipe;
                    if (!groups[groupName]) groups[groupName] = [];
                    groups[groupName].push({
                        id: item.id_katalog_dtl,
                        text: item.nama_katalog + ' - (' + item.size + ')'
                    });
                });

                Object.keys(groups).forEach(groupName => {
                    results.push({
                        text: groupName,
                        children: groups[groupName]
                    });
                });

                return { results };
            },
            cache: false,
        }
    })
    .on('select2:select', function(e) {
        let selectedValue = e.params.data.id;
        loadKatalogData(selectedValue);
        $(this).val(null).trigger('change');
    })
    .on('select2:close', function() {
        let currentVal = $('#selkat').val();
        if (currentVal && currentVal === lastSelected) {
            loadKatalogData(currentVal); // manually re-load if same selected
        }
    });

    $('#list-order').on('click', 'i.icon-trash', function() {
        $(this).closest('tr').remove();
        // calculateFinal();
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
function loadKatalogData(selectedValue) {
    $.ajax({
        type: 'GET',
        url: base_url + 'PenKasir/loadkatalog/' + selectedValue,
        dataType: 'json',
        success: function(response) {
            response.forEach(function(daf) {
                let uniqueId = ++rowIdCounter;
                $('#list-order').append(`
                    <tr data-idkdl="${daf.id_katalog_dtl}" data-idkat="${daf.id_katalog}" data-harga="${daf.harga_jual}" data-uid="${uniqueId}">
                        <td>
                            <div class="product-names">
                                <div class="light-product-box">
                                    <img class="img-fluid" src="${base_url + 'assets/lvaimages/katalog/' + daf.img_katalog}" alt="katalog">
                                </div>
                                <div class="row">
                                    <div class="col-12"><strong>${daf.id_katalog} | ${daf.nama_katalog} | ${formatcurrency.format(daf.harga_jual)}</strong></div>
                                    <div class="col-12">
                                        <strong>
                                            <span class="badge rounded-pill badge-dark">${daf.warna_katalog}</span>
                                            <span class="badge rounded-pill badge-dark">${daf.size}</span>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><input class="form-control qty-input" type="number" min="1" name="qty[]" value="1" oninput="recalculateRow(this)" required /></td>
                        <td><input class="form-control diskon-input" type="number" step="0.01" min="0" max="100" name="diskon[]" value="${discval}" oninput="recalculateRow(this)" required /></td>
                        <td><input class="form-control nominal-input" type="text" name="nominal[]" value="0" oninput="recalculateRow(this)" onblur="formatNominalAfterTyping(this)" required /></td>
                        <td><input class="form-control keterangan-input" type="text" name="keterangan[]" placeholder="keterangan" required /></td>
                        <td class="total-cell" id="total-${uniqueId}">Rp 0</td>
                        <td><i class="icon-trash" style="cursor:pointer;" onclick="$(this).closest('tr').remove();"></i></td>
                    </tr>
                `);
                recalculateRow($('#list-order').find(`tr[data-uid="${uniqueId}"] input.qty-input`)[0]);
            });
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}
function recalculateRow(input) {
    let row = $(input).closest('tr');
    let harga = parseFloat(row.data('harga')) || 0;
    let qty = parseInt(row.find('.qty-input').val()) || 0;
    let diskon = parseFloat(row.find('.diskon-input').val()) || 0;
    diskon = Math.min(Math.abs(diskon), 100);

    let subtotal = qty * harga;
    let nominal = (subtotal * diskon) / 100;

    // Cap nominal if user edited it manually
    let nominalInput = row.find('.nominal-input');
    let currentNominal = parseFloat(nominalInput.val().replace(/[^0-9]/g, '')) || 0;
    if (input.classList.contains('nominal-input')) {
        // If user is changing nominal, recalc discount
        if (currentNominal > subtotal) currentNominal = subtotal;
        nominalInput.val(formatdecimal.format(currentNominal));
        diskon = Math.round((currentNominal / subtotal) * 100);
        row.find('.diskon-input').val(diskon);
        nominal = currentNominal;
    } else {
        // If user is changing qty or diskon, recalc nominal
        nominalInput.val(formatdecimal.format(nominal));
    }

    let finalTotal = subtotal - nominal;
    if (finalTotal < 0) finalTotal = 0;

    let uid = row.data('uid');
    $('#total-' + uid).text(formatcurrency.format(finalTotal));
    calculateFinal();
}
function formatNominalAfterTyping(input) {
    let raw = parseFloat(input.value.replace(/[^0-9]/g, '')) || 0;
    input.value = formatdecimal.format(raw);
}
function calculateFinal() {
    let subtotal = 0;
    let disctotal = 0;

    $('#list-order tr').each(function() {
        let row = $(this);
        let qty = parseInt(row.find('.qty-input').val()) || 0;
        let harga = parseFloat(row.data('harga')) || 0;
        let diskon = parseFloat(row.find('.nominal-input').val().replace(/[^0-9]/g, '')) || 0;
        let subtotalRow = qty * harga;
        subtotal += subtotalRow;
        disctotal += diskon;
    });
    $('#subtotal').text(formatcurrency.format(subtotal));
    $('#diskon').text(' - '+formatcurrency.format(disctotal));
    let grandTotal = subtotal - disctotal;
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
            // console.log(pair[0]+ ': ' + pair[1]);
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