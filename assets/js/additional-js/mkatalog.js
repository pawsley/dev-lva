var tableLog;
var tableAddMtr;
var formatcur = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
var formatcurdt = new Intl.NumberFormat('id-ID', {
    style: 'decimal',
    minimumFractionDigits: 0
});
$(document).ready(function() {
    if (window.location.href === base_url+'katalog/buat-baru') {
        generateid();
        addsb();
        dafsb();
        getselect2();
        imgpreview();
        createlog();
    } else if (window.location.href === base_url+'katalog/list') {
        // addsbcdm();
        // dafsbcdm();
        tabkatalog();
        // modalcdm();
        // aktivasikat();
    } else if (window.location.href === base_url+'katalog/daftar'){

    }
});
function debounce(func, wait) {
    let timeout;
    return function(...args) {
        const context = this;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'katalog/sku-id',
            type: 'GET',
            dataType: 'json'
        });
        const def = response.defID;
        const newid = response.newID;

        if (newid !== def) {
            $('#sku').val(newid);
        } else {
            $('#sku').val(def);
        }
    } catch (error) {
        console.error('Error fetching id data:', error);
    }
}
function addsb() {
    $('#TambahSubKategoriItem').on('shown.bs.modal', function () {
        setTimeout(function() {
            $('#item').val('').focus();
        }, 200);
    });
    $('.shownewmod').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let label = $(this).data('label');
        
        // Set the modal content
        $('#titmod').text(title);
        $('#labmod').text(label);
        $('#addmod').off('click').on('click', function () {
            let item = $('#item').val();
            if (!item ) {
                swal("Error", "Item tidak boleh kosong", "error").then(() => {
                    $('#item').focus();  // Set focus back to the item input after the alert is closed
                });
                return;
            } 
            $.ajax({
                type: "POST",
                url: base_url+"katalog/newsb",
                data: {
                    kodekat: id,
                    namakat: item,
                },
                dataType: "json", 
                success: function (response) {
                    if (response.status === 'success') {
                        swal("Data berhasil ditambahkan", {
                            icon: "success",
                            buttons: false,
                            timer: 1000
                        }).then(function() {
                            $('#item').val('').focus();
                        });
                    }
                },
                error: function (error) {
                    swal("Gagal menambahkan data", {
                        icon: "error",
                    });
                }
            });
        });
    });
}
function dafsb() {
    $('.showdafmod').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');

        $('#labdaf').text(title);
        fetchdafsb(id);
        updatesb();
        deletesb(id);
    });
}
function fetchdafsb(val) {
    $('#daf-container').empty();
    
    $.ajax({
        type: 'GET',
        url: base_url+'katalog/dafsb/' + val,
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, daf) {
                var dafContainer = $('<div class="row mt-2 daf-item">');
                var inputField = $('<input class="form-control daf-name" data-id="'+daf.id+'" type="text">')
                                    .val(daf.nama);
                var deleteButton = $('<button class="btn btn-danger deldaf" data-id="'+daf.id+'" type="button"><i class="fa fa-trash"></i></button>');

                dafContainer.append($('<div class="col-9">').append(inputField));
                dafContainer.append($('<div class="col-3">').append(deleteButton));

                $('#daf-container').append(dafContainer);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    }); 
}
function updatesb() {
    $('#editmod').off('click').on('click', function (e) {
        e.preventDefault();
        var dafData = [];
        $('#daf-container .daf-item').each(function() {
            var idsb = $(this).find('.daf-name').data('id');
            var namasb = $(this).find('.daf-name').val();

            dafData.push({
                id: idsb,
                name: namasb
            });
        });
        var jsonData = JSON.stringify(dafData);
        $.ajax({
            type: 'POST',
            url: base_url + 'katalog/updatesb', 
            contentType: 'application/json',
            data: jsonData,
            success: function(response) {
                swal("Updated!", {
                    icon: "success",
                }).then(function() {
                    // fetchdafmodal(val);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while updating the data.');
            }
        });
    });
}
function deletesb(val) {
    $(document).on('click', '.deldaf', function(e) {
        e.preventDefault();
        // Get the data-id of the button clicked
        var dafId = $(this).data('id');

        swal({
            title: 'Apa anda yakin?',
            text: 'Data yang sudah terhapus hilang permanen!',
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
                // User clicked 'Delete', proceed with the deletion
                $.ajax({
                    type: 'POST',
                    url: base_url + 'katalog/deletesb/' + dafId,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", {
                                icon: "success",
                            }).then(function() {
                                fetchdafsb(val)
                            });
                        } else {
                            swal('Error!', response.message, 'error');
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
function getselect2() {    
    $('#selkat').select2({
        language: 'id',
        placeholder: 'Pilih Tipe',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'MasterMaterial/loadkatsize/';
            },
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
                            id: item.id,
                            text: item.nama,
                        };
                    }),
                };
            },
            cache: false,
        },
    }).on('change', function(e) {
        let selectedValue = $(this).val();
        $('#table-body').empty();
        $.ajax({
            type: 'GET',
            url: base_url+'MasterKatalog/getdatatipe/' + selectedValue,
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, daf) {
                    let rowCount = $('#table-body tr').length + 1;
                
                    $('#table-body').append(`
                        <tr>
                            <td>${rowCount}</td>
                            <td>${daf.nama}</td>
                            <td class="sizelog">${daf.size}</td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    $('#selmrk').select2({
        language: 'id',
        placeholder: 'Pilih Merek',
        allowClear: true,
        ajax: {
            url: function() {
                let val = 'MRK';
                return base_url + 'katalog/dafsb/' + val;
            },
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
                            id: item.nama,
                            text: item.nama,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
    $('#selwrn').select2({
        language: 'id',
        placeholder: 'Pilih Warna',
        allowClear: true,
        ajax: {
            url: function() {
                let val = 'WRN';
                return base_url + 'katalog/dafsb/' + val;
            },
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
                            id: item.nama,
                            text: item.nama,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}
function imgpreview() {
    $('#upload-btn').on('click', function() {
        $('#imgm').click();
    });

    $('#imgm').on('change', function(event) {
        const file = event.target.files[0];
        const $uploadBtn = $('#upload-btn');

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                lastImageUrl = e.target.result;
                $uploadBtn.css('background-image', 'url(' + e.target.result + ')');
            };

            reader.readAsDataURL(file);
        }
    });
}
function createlog() {
    $('#form-log').off('submit').on('submit', function (e) {
        e.preventDefault();
        $('#spinner_sublog').removeClass('d-none');
        $('#tx_sublog').addClass('d-none');
        $('#sublog').prop('disabled', true);
        var fileInput = $("#imgm")[0];
        if (!fileInput.files.length) {
            swal("Gagal menambahkan data katalog", "Harap pilih gambar", {
                icon: "error",
            }).then(function () {
                $("#upload-btn").focus();
                $('#spinner_sublog').addClass('d-none');
                $('#tx_sublog').removeClass('d-none');
                $('#sublog').prop('disabled', false);
            });
            return;
        }

        var tableData = [];
        $('#table-body tr').each(function () {
            let id_katalog = $('#sku').val();
            let size = $(this).find('.sizelog').text();
            tableData.push({
                id_katalog: id_katalog,
                sizelog: size
            });
            
        });
        
        var formData = new FormData($('#form-log')[0]);
        formData.append('img_katalog', fileInput.files[0]);
        formData.append('table_data', JSON.stringify(tableData));
        $.ajax({
            url: base_url + 'katalog/add-katalog',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    swal("Katalog berhasil ditambahkan", {
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
                $('#form-log').find('select').val('0').trigger('change.select2');
                $('#form-log').find('input, textarea').val('');
                $('#table-body').empty();
                $('#imgm').val('');
                $('#upload-btn').css('background-image', 'none');
                $('#spinner_sublog').addClass('d-none');
                $('#tx_sublog').removeClass('d-none');
                $('#sublog').prop('disabled', false);
                generateid(); // Re-generate ID after successful completion
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred while saving data.');
            }
        });
    });
}

// condiment
function addsbcdm() {
    $('#TambahSubKategoriItem').on('shown.bs.modal', function () {
        setTimeout(function() {
            $('#item').val('').focus();
        }, 200);
    });
    $('.shownewmod').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');
        let label = $(this).data('label');
        
        // Set the modal content
        $('#titmod').text(title);
        $('#labmod').text(label);
        $('#addmod').off('click').on('click', function () {
            let item = $('#item').val();
            if (!item ) {
                swal("Error", "Item tidak boleh kosong", "error").then(() => {
                    $('#item').focus();  // Set focus back to the item input after the alert is closed
                });
                return;
            } 
            $.ajax({
                type: "POST",
                url: base_url+"katalog/newcdm",
                data: {
                    kodekat: id,
                    namakat: item,
                },
                dataType: "json", 
                success: function (response) {
                    if (response.status === 'success') {
                        swal("Data berhasil ditambahkan", {
                            icon: "success",
                            buttons: false,
                            timer: 1000
                        }).then(function() {
                            $('#item').val('').focus();
                        });
                    }
                },
                error: function (error) {
                    swal("Gagal menambahkan data", {
                        icon: "error",
                    });
                }
            });
        });
    });
}
function dafsbcdm() {
    $('.showdafmod').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');

        $('#labdaf').text(title);
        fetchdafsbcdm(id);
        updatesbcdm();
        deletesbcdm(id);
    });
}
function fetchdafsbcdm(val) {
    $('#daf-container').empty();
    
    $.ajax({
        type: 'GET',
        url: base_url+'katalog/dafcdm/' + val,
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, daf) {
                var dafContainer = $('<div class="row mt-2 daf-item">');
                var inputField = $('<input class="form-control daf-name" data-id="'+daf.id_condiment+'" type="text">')
                                    .val(daf.nama_condiment);
                var deleteButton = $('<button class="btn btn-danger deldaf" data-id="'+daf.id_condiment+'" type="button"><i class="fa fa-trash"></i></button>');

                dafContainer.append($('<div class="col-9">').append(inputField));
                dafContainer.append($('<div class="col-3">').append(deleteButton));

                $('#daf-container').append(dafContainer);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    }); 
}
function updatesbcdm() {
    $('#editmod').off('click').on('click', function (e) {
        e.preventDefault();
        var dafData = [];
        $('#daf-container .daf-item').each(function() {
            var idsb = $(this).find('.daf-name').data('id');
            var namasb = $(this).find('.daf-name').val();

            dafData.push({
                id: idsb,
                name: namasb
            });
        });
        var jsonData = JSON.stringify(dafData);
        $.ajax({
            type: 'POST',
            url: base_url + 'katalog/updatesbcdm', 
            contentType: 'application/json',
            data: jsonData,
            success: function(response) {
                swal("Updated!", {
                    icon: "success",
                }).then(function() {
                    // fetchdafmodal(val);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                alert('An error occurred while updating the data.');
            }
        });
    });
}
function deletesbcdm(val) {
    $(document).on('click', '.deldaf', function(e) {
        e.preventDefault();
        // Get the data-id of the button clicked
        var dafId = $(this).data('id');

        swal({
            title: 'Apa anda yakin?',
            text: 'Data yang sudah terhapus hilang permanen!',
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
                // User clicked 'Delete', proceed with the deletion
                $.ajax({
                    type: 'POST',
                    url: base_url + 'katalog/deletesbcdm/' + dafId,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", {
                                icon: "success",
                            }).then(function() {
                                fetchdafsbcdm(val)
                            });
                        } else {
                            swal('Error!', response.message, 'error');
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
function tabkatalog() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-katalog')) {
            tableLog.destroy();
        }
        
        tableLog = $("#table-katalog").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'katalog/list-katalog',
                "type": "POST",
            },
            "columns": [
                {
                    "data": "katalog",
                    "render": function(data, type, row, full) {
                        if (type === "display") {
                            return `
                                <div class="product-names">
                                    <div class="light-product-box"><img class="img-fluid" src="${base_url+'assets/lvaimages/katalog/'+row.img_katalog}" alt=""></div>
                                    <div class="row">
                                        <div class="col-12">
                                        <strong>${row.id_katalog} | ${row.nama_katalog}</strong>
                                        </div>
                                        <div class="col-12">
                                        <strong>
                                            <span class="badge rounded-pill badge-dark">${row.nama}</span>
                                            <span class="badge rounded-pill badge-dark">${row.warna_katalog}</span>
                                            <span class="badge rounded-pill badge-dark">${row.size}</span>
                                        </strong>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        return data;
                    }
                },
                // {
                //     "data": "detail",
                //     "render": function(data, type, row, full) {
                //         if (type === "display") {
                //             return `
                //                 <ul class="list-group list-group-horizontal">
                //                     <li class="list-group-item">${row.nama}</li>
                //                     <li class="list-group-item">${row.warna_katalog}</li>
                //                     <li class="list-group-item">${row.size}</li>
                //                 </ul>
                //             `;
                //         }
                //         return data;
                //     }
                // },
                {
                    "data":"total_hpp_bahan",
                    "render": function (data, type, row) {
                        return formatcur.format(data);
                    }
                },
                {
                    "data":"harga_jual",
                    "render": function (data, type, row) {
                        return formatcur.format(data);
                    }
                },
                {
                    "data": "id_katalog_dtl",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <button class="btn btn-info-gradien dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                    <div class="dropdown-menu" style="z-index: 9999;">
                                        ${(full.status === "Aktif" || full.status === "Tidak" ) ? `
                                            <a class="dropdown-item" href="javascript:void(0)" id="addmtr" data-bs-toggle="modal" data-bs-target="#AddMaterial" data-id_dtl="${full.id_katalog_dtl}" data-id="${full.id_katalog}" data-nk="${full.nama_katalog}" data-size="${full.size}" >Tambah Material</a>
                                            <a class="dropdown-item" href="javascript:void(0)" id="dtlmtr" data-bs-toggle="modal" data-bs-target="#AddMaterial" data-id_dtl="${full.id_katalog_dtl}" data-id="${full.id_katalog}" data-nk="${full.nama_katalog}" data-size="${full.size}" >Detail Material</a>
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
                        tableLog.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
        $('#table-katalog tbody').on('click', '#addmtr, #dtlmtr', function () {
            let id = this.id === "addmtr" ? 1 : 2;
            const $btn = $(this);
            const idk = $btn.data('id');
            const id_dtl = $btn.data('id_dtl');
            const nmk = $btn.data('nk');
            const size = $btn.data('size');

            $('#AddMaterial').one('shown.bs.modal', function () {
                $('#modtl').text(id === 1 ? 'Tambah Material' : 'Detail Material');
                $('#skudtl').text(`${idk} ${nmk} (${size})`);
                tabaddmtr(id, id_dtl);
            });
        });
    });
}
function getSelect2(idk) {
    $('#selcondi').select2({
        language: 'id',
        placeholder: 'Pilih Tipe',
        dropdownParent: $("#AddMaterial"),
        allowClear: true,
        ajax: {
            url: function() {
                let val = 'CDM';
                return base_url + 'katalog/dafcdm/' + val;
            },
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
                            id: item.nama_condiment,
                            text: item.nama_condiment,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
    $('#selsize').select2({
        language: 'id',
        placeholder: 'Pilih Size Katalog',
        dropdownParent: $("#AddMaterial"),
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'katalog/dafsize/' + idk;
            },
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term,
                };
            },
            processResults: function(data) {
                var groups = {};
                var results = [];
                data.forEach(function(item) {
                    var groupName = item.id_katalog + ' | ' + item.nama_katalog;
                    
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }

                    var sizes = item.ukuran.split(',').map(function(size) {
                        return size.trim();
                    });

                    sizes.forEach(function(size) {
                        groups[groupName].push({
                            id: size, 
                            text: 'Size: (' + size + ')',
                            id_ktl: item.id_katalog
                        });
                    });
                });

                Object.keys(groups).forEach(function(groupName) {
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
    $('#selmtr').select2({
        language: 'id',
        placeholder: 'Pilih Material',
        dropdownParent: $("#AddMaterial"),
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'katalog/dafmtr/';
            },
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (data) {
                var results = data.map(function (item) {
                    return {
                        id: item.kode_material,
                        text: item.kode_material + ' | ' + item.nama_material,
                        sat: item.sat_material,
                        img: item.img_material,
                    };
                });
    
                return {
                    results: results
                };
            },
            cache: false,
        },
    });    
    $('#selsize').on('select2:select', function (e) {
        let id = e.params.data.id_ktl;
        let sz = e.params.data.id;
        $.ajax({
            type: "GET",
            url: base_url + "katalog/sizedtl/" + id + '/' + sz,
            dataType: "json",
            success: function (data) {
                $('#sizeDetailsList').empty();
                
                $.each(data, function (index, item) {
                    let listItem = `
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>${item.detail_size}</span>
                            <strong>${item.detail_size_num} ${item.satuan}</strong>
                        </li>
                    `;
                    $('#sizeDetailsList').append(listItem);
                });
            },
            error: function (error) {
                alert('Failed to retrieve size details.');
            }
        });
    });    
    $('#selmtr').on('select2:select', function(e) {
        $('#satuan').text(e.params.data.sat);
        $('#img-display').removeClass('d-none');
        $('#img-display').attr('src', base_url+'assets/lvaimages/material/'+e.params.data.img);
    }); 
}
function formatNumber(value) {
    return parseFloat(value) % 1 === 0 ? parseInt(value) : parseFloat(value).toFixed(2);
}
function modalcdm() {
    $('#addmtr').on('click', function (e) {
        $('#AddMaterial').on('shown.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var idk = button.data('id');
            var id_dtl = button.data('id_dtl');
            var nmk = button.data('nk');
            var size = button.data('size');
            $('#skudtl').text(idk+' '+nmk+' ('+size+') ');
            tabaddmtr(1, id_dtl);
        });
    });
    $('#dtlmtr').on('click', function (e) {
        $('#DetailMaterial').on('shown.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var id_dtl = button.data('id_dtl');
            $('#skudtl').text(id_dtl);
            tabaddmtr(2, id_dtl);
        });
    });
}
function addcdm() {
    $('#form-cdm').off('submit').on('submit', function (e) {
        e.preventDefault();
        $('#spinner_subadd').removeClass('d-none');
        $('#tx_subadd').addClass('d-none');
        $('#subadd').prop('disabled', true);
        var formData = $(this).serializeArray();
        $.ajax({
            url: base_url + 'MasterKatalog/addcdm',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    swal("Berhasil ditambahkan", {
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
                $('#spinner_subadd').addClass('d-none');
                $('#tx_subadd').removeClass('d-none');
                $('#subadd').prop('disabled', false);
                tableAddMtr.ajax.reload();
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('An error occurred while saving data.');
            }
        });
    });
}
function tabaddmtr(type, idtl) {
    $.getJSON(base_url + 'assets/json/datatable-id.json', function (json) {
        if ($.fn.DataTable.isDataTable('#table-addmaterial')) {
            tableAddMtr.destroy();
        }

        const ajaxUrl = type === 1
            ? base_url + 'MasterKatalog/listmaterial/' + idtl
            : base_url + 'MasterKatalog/detailmaterial/' + idtl;

        tableAddMtr = $("#table-addmaterial").DataTable({
            language: json,
            processing: true,
            serverSide: true,
            ajax: {
                url: ajaxUrl,
                type: "POST",
                data: d => {
                    d.search = $('#AddMaterial').find('input[type="search"]').val();
                }
            },
            columns: [
                {
                    data: "nama_material",
                    render: function (data, type, row) {
                        if (type === "display") {
                            return `
                                <div class="product-names">
                                    <div class="light-product-box">
                                        <img class="img-fluid" src="${base_url}assets/lvaimages/material/${row.img_material}" alt="material">
                                    </div>
                                    <strong data-idtl="${row.id_katalog_dtl}" data-kodem="${row.kode_material}">
                                        ${row.kode_material} | ${row.nama_material}<br>
                                        <span class="badge rounded-pill badge-dark">${row.tipe_material}</span>
                                        <span class="badge rounded-pill badge-dark">${row.kat_material}</span>
                                        <span class="badge rounded-pill badge-dark">${row.warna_material}</span>
                                    </strong>
                                </div>
                            `;
                        }
                        return data;
                    }
                },
                {
                    data: null,
                    orderable: false,
                    render: row => {
                        const qty = type === 1 ? 0 : (row.qty_material || 0);
                        return `
                            <div class="input-group">
                                <input class="form-control qty-input" type="number" step="0.01" min="0" oninput="this.value = Math.abs(this.value)" name="qty" value="${qty}" required>
                                <span class="input-group-text">${row.sat_material}</span>
                            </div>
                        `;
                    }
                },
                {
                    data: "harga_material",
                    orderable: false,
                    render: data => `
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control sharga-input" type="text" name="sharga" value="${formatcurdt.format(data)}" readonly>
                        </div>
                    `
                },
                {
                    data: null,
                    orderable: false,
                    render: row => {
                        const total = type === 1 ? 0 : (row.hpp_bahan || 0);
                        const removeBtn = type === 2 
                            ? `<button type="button" class="btn btn-danger btn-sm remove-data" data-id="${row.id}" title="Hapus"><i class="fa fa-trash"></i></button>` 
                            : '';
                        return `
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input class="form-control tharga-input" type="text" name="tharga" value="${formatcurdt.format(total)}" readonly>
                                ${removeBtn}
                            </div>
                        `;
                    }
                }
            ],
            dom: "<'row'<'col-md-6'l><'col-md-6'f>>" +
                "<'row'<'col-md-2'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-md-4'i><'col-md-8'p>>",
            buttons: [
                {
                    text: 'Refresh',
                    className: 'btn btn-primary',
                    action: () => tableAddMtr.ajax.reload()
                },
                {
                    text: type === 1 ? 'Tambah' : 'Edit',
                    className: type === 1 ? 'btn btn-success' : 'btn btn-warning',
                    action: () => {
                        const materialsData = [];

                        $('#table-addmaterial tbody tr').each(function () {
                            const $row = $(this);
                            const qty = parseFloat($row.find('.qty-input').val()) || 0;
                            const tharga = parseFloat($row.find('.tharga-input').val().replace(/\D/g, '')) || 0;

                            if (tharga > 0) {
                                materialsData.push({
                                    qty,
                                    tharga,
                                    idtl: $row.find('.product-names strong').data('idtl'),
                                    kodem: $row.find('.product-names strong').data('kodem')
                                });
                            }
                        });

                        if (!materialsData.length) {
                            swal("Tidak ada material", {
                                icon: "warning",
                                buttons: false,
                                timer: 1000
                            });
                            return;
                        }

                        $.ajax({
                            url: base_url + (type === 1 ? 'MasterKatalog/addmtr' : 'MasterKatalog/addmtr'),
                            type: 'POST',
                            data: { materials: materialsData },
                            dataType: 'json',
                            success: function (response) {
                                swal(response.status === 'success' ? "Berhasil disimpan" : "Gagal disimpan", {
                                    icon: response.status === 'success' ? "success" : "error",
                                    buttons: false,
                                    timer: 1000
                                });
                            },
                            complete: function () {
                                tableAddMtr.ajax.reload();
                                $('#AddMaterial').modal('hide');
                                tableLog.ajax.reload();
                            },
                            error: () => {
                                swal("Gagal disimpan", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1000
                                });
                            }
                        });
                    }
                }
            ]
        });

        // Live update total harga
        $('#table-addmaterial tbody').on('input', '.qty-input', function () {
            const $row = $(this).closest('tr');
            const qty = parseFloat($(this).val()) || 0;
            const sharga = parseFloat($row.find('.sharga-input').val().replace(/\D/g, '')) || 0;
            const total = qty * sharga;
            $row.find('.tharga-input').val(formatcurdt.format(total));
        });
        $('#table-addmaterial tbody').on('click', '.remove-data', function () {
            const $row = $(this).closest('tr');
            const id = $(this).data('id');

            swal({
                title: 'Apa anda yakin?',
                text: 'Data yang sudah terhapus hilang permanen!',
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
                    var idtl = $row.find('.product-names strong').data('idtl')
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'MasterKatalog/delmtr/' + id,
                        data: {
                            idtl: idtl
                        },
                        dataType: 'json',
                        success: function (response) {
                            if (response.status === 'success') {
                                swal("Deleted!", {
                                    icon: "success",
                                    buttons: false,
                                    timer: 1500
                                }).then(function() {
                                    tableAddMtr.ajax.reload();
                                    tableLog.ajax.reload();
                                });
                            } else {
                                swal("Fail!", {
                                    icon: "error",
                                    buttons: false,
                                    timer: 1500
                                })
                            }
                        },
                        error: function (error) {
                            swal('Error!', 'An error occurred while processing the request.', 'error');
                        }
                    });
                }
            });
        }
        );
    });
}

function aktivasikat() {
    $(document).on('click', '#aktivasi', function (e) {
        e.preventDefault();
    
        var idkat = $(this).data('id');
    
        swal({
            title: 'Konfirmasi Aktivasi',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Anda akan mengaktivasi katalog <strong>' + idkat + '</strong>.'
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
                    url: base_url + 'katalog/aktivasi-katalog',
                    dataType: "json", 
                    data: {
                        idkat: idkat,
                    },
                    success: function (response) {
                        if (response.status === 'success') {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tableLog.ajax.reload();
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
