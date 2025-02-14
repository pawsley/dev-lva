let datid = "";
var tableProduksi;
$(document).ready(function () {
    if (window.location.href === base_url+'produksi/produksi-baru') {
        dateform();
        generateid();
        getSelect2();
        addprod();
    } else if (window.location.href === base_url+'produksi/list-produksi') {
        tabkatalog();
        // $('#table-produksi').DataTable({
        //     responsive: true,
        //     processing: true,
        //     serverSide: true,
        //     order: [],
        //     ajax: {
        //         url: base_url + 'produksi/data-produksi',
        //         type: 'POST'
        //     },
        //     columnDefs: [
        //         {
        //             targets: [0, 1, 2, 3, 4, 5, 6],
        //             className: 'text-center'
        //         }
        //     ]
        // });
    }
});
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'ProdOrder/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const newid = response.newID;

        // Set the value in the input field
        $('#prdid').val((newid !== def ? newid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function getSelect2() {
    $('#selord').select2({
        language: 'id',
        placeholder: 'Order ID',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'produksi/get-data/';
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
                    let groupName = item.nama_cst;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_order,
                        text: item.id_order
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
            type: 'POST',
            url: base_url + 'produksi/get-data/',
            data: { ido : selectedValue },
            dataType: 'json',
            success: function(response) {
                $('#list-prodbaru').empty();
                response.forEach(function(daf) {
                    $('#info-stat').text(daf.status).removeClass('btn-light').addClass('btn-success')
                    $('#cst').val(daf.nama_cst)
                    $('#wa').val(daf.wa_cst)
                    $('#email').val(daf.email_cst)
                    $('#tcst').val(daf.tipe_cst)
                    if (daf.list_data_po.length > 0) {
                        daf.list_data_po.forEach(function(list) {
                            let materials = "No Material"; // Default value if no materials are found
                            if (list.list_material && list.list_material.length > 0) {
                                // Concatenate all nama_material into a single string
                                materials = list.list_material.map(material => 
                                    `${material.nama_material} | ${material.qty_material} ${material.sat_material}`
                                ).join("<br>");
                            }
                            $('#list-prodbaru').append(`
                                <tr id="idkatdl" data-idkdl="${list.id_odtl}" data-qty="${list.qty_order}">
                                    <td><div class="light-product-box"><img class="img-50" src="${base_url+'assets/lvaimages/katalog/'+list.img_katalog}" alt="katalog"></div></td>
                                    <td>${list.id_katalog+' | '+list.nama_katalog}</td>
                                    <td>${list.detail_size}</td>
                                    <td>${materials}</td>
                                    <td>${list.qty_order}</td>
                                </tr>
                            `);                            
                        });
                    }
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
}
function dateform() {
    $('#dateprod').val(updateDateNow(datid));
    $('#duedateprod').val(updateDateFinish(14));
}
function addprod() {
    $('#form-prodbaru').off('submit').on('submit', function (e) {
        e.preventDefault();
        $('#spinner_submit').removeClass('d-none');
        $('#tx_submit').addClass('d-none');
        $('#btn_submit').prop('disabled', true);
        
        let idord = $('#selord').val();
        let idprd = $('#prdid').val();
        let dateprd = $('#dateprod').val();
        let duedateprd = $('#duedateprod').val();
        let keteranganprd = $('#ketprod').val();
        let listprod = [];
        let totalQty = 0;
    
        $('#list-prodbaru tr').each(function() {
            const qty = $(this).data('qty');
            listprod.push({
                id_odtl: $(this).data('idkdl'),
                qty: $(this).data('qty')
            });
            totalQty += qty; 
        });
    
        let data = {
            noprod: idprd,
            order_id: idord,
            dateprod: dateprd,
            dateprodfinish: duedateprd,
            catatan: keteranganprd,
            totalprod: totalQty,  // Use the totalQty here
            listprod: JSON.stringify(listprod)
        };

        $.ajax({
            type: 'POST',
            url: base_url + 'produksi/add-prod/',
            data: data,
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                    swal("Produksi berhasil dibuat", {
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                } else {
                    swal(response.message, {
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                }
            },
            complete: function () {
                // Reset form fields and visual indicators after completion
                $('#form-prodbaru').find('select').val('0').trigger('change.select2');
                $('#form-prodbaru').find('input, textarea').val('');
                $('#list-prodbaru').empty();
                $('#spinner_submit').addClass('d-none');
                $('#tx_submit').removeClass('d-none');
                $('#btn_submit').prop('disabled', false);
                dateform();
                generateid();
            },
            error: function(xhr) {
                alert('An error occurred while saving data.');
            }
        });
    });    
}
function tabkatalog() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-produksi')) {
            tableProduksi.destroy();
        }
        
        tableProduksi = $("#table-produksi").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            // "order": [
            //     [0, 'asc']
            // ],
            "ajax": {
                "url": base_url + 'produksi/data-produksi',
                "type": "POST",
            },
            'rowsGroup': [0],
            "columns": [
                {
                    "data": "id_order",
                    "render": function(data, type, row) {
                        return `Customer : ${row.nama_cst}<br>PO : ${data}<br><b>Produksi : ${row.no_produksi}</b>`;
                    }
                },
                {
                    "data": "nama_katalog",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <div class="light-product-box"><img class="img-50" src="${base_url+'assets/lvaimages/katalog/'+row.img_katalog}" alt="katalog"></div>
                                <ul class="list-group list-group-horizontal mt-2">
                                    <li class="list-group-item">${row.nama_katalog}</li>
                                    <li class="list-group-item">${row.detail_size}</li>
                                </ul>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data": "tgl_produksi",
                    "render": function(data, type, row) {
                        return '<span>'+ data + '<i class="icofont icofont-arrow-right"></i>' + row.tgl_produksi_selesai+'</span>';
                    }
                },
                {
                    "data": "id",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <ul class="action">
                                        <div class="btn-group">
                                            <button class="btn btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#" 
                                            data-id="${data}"><i class="icofont icofont-ui-cut" style="color: #4a4646;"></i></button>
                                            <button class="btn btn-primary" id="delete-data" data-bs-toggle="modal" data-bs-target="#" data-id="${data}"><i class="icofont icofont-baby-cloth" style="color: #4a4646;"></i></button>
                                            <button class="btn btn-secondary" id="delete-data" data-bs-toggle="modal" data-bs-target="#" data-id="${data}"><i class="icofont icofont-ui-check"></i></button>
                                        </div>
                                    </ul>
                                `;
                        }
                        return data;
                    }
                }                
            ],
            "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                   "<'row'<'col-sm-12 col-md-2'B>>" +
                   "<'row'<'col-sm-12'tr>>" +
                   "<'row'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-8'p>>",
            "buttons": [
                {
                    "text": 'Refresh',
                    "className": 'custom-refresh-button',
                    "attr": {
                        "id": "refresh-button"
                    },
                    "init": function (api, node, config) {
                        $(node).removeClass('btn-default');
                        $(node).addClass('btn-primary');
                        $(node).attr('title', 'Refresh');
                    },
                    "action": function () {
                        tableProduksi.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
    });
}