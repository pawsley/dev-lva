var tableMat;
$(document).ready(function() {
    generateid();
    newmod();
    dafmod();
    imgpreview();
    getselect2();
    createdata();
    tabmat();
});

async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'MasterMaterial/generateid',
            type: 'GET',
            dataType: 'json'
        });
        const def = response.defID;
        const opnameid = response.newID;

        if (opnameid !== def) {
            $('#idm').val(opnameid);
        } else {
            $('#idm').val(def);
        }
    } catch (error) {
        console.error('Error fetching id data:', error);
    }
}

function newmod() {
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
                swal("Error", "Item tidak boleh kosong", "error");
                return;
            } 
            $.ajax({
                type: "POST",
                url: "master-material/newsb",
                data: {
                    kodekat: id,
                    namakat: item,
                },
                dataType: "json", 
                success: function (response) {
                    if (response.status === 'success') {
                        swal("Data berhasil ditambahkan", {
                            icon: "success",
                        });
                        $('#item').val('');
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
function dafmod() {
    $('.showdafmod').on('click', function () {
        let id = $(this).data('id');
        let title = $(this).data('title');

        $('#labdaf').text(title);
        fetchdafmodal(id);
        updatedaf();
        deletedaf(id);
    });
}
function fetchdafmodal(val) {
    $('#daf-container').empty();
    
    $.ajax({
        type: 'GET',
        url: base_url+'MasterMaterial/loadkat/' + val,
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
function updatedaf() {
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
            url: base_url + 'MasterMaterial/updatedaf', 
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
function deletedaf(val) {
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
                    url: base_url + 'MasterMaterial/deletedaf/' + dafId,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", {
                                icon: "success",
                            }).then(function() {
                                fetchdafmodal(val)
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
            console.log(file);
        }
    });
}
function getselect2() {    
    $('#katm').select2({
        language: 'id',
        ajax: {
            url: function() {
                let val = 'KAT';
                return base_url + 'MasterMaterial/loadkat/' + val;
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
    $('#mrkm').select2({
        language: 'id',
        ajax: {
            url: function() {
                let val = 'MRK';
                return base_url + 'MasterMaterial/loadkat/' + val;
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
    $('#wrnm').select2({
        language: 'id',
        ajax: {
            url: function() {
                let val = 'WRN';
                return base_url + 'MasterMaterial/loadkat/' + val;
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
    $('#satm').select2({
        language: 'id',
        ajax: {
            url: function() {
                let val = 'SAT';
                return base_url + 'MasterMaterial/loadkat/' + val;
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
function createdata() {
    $("#addm").on("click", function () {
        var requiredFields = ['idm', 'nmm', 'katm', 'mrkm', 'wrnm', 'satm'];
        for (var i = 0; i < requiredFields.length; i++) {
            var fieldId = requiredFields[i];
            var fieldValue = $("#" + fieldId).val().trim();
            if (fieldValue === "") {
                swal("Gagal menambahkan data material", "Harap lengkapi semua kolom yang diperlukan", {
                    icon: "error",
                }).then(function() {
                    $("#" + fieldId).focus();
                });
                return;
            }
        }
        var fileInput = $("#imgm")[0];
        console.log(fileInput);
        if (fileInput.files.length === 0) {
            swal("Gagal menambahkan data material", "Harap pilih gambar", {
                icon: "error",
            }).then(function() {
                $("#imgm").focus();
            });
            return;
        }

        var formData = new FormData();
        formData.append('kode', $("#idm").val());
        formData.append('nama', $("#nmm").val());
        formData.append('kat', $("#katm").val());
        formData.append('merk', $("#mrkm").val());
        formData.append('warna', $("#wrnm").val());
        formData.append('sat', $("#satm").val());
        formData.append('img_material', fileInput.files[0]);
        $.ajax({
            type: "POST",
            url: base_url+"master-material/simpan-data",
            data: formData,
            processData: false, 
            contentType: false,
            dataType: "json", 
            success: function (response) {
                if (response.status === 'success') {
                    swal("Data material berhasil ditambahkan", {
                        icon: "success",
                    }).then(function() {
                         window.location.href = base_url+"master-material";
                        //  reload();
                    });
                }  else {
                    swal("Gagal menambahkan data material, " + response.message, {
                        icon: "error",
                    });
                }
            },
            error: function (error) {
                console.log(error); // Log the error to debug
                swal("Gagal!: " + error.status, {
                    icon: "error",
                });
            }
        });
    });
}
function tabmat() {  
    $.getJSON('//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        if ($.fn.DataTable.isDataTable('#table-material')) {
            tableMat.destroy();
        }
        tableMat = $("#table-material").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url+'master-material/list-material',
                "type": "POST"
            },
            "columns": [
                { "data": "kode_material"},
                { 
                    "data": "nama_material",
                    "render": function(data, type, row) {
                        if (type === "display") {
                            return `
                            <div class="card" style="width: 50%; margin: auto;">
                                <div style="overflow: hidden; border-top-left-radius: .25rem; border-top-right-radius: .25rem;">
                                    <img class="img-fluid" src="${base_url+'assets/lvaimages/material/'+row.img_material}" alt="Image Material" loading="lazy" style="width: 100%; height: auto;">
                                </div>
                                <p class="card-title" style="text-align: center;">${data}</p>
                            </div>
                            `;
                        }
                        return data;
                    },
                },
                { "data": "kat_material"},
                { "data": "merk_material"},
                { "data": "warna_material" },
                { "data": "sat_material" },
                { 
                    "data": "kode_material",
                    "orderable": false, // Disable sorting for this column
                    "render": function(data, type, full, meta) {
                        if (type === "display") {
                            if (full.status === "0") { 
                                return `
                                    <ul class="action">
                                        <li class="edit">
                                            <button class="btn" id="edit-btn" type="button" data-id="${data}" data-bs-toggle="modal" data-bs-target="#EditMasterMaterial"><i class="icon-pencil"></i></button>
                                        </li>
                                        <li class="delete">
                                            <button class="btn" id="delete-btn" type="button" data-id="${data}"><i class="icon-trash"></i></button>
                                        </li>
                                    </ul>
                                `;
                            } else if(full.status === "1") {
                                return `
                                    <ul class="action">
                                        <li class="edit">
                                            <button class="btn" id="edit-btn" type="button" data-id="${data}" data-bs-toggle="modal" data-bs-target="#EditMasterMaterial"><i class="icon-pencil disabled"></i></button>
                                        </li>
                                        <li class="delete">
                                            <button class="btn" id="disabled-btn" type="button" data-id="${data}"><i class="icon-trash disabled"></i></button>
                                        </li>
                                    </ul>
                                `;
                            }
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
                    "text": 'Refresh', // Font Awesome icon for refresh
                    "className": 'custom-refresh-button', // Add a class name for identification
                    "attr": {
                        "id": "refresh-button" // Set the ID attribute
                    },
                    "init": function (api, node, config) {
                        $(node).removeClass('btn-default');
                        $(node).addClass('btn-primary');
                        $(node).attr('title', 'Refresh'); // Add a title attribute for tooltip
                    },
                    "action": function () {
                        tableMat.ajax.reload();
                    }
                }
            ]                                    
        });  
    }); 
}