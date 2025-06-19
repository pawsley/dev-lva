var twid = "";
var tableMat;
var tablePMBMat;
var tablePMBD;
var formatcur = new Intl.NumberFormat('id-ID', {
    style: 'decimal',
    // currency: 'IDR',
    minimumFractionDigits: 0
});
var formatcurdt = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
let checkboxStates = {};
$(document).ready(function () {
    pmbm();
    dtpmbm();
    tabpmb();
    deletepmbm();
    approvedpmb();
    approvedgd();
    approvedgdlva();
    if (window.location.href === base_url+'status-order') {
        generateid();
        tabmat();
    }
});
function selectTipe() {
    $('#seltipe').select2({
        placeholder: 'Pilih Tipe Pembayaran',
        dropdownParent: $("#PmbModal"),
        allowClear: true,
        language: 'id',
    });
    $('#selsupp').select2({
        placeholder: 'Pilih Supplier',
        dropdownParent: $("#PmbModal"),
        allowClear: true,
        language: 'id',
    });    
    $('#seltipe').on('select2:select', function(e) {
        var data = e.params.data;
        var selectedValue = data.id;
        if (selectedValue === 'transfer') {
            $('#bank-account-container').removeClass('d-none');
            $('#bank_acc').attr('required', true);
            selectBank();
        } else if (selectedValue==='tunai'){
            $('#bank-account-container').addClass('d-none'); 
            $('#bank_acc').removeAttr('required');
        }

        selectSupp(selectedValue);
    });
}
function selectSupp(val) {
    try {
        $("#selsupp").empty().append('<option></option>').trigger('change');

        // Initialize select2 with specific settings
        $('#selsupp').select2({
            placeholder: 'Pilih Supplier',
            dropdownParent: $("#PmbModal"),
            allowClear: true,
            language: 'id',
            ajax: {
                url: base_url + 'PemMaterial/loadsupp',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // Add the search term to your AJAX request
                    };
                },
                processResults: function (data) {
                    // Map the data and update the dropdown options
                    return {
                        results: $.map(data, function (item) {
                            const supplierText = (val === 'tunai')
                                ? item.nama_supplier
                                : item.nama_supplier + ' (' + item.bank_acc + ' - ' + item.norek + ')';
                            
                            return {
                                id: item.id_supplier,
                                text: supplierText,
                            };
                        })
                    };
                },
                cache: false,
            },
        });

    } catch (error) {
        console.error("Error initializing select2:", error);
    }
}
function selectBank() {
    $('#bank_acc').select2({
        placeholder: 'Pilih Akun Bank LVA',
        dropdownParent: $("#PmbModal"),
        allowClear: true,
        language: 'id',
        ajax: {
            url: base_url + 'PemMaterial/loadbanklva',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                var groups = {};
                var results = [];
    
                data.forEach(function (item) {
                    var groupName = item.nama_bank;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_bank,
                        text: item.nama_rek+' ('+item.no_rek+') ',
                    });
                });
    
                Object.keys(groups).forEach(function (groupName) {
                    results.push({
                        text: groupName,
                        children: groups[groupName]
                    });
                });
    
                return {
                    results: results
                };
            },
            cache: false,
        },
    });
}
function pmbm() {
    $('#PmbModal').on('shown.bs.modal', function () {
        checkboxStates = {}; // Clear the checkboxStates object
    
        selectTipe();
        generateid();
        addpmbm();
        tabmat();
        var intervalId = setInterval(function() {
            $('#pmbtgl').val(updateDateTime(twid));
        }, 500);
        $('#PmbModal').on('hidden.bs.modal', function() {
            clearInterval(intervalId);
        });               
    });
}
function dtpmbm() {
    $('#DetailTransaksi').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget);
    
        $('#dinvpmb').text(button.data('invoice'));
        $('#dtglpmb').text(button.data('tgl'));
        $('#dtpmb').text(button.data('tipe').toUpperCase());
        $('#libankac').toggleClass('d-none', button.data('id_bank') == '0');
        $('#dbankacc').text(button.data('acc'));
        $('#dsupmb').text(button.data('supp'));    
        var status = button.data('stat');
        var statusClass = status === "Requesting" ? 'text-warning' :
                          status === "Approved" ? 'text-success' : 'text-primary';    
        $('#dstat').text(status).removeClass('text-warning text-success text-primary').addClass(`f-light ${statusClass}`);
        $('#dgrand').text(formatcurdt.format(button.data('gt')));
        tabdtl(button.data('invoice'));
    });    
}
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'PemMaterial/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const opnameid = response.newID;

        // Set the value in the input field
        $('#ivpb').val((opnameid !== def ? opnameid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function addpmbm() {
    $('#form-pmb').off('submit').on('submit', function(e) {
        e.preventDefault();
        $('#spinner_subpmb').removeClass('d-none');
        $('#tx_subpmb').addClass('d-none');
        $('#subpmb').prop('disabled', true);

        // Collect form data
        var formData = $(this).serializeArray();
        
        // Collect checked checkbox data
        var tableData = [];
        $('#table-material tbody').find('input.checkbox-class:checked').each(function() {
            var kode_material = $(this).val();
            var qty = $('#checkbox-' + kode_material + '-qty').val() || '0';
            var nominal = parseFloat($('#checkbox-' + kode_material + '-hrg').val().replace(/\D/g, '')) || 0;
            var total = parseFloat($('#checkbox-' + kode_material + '-total').val().replace(/\D/g, '')) || 0;

            tableData.push({
                kode: kode_material,
                qty: qty,
                nominal: nominal,
                total: total
            });
        });

        // Collect grand total
        var grandTotal = parseFloat($('#tx_gt').text().replace(/\D/g, '')) || 0; // Remove non-numeric characters for parsing

        // Add data to formData
        formData.push({ name: 'table_data', value: JSON.stringify(tableData) });
        formData.push({ name: 'grand_total', value: grandTotal });

        $.ajax({
            type: 'POST',
            url: base_url + 'pembelian/input-data',
            data: $.param(formData), // Convert formData to query string
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    swal("Pembelian berhasil ditambahkan", {
                        icon: "success",
                        buttons: false,
                        timer: 1500
                    }).then(function() {
                        $('#PmbModal').modal('hide');
                    });
                } else {
                    swal("Pembelian gagal ditambahkan", {
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            },
            complete: function() {
                $('#form-pmb').find('select').val('0').trigger('change.select2');
                $('#spinner_subpmb').addClass('d-none');
                $('#tx_subpmb').removeClass('d-none');
                $('#subpmb').prop('disabled', false);
                $('#table-material tbody').find('input.checkbox-class').each(function() {
                    var kode_material = $(this).val();
                    var isChecked = false;
                    var applyFocus = false; // All checkboxes are unchecked
                    $(this).prop('checked', isChecked);
                    // Call updateInputs to handle state reset
                    updateInputs(kode_material, isChecked, applyFocus);
                });
                updateGrandTotal();
                generateid();
                tablePMBMat.ajax.reload();
            }
        });
    });
}
function deletepmbm() {
    $(document).on('click', '#deletepmb', function (e) {
        e.preventDefault();
    
        var invoice_id = $(this).data('invoice');
    
        swal({
            title: 'Apa anda yakin?',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Menghapus transaksi dengan nomor invoice <strong>' + invoice_id + '</strong>.'
                }
            },
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Delete',
                    value: true,
                    visible: true,
                    className: 'btn-danger',
                    closeModal: true
                }
            }
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: base_url + 'pembelian/delete-data/',
                    dataType: "json", 
                    data: {
                        invoice: invoice_id,
                    },
                    success: function (response) {
                        if (response.success) {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tablePMBMat.ajax.reload();
                            });
                        } else {
                            swal(response.message, {
                                icon: "error",
                                buttons: false,
                                timer: 1000
                            });
                        }
                    },
                    error: function (error) {
                        swal('Error!', 'An error occurred while processing the request.', 'error');
                    }
                });
            }
        });
    });
}
function approvedpmb() {
    $(document).on('click', '#approvepmb', function (e) {
        e.preventDefault();
    
        var invoice_id = $(this).data('invoice');
    
        swal({
            title: 'Konfirmasi Persetujuan',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Anda akan menyetujui transaksi dengan nomor invoice <strong>' + invoice_id + '</strong>.'
                }
            },
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Approve',
                    value: true,
                    visible: true,
                    className: 'btn-success',
                    closeModal: true
                }
            }
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: base_url + 'pembelian/approve-data/',
                    dataType: "json", 
                    data: {
                        invoice: invoice_id,
                    },
                    success: function (response) {
                        if (response.status === 'success') {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tablePMBMat.ajax.reload();
                            });
                        } else {
                            swal(response.message, {
                                icon: "error",
                                buttons: false,
                                timer: 1000
                            });
                        }
                    },
                    error: function (error) {
                        swal('Error!', 'An error occurred while processing the request.', 'error');
                    }
                });
            }
        });
    });
}
function approvedgd() {
    $(document).on('click', '#terimapmbldp', function (e) {
        e.preventDefault();
    
        var invoice_id = $(this).data('invoice');
    
        swal({
            title: 'Konfirmasi Persetujuan',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Terima material dengan nomor invoice <strong>' + invoice_id + '</strong>.'
                }
            },
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Terima',
                    value: true,
                    visible: true,
                    className: 'btn-success',
                    closeModal: true
                }
            }
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: base_url + 'pembelian/terima-data/',
                    dataType: "json", 
                    data: {
                        invoice: invoice_id,
                    },
                    success: function (response) {
                        if (response.status === 'success') {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tablePMBMat.ajax.reload();
                            });
                        } else {
                            swal(response.message, {
                                icon: "error",
                                buttons: false,
                                timer: 1000
                            });
                        }
                    },
                    error: function (error) {
                        swal('Error!', 'An error occurred while processing the request.', 'error');
                    }
                });
            }
        });
    });
}
function approvedgdlva() {
    $(document).on('click', '#terimapmblva', function (e) {
        e.preventDefault();
    
        var invoice_id = $(this).data('invoice');
    
        swal({
            title: 'Konfirmasi Persetujuan',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Terima material dengan nomor invoice <strong>' + invoice_id + '</strong>.'
                }
            },
            icon: 'warning',
            buttons: {
                cancel: {
                    text: 'Cancel',
                    value: null,
                    visible: true,
                    className: 'btn-secondary',
                    closeModal: true,
                },
                confirm: {
                    text: 'Terima',
                    value: true,
                    visible: true,
                    className: 'btn-success',
                    closeModal: true
                }
            }
        }).then((result) => {
            if (result) {
                $.ajax({
                    type: 'POST',
                    url: base_url + 'pembelian/terima-data-lva/',
                    dataType: "json", 
                    data: {
                        invoice: invoice_id,
                    },
                    success: function (response) {
                        if (response.status === 'success') {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tablePMBMat.ajax.reload();
                            });
                        } else {
                            swal(response.message, {
                                icon: "error",
                                buttons: false,
                                timer: 1000
                            });
                        }
                    },
                    error: function (error) {
                        swal('Error!', 'An error occurred while processing the request.', 'error');
                    }
                });
            }
        });
    });
}
function tabdtl(inv) {
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-dmaterial')) {
            tablePMBD.destroy();
        }
        
        tablePMBD = $("#table-dmaterial").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'pembelian/list-pembelian-detail',
                "type": "POST",
                "data": function(d) {
                    d.invid = inv;
                }
            },
            "columns": [
                {
                    "data": "material",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <img class="img-30 me-2" src="${base_url+'assets/lvaimages/material/'+row.img_material}" alt="material">
                                <strong>${row.kode_material} | ${row.nama_material}</strong>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data": "detail",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">${row.kat_material}</li>
                                    <li class="list-group-item">${row.warna_material}</li>
                                </ul>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data": "qty_pb_dtl",
                    "render": function (data, type, row) {
                        if (type === "display") {
                            return `<span>${data+' '+row.sat_material}</span>`;
                        }
                        return data;
                    }
                },
                {
                    "data": "nominal_pb_dtl",
                    "render": function (data, type, row) {
                        return formatcurdt.format(data);
                    }
                },
                {
                    "data": "total_pb_dtl",
                    "render": function (data, type, row) {
                        return formatcurdt.format(data);
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
                        tablePMBD.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
    });
}
function tabpmb() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-pembelian')) {
            tablePMBMat.destroy();
        }
        
        tablePMBMat = $("#table-pembelian").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'pembelian/list-pembelian',
                "type": "POST",
            },
            "columns": [
                {
                    "data": "id_pembelian",
                },
                {
                    "data": "tgl_pmb",
                },
                {
                    "data": "nama_supplier",
                },
                {
                    "data": "grand_total",
                    "render": function (data, type, row) {
                        return `<strong class="f-light text-success">${formatcurdt.format(data)}</strong>`;
                    }
                },
                {
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            if(data ==="Requesting"){
                                return `<strong class="f-light text-warning">Requesting</strong>`;
                            } else if(data==="Approved"){
                                return `<strong class="f-light text-success">Approved</strong>`;
                            } else if(data==="Barang Diterima Gudang"){
                                return `<strong class="f-light text-primary">Diterima Gudang</strong>`;
                            }
                            return data; // return the original value for other cases
                        }
                        return data;
                    }
                },
                {
                    "data": "id_pembelian",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <button class="btn btn-info-gradien dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                    <div class="dropdown-menu">
                                        ${(full.status === "Requesting" ) ? `
                                        <a class="dropdown-item" id="approvepmb" data-invoice="${data}" href="javascript:void(0)">Approve Transaksi</a>
                                        ` : ''}
                                        ${(full.status === "Approved" ) ? `
                                        <a class="dropdown-item" id="terimapmbldp" data-invoice="${data}" href="javascript:void(0)">Barang Diterima Gudang LDP</a>
                                        <a class="dropdown-item" id="terimapmblva" data-invoice="${data}" href="javascript:void(0)">Barang Diterima Gudang LVA</a>
                                        ` : ''}
                                        ${(full.status === "Requesting" || full.status === "Approved" || full.status === "Barang Diterima Gudang LDP" || full.status === "Barang Diterima Gudang LVA") ? `
                                        <a class="dropdown-item" data-invoice="${data}" data-tgl="${full.tgl_pmb}" data-tipe="${full.tipe_pmb}" 
                                            data-supp="${full.nama_supplier} (${full.bank_acc}-${full.norek})" 
                                            data-id_bank="${full.id_bank}" data-acc="${full.nama_rek} (${full.nama_bank}-${full.no_rek})" 
                                            data-stat="${full.status}" data-gt="${full.grand_total}"
                                            href="javascript(0)" data-bs-toggle="modal" data-bs-target="#DetailTransaksi">
                                            Detail Transaksi
                                        </a>
                                        ` : ''}
                                        ${(full.status === "Requesting" || full.status === "Approved") ? `
                                        <a class="dropdown-item" id="deletepmb" data-invoice="${data}" href="javascript(0);">Hapus Transaksi</a>
                                        ` : ''}
                                    </div>
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
                        tablePMBMat.ajax.reload(); // Refresh data
                    }
                },
            ]
        });
    });
}
function tabmat() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-material')) {
            tableMat.destroy();
        }
        
        tableMat = $("#table-material").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [1, 'asc']
            ],
            "ajax": {
                "url": base_url + 'pembelian/list-material',
                "type": "POST",
                "complete": function() {
                    reapplyState();  // Reapply state and calculations after DataTable is fully loaded
                }
            },
            "columns": [
                {
                    "data": "kode_material",
                    "render": function(data, type, row, meta) {
                        let checked = checkboxStates[data] ? 'checked' : '';
                        return `<input type="checkbox" class="checkbox-class" id="checkbox_${data}" value="${data}" ${checked}>`;
                    },
                    "orderable": false
                },
                {
                    "data": "kode_material",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <img class="img-30 me-2" src="${base_url+'assets/lvaimages/material/'+row.img_material}" alt="material">
                                <strong>${row.kode_material} | ${row.nama_material}</strong>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data": "kat_material",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <ul class="list-group list-group-horizontal">
                                    <li class="list-group-item">${row.kat_material}</li>
                                    <li class="list-group-item">${row.warna_material}</li>
                                </ul>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data": "kode_material",
                    "render": function(data, type, row, meta) {
                        var inputId = 'checkbox-' + row.kode_material + '-qty';
                        let disabled = checkboxStates[row.kode_material] ? '' : 'disabled';
                        return `
                            <div class="input-group has-validation">
                                <input class="form-control input-qty" required id="${inputId}" value="${row.material_need}" type="number" ${disabled}>
                                <span class="input-group-text">${row.sat_material}</span>
                            </div>
                        `;
                    },
                    "orderable": false
                },
                {
                    "data": "kode_material",
                    "render": function(data, type, row, meta) {
                        var inputId = 'checkbox-' + row.kode_material + '-hrg';
                        let disabled = checkboxStates[row.kode_material] ? '' : 'disabled';
                        return `
                            <div class="input-group has-validation">
                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">Rp</span>
                                <input class="form-control input-hrg" required id="${inputId}" type="text" value="${formatcur.format(row.harga_material)}" onkeyup="formatRupiah(this);" ${disabled}>
                            </div>
                        `;
                    },
                    "orderable": false
                },
                {
                    "data": "kode_material",
                    "render": function(data, type, row, meta) {
                        var inputId = 'checkbox-' + row.kode_material + '-total';
                        let disabled = checkboxStates[row.kode_material] ? '' : 'disabled';
                        return `
                            <div class="input-group has-validation">
                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">Rp</span>
                                <input class="form-control input-total" required id="${inputId}" type="text" value="${formatcur.format((row.material_need * row.harga_material))}" onkeyup="formatRupiah(this);" ${disabled} readonly>
                            </div>
                        `;
                    },
                    "orderable": false
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
                        tableMat.ajax.reload(); // Refresh data
                    }
                }
            ]
        });

        // Handle checkbox change event
        $('#table-material tbody').on('change', 'input.checkbox-class', function() {
            var kode_material = $(this).val();
            var isChecked = $(this).is(':checked');
            var firstChecked = true;
            
            checkboxStates[kode_material] = isChecked;
        
            // Update the state of the corresponding input fields
            updateInputs(kode_material, isChecked, firstChecked);
        });

        // Handle 'Select All' checkbox
        $('#select-all').on('click', function() {
            var rows = tableMat.rows({ 'search': 'applied' }).nodes();
            var firstChecked = true;  // Add this flag
            $('input[type="checkbox"]', rows).prop('checked', this.checked).each(function() {
                var kode_material = $(this).val();
                checkboxStates[kode_material] = $(this).is(':checked');
        
                // Update input fields based on the checkbox state
                updateInputs(kode_material, checkboxStates[kode_material], firstChecked);
                firstChecked = false;  // Disable focus for the next checkboxes
            });
        });
    });
}
function updateInputs(kode_material, isChecked, applyFocus = false) {
    var qtyInput = $('#checkbox-' + kode_material + '-qty');
    var hrgInput = $('#checkbox-' + kode_material + '-hrg');
    var totalInput = $('#checkbox-' + kode_material + '-total');

    if (isChecked) {
        qtyInput.prop('disabled', false);
        var qty = parseFloat(qtyInput.val()) || 0;
        var hrg = parseFloat(hrgInput.val().replace(/\D/g, '')) || 0;
        var total = qty * hrg;
        // Apply focus if required
        if (applyFocus) {
            setTimeout(() => { qtyInput.focus(); }, 100); 
        }
        if (qty !== 0 || hrg !== 0 || total !== 0) {
            localStorage.setItem(kode_material + '_qty', qty);
            localStorage.setItem(kode_material + '_hrg', hrg);
            localStorage.setItem(kode_material + '_total', total);
        }
        
        var storedQty = localStorage.getItem(kode_material + '_qty');
        var storedHrg = localStorage.getItem(kode_material + '_hrg');
        var storedTotal = localStorage.getItem(kode_material + '_total');
    
        qtyInput.val(storedQty || '');  
        hrgInput.prop('disabled', false).val(storedHrg ? formatcur.format(storedHrg) : '');
        totalInput.prop('disabled', false).val(storedTotal ? formatcur.format(storedTotal) : '');
    } else {
        qtyInput.prop('disabled', true)
        hrgInput.prop('disabled', true)
        totalInput.prop('disabled', true)

        // Remove items from localStorage
        localStorage.removeItem(kode_material + '_qty');
        localStorage.removeItem(kode_material + '_hrg');
        localStorage.removeItem(kode_material + '_total');
    }

    // Reattach keyup event handler to recalculate total
    qtyInput.add(hrgInput).off('keyup').on('keyup', function() {
        var qty = parseFloat(qtyInput.val()) || 0;
        var hrg = parseFloat(hrgInput.val().replace(/\D/g, '')) || 0;
        var total = qty * hrg;
        totalInput.val(formatcur.format(total));

        localStorage.setItem(kode_material + '_qty', qty);
        localStorage.setItem(kode_material + '_hrg', hrg);
        localStorage.setItem(kode_material + '_total', total);
        updateGrandTotal();
    });
    updateGrandTotal();
}
function updateGrandTotal() {
    var grandTotal = 0;

    // Loop through each checkbox and sum totals of checked items
    $('#table-material tbody').find('input.checkbox-class:checked').each(function() {
        var kode_material = $(this).val();
        var total = parseFloat(localStorage.getItem(kode_material + '_total')) || 0;
        grandTotal += total;
    });

    // Update the grand total display
    $('#tx_gt').text(' Rp '+formatcur.format(grandTotal));
}
function reapplyState() {
    $('#table-material tbody').find('input.checkbox-class').each(function(index) {
        var kode_material = $(this).val();
        var isChecked = checkboxStates[kode_material] || false;

        $(this).prop('checked', isChecked);
        updateInputs(kode_material, isChecked, applyFocus = false); // Focus only on the first input
    });
}