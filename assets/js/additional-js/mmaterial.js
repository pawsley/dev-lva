var tableMat;
$(document).ready(function() {
    generateid();
    newmod();
    dafmod();
    imgpreview();
    getselect2();
    createdata();
    tabmat();
    editmtrl();
    deletedata();
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
        }
    });
}
function clearImgPreview() {
    // Reset the file input
    $('#imgm').val('');

    // Remove the background image from the preview button
    $('#upload-btn').css('background-image', 'none');
}
function edimgpreview() {
    $('#eupload-btn').on('click', function() {
        $('#eimgm').click();
    });

    $('#eimgm').on('change', function(event) {
        const file = event.target.files[0];
        const $uploadBtn = $('#eupload-btn');

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
    $('#tipk').select2({
        language: 'id',
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
    });
}
function edgetselect2() {    
    $('#ekatm').select2({
        language: 'id',
        dropdownParent: $("#EditMasterMaterial"),
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
    $('#etipk').select2({
        dropdownParent: $("#EditMasterMaterial"),
        language: 'id',
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
    });
    $('#ewrnm').select2({
        language: 'id',
        dropdownParent: $("#EditMasterMaterial"),
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
    $('#esatm').select2({
        language: 'id',
        dropdownParent: $("#EditMasterMaterial"),
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
							var imgtag = '';
							row.img_material == null || row.img_material == "" ? '' : imgtag = `<img class="img-30 me-2" src="${base_url+'assets/lvaimages/material/'+row.img_material}" alt="material">`;
                            return `
                            <div class="product-names">
                                ${imgtag}
                                <p>${data}</p>
                            </div>
                            `;
                        }
                        return data;
                    },
                },
                { "data": "tipe_material"},
                { "data": "nama" },
                { "data": "harga_material",
                    "render": function (data, type, row) {
                        return formatcurrency.format(data);
                    }
                },
                { "data": "kat_material"},
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
                                            <button class="btn" id="edit-btn" type="button" 
                                                data-id="${data}" data-nm="${full.nama_material}" data-kt="${full.kat_material}"
                                                data-mk="${full.merk_material}" data-wn="${full.warna_material}" data-st="${full.sat_material}" data-img="${full.img_material}"
                                                data-tm="${full.tipe_material}" data-hm="${full.harga_material}" data-idsc="${full.id_sizechart}" data-nmtk="${full.nama}"
                                                data-bs-toggle="modal" data-bs-target="#EditMasterMaterial">
                                                <i class="icon-pencil"></i>
                                            </button>
                                        </li>
                                        <li class="delete">
                                            <button class="btn" id="delete-btn" type="button" data-id="${data}" data-img="${full.img_material}">
                                                <i class="icon-trash"></i>
                                            </button>
                                        </li>
                                    </ul>
                                `;
                            } else if(full.status === "1") {
                                return `
                                    <ul class="action">
                                        <li class="edit">
                                            <button class="btn" id="edit-btn-disabled" type="button"><i class="icon-pencil disabled"></i></button>
                                        </li>
                                        <li class="delete">
                                            <button class="btn" id="delete-btn-disabled" type="button"><i class="icon-trash disabled"></i></button>
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
function createdata() {
    $("#addm").off('click').on("click", function () {
        // var requiredFields = ['idm', 'nmm', 'katm', 'tipm', 'wrnm', 'satm','nhm'];
        // for (var i = 0; i < requiredFields.length; i++) {
        //     var fieldId = requiredFields[i];
        //     var fieldValue = $("#" + fieldId).val().trim();
        //     if (fieldValue === "") {
        //         swal("Gagal menambahkan data material", "Harap lengkapi semua kolom yang diperlukan", {
        //             icon: "error",
        //         }).then(function() {
        //             $("#" + fieldId).focus();
        //         });
        //         return;
        //     }
        // }
        var fileInput = $("#imgm")[0];
        // if (fileInput.files.length === 0) {
        //     swal("Gagal menambahkan data material", "Harap pilih gambar", {
        //         icon: "error",
        //     }).then(function() {
        //         $("#imgm").focus();
        //     });
        //     return;
        // }

        var formData = new FormData();
        formData.append('kode', $("#idm").val());
        formData.append('nama', $("#nmm").val());
        formData.append('kat', $("#katm").val());
        formData.append('warna', $("#wrnm").val());
        formData.append('sat', $("#satm").val());
        formData.append('hrg', parseFloat($("#nhm").val().replace(/\./g, '')));
        formData.append('tipe', $("#tipm").val());
        formData.append('tipk', $("#tipk").val());
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
                        buttons: false,
                        timer: 1000
                    }).then(function() {
                        //  window.location.href = base_url+"master-material";
                        $('#form-crem').find('input').val('');
                        $('#form-crem').find('select').val('0').trigger('change.select2');
                        clearImgPreview();
                        generateid();
                        tableMat.ajax.reload();
                    });
                }  else {
                    swal("Gagal menambahkan data material, " + response.message, {
                        icon: "error",
                    });
                }
            },
            error: function (error) {
                swal("Gagal!: " + error.status, {
                    icon: "error",
                });
            }
        });
    });
}
function editmtrl() {
    $('#EditMasterMaterial').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        const $uploadBtn = $('#eupload-btn');
        edgetselect2();
    
        $('#eidm').val(button.data('id'));
        $('#enmm').val(button.data('nm'));
        $('#etipm').val(button.data('tm'));
        $('#enhm').val(formatdecimal.format(button.data('hm')));
        $("#etipk").empty().append('<option value="' + button.data('idsc') + '">' + button.data('nmtk') + '</option>').trigger('change.select2');
        $("#ekatm").empty().append('<option value="' + button.data('kt') + '">' + button.data('kt') + '</option>').trigger('change.select2');
        $("#ewrnm").empty().append('<option value="' + button.data('wn') + '">' + button.data('wn') + '</option>').trigger('change.select2');
        $("#esatm").empty().append('<option value="' + button.data('st') + '">' + button.data('st') + '</option>').trigger('change.select2');
        $uploadBtn.css('background-image', 'url(' +base_url+"/assets/lvaimages/material/"+ button.data('img') + ')');
        $('#oldimg').val(button.data('img'));
        edimgpreview();
        updatedata();
    });
}
function updatedata() {
    $("#edmtr").off('click').on("click", function (e) {
        e.preventDefault();
    
        var fileInput = $("#eimgm")[0];
        var oldImage = $("#oldimg").val(); // Previous image URL
        var formData = new FormData();
        formData.append('oldimg', oldImage);
        // Append the new file to formData if selected
        if (fileInput.files.length > 0) {
            formData.append('img_material', fileInput.files[0]);
        }
    
        // Add other form data
        formData.append('eidm', $('#eidm').val());
        formData.append('enmm', $('#enmm').val());
        formData.append('etipm', $('#etipm').val());
        formData.append('etipk', $('#etipk').val());
        formData.append('ehrgm', parseFloat($("#enhm").val().replace(/\./g, '')));
        formData.append('ekatm', $('#ekatm').val());
        formData.append('ewrnm', $('#ewrnm').val());
        formData.append('esatm', $('#esatm').val());
    
        $.ajax({
            url: base_url + 'master-material/update-data',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                swal("Data material berhasil diupdate", {
                    icon: "success",
                    buttons: false,
                    timer: 1000
                }).then(function() {
                    $('#EditMasterMaterial').modal('hide');
                    tableMat.ajax.reload();
                });
            },
            error: function(xhr, status, error) {
                // Handle error
                swal("Error", "Failed to update data", "error");
                console.error('Error:', status, error);
            }
        });
    });
}
function deletedata() {
    $(document).on('click', '#delete-btn', function (e) {
        e.preventDefault();
    
        var idm = $(this).data('id');
        var img = $(this).data('img');
    
        swal({
            title: 'Apa anda yakin?',
            content: {
                element: 'span',
                attributes: {
                    innerHTML: 'Menghapus data material <strong>' + idm + '</strong>.'
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
                    url: base_url + 'master-material/hapus-data/',
                    dataType: "json", 
                    data: {
                        idm: idm,
                        img: img
                    },
                    success: function (response) {
                        if (response.success) {                            
                            swal(response.message, {
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then(function() {
                                tableMat.ajax.reload();
                                generateid();
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
