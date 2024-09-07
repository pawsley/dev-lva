var tableLog;
$(document).ready(function() {
    if (window.location.href === base_url+'katalog/buat-baru') {
        generateid();
        addsizechart();
        addsb();
        dafsb();
        getselect2();
        imgpreview();
        createlog();
    } else if (window.location.href === base_url+'katalog/condiments') {
        console.log('condiments');
        addsbcdm();
        dafsbcdm();
        tabkatalog();
        modalcdm();
    } else if (window.location.href === base_url+'katalog/daftar'){

    }
});
function addsizechart() {
    // Event handler for adding a new row
    $('#add-row').on('click', function(e) {
        e.preventDefault(); // Prevent the default anchor action

        // The new row content with updated class selectors
        var newRow = `
            <tr>
                <td>
                    <select class="form-select sizelog" name="sizelog[]" required>
                    </select>
                </td>
                <td>
                    <select class="form-select satlog" name="satlog[]" required>
                    </select>                                                            
                </td>
                <td>
                    <input class="form-control" name="logp[]" type="text" placeholder="0" required>
                </td>
                <td>
                    <input class="form-control" name="logl[]" type="text" placeholder="0" required>
                </td>
                <td>
                    <input class="form-control" name="logld[]" type="text" placeholder="0" required>
                </td>
                <td>
                    <input class="form-control" name="logpb[]" type="text" placeholder="0" required>
                </td>
                <td>
                    <div class="input-group has-validation">
                        <span class="input-group-text">Rp</span>
                        <input class="form-control" type="text" name="loghj[]" onkeyup="formatRupiah(this);" placeholder="0" required>
                    </div>
                </td>
                <th scope="row">
                    <ul class="action">
                        <li class="delete">
                            <a href="#" class="delete-row">
                                <i class="icon-trash"></i>
                            </a>
                        </li>
                    </ul>                                                            
                </th>
            </tr>
        `;

        // Append the new row to the table body
        $('#table-body').append(newRow);

        // Load options for the newly added <select> elements
        optionST($('.satlog:last')); // Load options into the latest satlog <select>
        optionSZ($('.sizelog:last')); // Load options into the latest sizelog <select>
    });

    // Event delegation to handle row deletion
    $('#table-body').on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove(); // Remove the closest table row
    });

    $('#table-body').on('mousedown', '.sizelog', function () {
        optionSZ($(this)); // Call optionSZ() when sizelog select is clicked
    });

    $('#table-body').on('mousedown', '.satlog', function () {
        optionST($(this)); // Call optionST() when satlog select is clicked
    });

    // Input restriction for specific inputs
    $('#table-body').on('input', 'input[type="text"]', function() {
        let value = $(this).val();
        value = value.replace(',', '.');
        if (!/^[0-9.,]*$/.test(value)) {
            value = value.slice(0, -1);
        }
        $(this).val(value);
    });
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
                let val = 'TPE';
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
function optionST(selector) {
    let val = 'ST';
    $.ajax({
        url: base_url + 'katalog/dafsb/' + val,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.length > 0) {
                selector.empty(); // Clear options in the targeted <select>
                $.each(response, function(index, item) {
                    selector.append('<option value="' + item.nama + '">' + item.nama + '</option>');
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
    });
}
function optionSZ(selector) {
    let val = 'SZ';
    $.ajax({
        url: base_url + 'katalog/dafsb/' + val,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.length > 0) {
                selector.empty(); // Clear options in the targeted <select>
                $.each(response, function(index, item) {
                    selector.append('<option value="' + item.nama + '">' + item.nama + '</option>');
                });
            }
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
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
    $('#form-log').off('submit').on("submit", function (e) {
        e.preventDefault();
        $('#spinner_sublog').removeClass('d-none');
        $('#tx_sublog').addClass('d-none');
        $('#sublog').prop('disabled', true);

        var fileInput = $("#imgm")[0];
        if (!fileInput.files.length) {
            swal("Gagal menambahkan data katalog", "Harap pilih gambar", {
                icon: "error",
            }).then(function() {
                $("#upload-btn").focus();
                $('#spinner_sublog').addClass('d-none');
                $('#tx_sublog').removeClass('d-none');
                $('#sublog').prop('disabled', false);
            });
            return;
        }

        var tableData = [];
        $('#table-body tr').each(function () {
            var row = {
                sizelog: $(this).find('select[name="sizelog[]"]').val(),
                satlog: $(this).find('select[name="satlog[]"]').val(),
                logp: $(this).find('input[name="logp[]"]').val(),
                logl: $(this).find('input[name="logl[]"]').val(),
                logld: $(this).find('input[name="logld[]"]').val(),
                logpb: $(this).find('input[name="logpb[]"]').val(),
                loghj: parseFloat($(this).find('input[name="loghj[]"]').val().replace(/\D/g, ''))
            };
            tableData.push(row);
        });

        if (tableData.length === 0) {
            swal("Katalog Tidak Lengkap", "Harap isi detail katalog", {
                icon: "warning",
            }).then(function() {
                $('#spinner_sublog').addClass('d-none');
                $('#tx_sublog').removeClass('d-none');
                $('#sublog').prop('disabled', false);
                $('#logdtl').css('color', 'red');
            });
            return;
        }

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
                    swal("Katalog berhsail ditambahkan", {
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
            complete: function() {
                $('#form-log').find('select').val('0').trigger('change.select2');
                $('#form-log').find('input, textarea').val('');
                $('#logdtl').css('color', 'black');
                $('#table-body').empty();
                $('#imgm').val('');
                $('#upload-btn').css('background-image', 'none');
                $('#spinner_sublog').addClass('d-none');
                $('#tx_sublog').removeClass('d-none');
                $('#sublog').prop('disabled', false);
                generateid();
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
                                <img class="img-50 me-2" src="${base_url+'assets/lvaimages/katalog/'+row.img_katalog}" alt="katalog">
                                <strong>${row.id_katalog} | ${row.nama_katalog}</strong>
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
                                    <li class="list-group-item">${row.tipe_katalog}</li>
                                    <li class="list-group-item">${row.merk_katalog}</li>
                                    <li class="list-group-item">${row.warna_katalog}</li>
                                </ul>
                            `;
                        }
                        return data;
                    }
                },
                {
                    "data":"ukuran",
                },
                {
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            if(data ==="Aktif"){
                                return `<strong class="f-light text-success">Aktif</strong>`;
                            } else if(data==="Tidak"){
                                return `<strong class="f-light text-warning">Tidak Aktif</strong>`;
                            }
                            return data; // return the original value for other cases
                        }
                        return data;
                    }
                },
                {
                    "data": "id_katalog",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <button class="btn btn-info-gradien dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                    <div class="dropdown-menu">
                                        ${(full.status === "Aktif" ) ? `
                                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#DetailKatalog">Detail Katalog</a>
                                        ` : ''}
                                        ${(full.status === "Tidak" ) ? `
                                            <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#AddMaterial" data-id="${data}" data-nk="${full.nama_katalog}" >Bahan & Produk</a>
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
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (data) {
                var groups = {};
                var results = [];
    
                data.forEach(function (item) {
                    var groupName = item.id_katalog +' | '+item.nama_katalog;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_katalog_dtl,
                        text: ' Size : ('+item.size+') ',
                        pj : item.panjang,
                        lb : item.lebar,
                        ld : item.ukuran_ld,
                        pb: item.ukuran_pb
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
    $('#selsize').on('select2:select', function(e) {
        $('#pj').val(formatNumber(e.params.data.pj));
        $('#lb').val(formatNumber(e.params.data.lb));
        $('#ld').val(formatNumber(e.params.data.ld));
        $('#pb').val(formatNumber(e.params.data.pb));
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
    $('#AddMaterial').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var idk = button.data('id');
        $('#skudtl').text(button.data('id')+' '+button.data('nk'));
        
    
        getSelect2(idk);
        // generateid();
        // addpmbm();
        // tabmat();               
    });
}
