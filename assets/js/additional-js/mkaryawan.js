var tkar;
$(document).ready(function() {
    reload();
    getid();
    rolejab();
    addroljab();
    deletedata();
    createdata();
    show_hide();
    getbank();
    loadrolekat();
});
function getbank() {
    $('#bank').select2({
        language: 'id',
        ajax: {
            url: base_url + 'MasterBank/bank_json',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.code + ' | ' + item.name,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}

function rolejab() {
    $('#jabatan').select2({
        language: 'id',
        ajax: {
            url: base_url + 'MasterKaryawan/loadjab',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.nama_jab,
                            text: item.nama_jab,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
    $('#role').select2({
        language: 'id',
        ajax: {
            url: base_url + 'MasterKaryawan/loadrole',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.nama_role,
                            text: item.nama_role,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}
function addroljab(){
    $("#tambahjab").on("click", function () {
        var jabatan = $("#jabkar").val();

        if (!jabatan) {
            swal("Error", "Form masih kosong", "error").then(() => {
                $("#jabkar").focus();
            });
            return;
        }
        $.ajax({
            type: "POST",
            url: "MasterKaryawan/createjabatan",
            data: {
                namajab: jabatan
            },
            dataType: "json", 
            success: function (response) {
                if (response.status === 'success') {
                    swal("Berhasil ditambahkan", {
                        icon: "success",
                    });
                    $("#jabkar").val('');
                    $('#TambahJabatanBaru').modal('hide');
                } else if (response.status === 'exists') {
                    swal("Warning", "Nama sudah ada", "warning").then(() => {
                        $("#jabkar").val('');
                        $("#jabkar").focus();
                    });
                    return;
                }
            },
            error: function (error) {
                swal("Gagal ", {
                    icon: "error",
                });
            }
        });
    });
    $("#tambahrole").on("click", function () {
        var role = $("#rolekar").val();

        if (!role) {
            swal("Error", "Form masih kosong", "error").then(() => {
                $("#rolekar").focus();
            });
            return;
        }
        $.ajax({
            type: "POST",
            url: "MasterKaryawan/createrole",
            data: {
                namarole: role
            },
            dataType: "json", 
            success: function (response) {
                if (response.status === 'success') {
                    swal("Berhasil ditambahkan", {
                        icon: "success",
                    });
                    $("#rolekar").val('');
                    $('#TambahRoleBaru').modal('hide');
                } else if (response.status === 'exists') {
                    swal("Warning", "Nama sudah ada", "warning").then(() => {
                        $("#rolekar").val('');
                        $("#rolekar").focus();
                    });
                    return;
                }
            },
            error: function (error) {
                swal("Gagal ", {
                    icon: "error",
                });
            }
        });
    });
}
function getid() {
    $('#EditMasterKaryawan').on('show.bs.modal', function (event) {
        $('#e_role').select2({
            dropdownParent: $("#EditMasterKaryawan"),
            language: 'id',
            ajax: {
                url: base_url + 'MasterKaryawan/loadrole',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // Add the search term to your AJAX request
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                id: item.nama_role,
                                text: item.nama_role,
                            };
                        }),
                    };
                },
                cache: false,
            },
        });
        var button = $(event.relatedTarget);
        var id_user = button.data('id');

        $.ajax({
            url: base_url + "master-karyawan/edit/"+id_user,
            dataType: "json",
            success: function(data) {
                $.each(data.get_id, function(index, item) {
                    $("#e_id").val(item.id_user);
                    $("#e_nl").val(item.nama_lengkap);
                    $("#e_tl").val(item.tanggal_lahir);
                    $("#e_jk").val(item.jen_kel);
                    $("#e_email").val(item.email);
                    $("#e_password").val(item.password);
                    $("#ex_prov").val(item.provinsi);
                    $("#ex_kab").val(item.kabupaten);
                    $("#ex_kec").val(item.kecamatan);
                    $("#e_kode").val(item.kode_pos);
                    $("#e_alamat").val(item.alamat);
                    $("#e_wa").val(item.no_wa);
                    $("#oldfile").val(item.file_cv);
                    $("#filecv_filename").attr("href", base_url+"assets/dhdokumen/karyawan/" + item.file_cv);
                    $("#filecv").text(item.file_cv);
                    $("#e_jabatan").empty().append('<option value="' + item.jabatan + '">' +item.jabatan+ '</option>').trigger('change.select2');
                    $("#e_role").empty().append('<option value="' + item.role_user + '">' +item.role_user+ '</option>').trigger('change.select2');
                    $("#e_gaji").val(item.gaji);
                    formatRupiah(document.getElementById("e_gaji"));
                    $("#e_status").val(item.status);
                });
            }
        });
        updatedata();
    });
}
function createdata() {
    $("#addkar").on("click", function () {
        var requiredFields = ['id', 'nl', 'tl', 'jk', 'email', 'password', 'role'];
        for (var i = 0; i < requiredFields.length; i++) {
            var fieldId = requiredFields[i];
            var fieldValue = $("#" + fieldId).val().trim();
            if (fieldValue === "") {
                swal("Gagal menambahkan data karyawan", "Harap lengkapi semua kolom yang diperlukan", {
                    icon: "error",
                }).then(function() {
                    $("#" + fieldId).focus();
                });
                return;
            }
        }

        var formData = new FormData();
        formData.append('id_karyawan', $("#id").val());
        formData.append('nama_karyawan', $("#nl").val());
        formData.append('tanggal_lahir', $("#tl").val());
        formData.append('jen_kel', $("#jk").val());
        formData.append('email', $("#email").val());
        formData.append('password', $("#password").val());
        formData.append('provinsi', $("#prov_name").val());
        formData.append('kabupaten', $("#kab_name").val());
        formData.append('kecamatan', $("#kec_name").val());
        formData.append('kode_pos', $("#kode_pos").val());
        formData.append('alamat', $("#alamat").val());
        formData.append('no_wa', $("#wa").val());
        formData.append('file_cv', $("#file")[0].files[0]);
        formData.append('role_user', $("#role").val());
        formData.append('tipe_gaji', $("#tg").val());
        formData.append('bank_acc', $("#bank").val());
        formData.append('norek', $("#norek").val());
        formData.append('gaji', parseFloat($("#gaji").val().replace(/\D/g, '')));
        $.ajax({
            type: "POST",
            url: base_url+"master-karyawan/simpan-data",
            data: formData,
            processData: false, 
            contentType: false,
            dataType: "json", 
            success: function (response) {
                if (response.status === 'success') {
                    swal("Data karyawan berhasil ditambahkan", {
                        icon: "success",
                    }).then(function() {
                         window.location.href = base_url+"master-karyawan";
                         reload();
                    });
                }  else {
                    swal("Gagal menambahkan data karyawan, " + response.message, {
                        icon: "error",
                    });
                }
            },
            error: function (error) {
                console.log(error); // Log the error to debug
                swal("Gagal terdaftar: " + error.status, {
                    icon: "error",
                });
            }
        });
    });
}
function updatedata() {
    $("#update").on("click", function () {
        var id = $("#e_id").val();
        var nama = $("#e_nl").val();
        var tgl = $("#e_tl").val();
        var jk = $("#e_jk").val();
        var email = $("#e_email").val();
        var password = $("#e_password").val();
        var prov = $("#ex_prov").val();
        var kab = $("#ex_kab").val();
        var kec = $("#ex_kec").val();
        var kode = $("#e_kode").val();
        var alamat = $("#e_alamat").val();
        var wa = $("#e_wa").val();
        var jabatan = $("#e_jabatan").val();
        var role = $("#e_role").val();
        var gaji = parseFloat($("#e_gaji").val().replace(/\D/g, ''));
        var status = $("#e_status").val();
        var fileInput = $('#e_filecv')[0].files[0];
        var oldfile = $("#oldfile").val();
        var formData = new FormData();
        formData.append('eid', id);
        formData.append('enama', nama);
        formData.append('etgl', tgl);
        formData.append('ejk', jk);
        formData.append('email', email);
        formData.append('epassword', password);
        formData.append('eprov', prov);
        formData.append('ekot', kab);
        formData.append('ekec', kec);
        formData.append('ekode', kode);
        formData.append('ealamat', alamat);
        formData.append('ewa', wa);
        formData.append('ejabatan', jabatan);
        formData.append('erole', role);
        formData.append('egaji', gaji);
        formData.append('estatus', status);

        if (fileInput) {
            formData.append('e_filecv', fileInput); // Add new file to FormData
        } else {
            // If no file is selected, add old file name to FormData
            formData.append('efile', oldfile);
        }

        $.ajax({
            type: "POST",
            url: "master-karyawan/update-data",
            data: formData,
            contentType: false,
            processData: false, // Prevent jQuery from processing the data
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    swal("Data berhasil diupdate", {
                        icon: "success",
                    }).then((value) => {
                        reload();
                    });
                } else {
                    swal("Gagal update data", {
                        icon: "error",
                    });
                }
            },
            error: function (error) {
                swal("Gagal", {
                    icon: "error",
                });
            }
        });
    });
}
function deletedata() {
    $('#table-karyawan').on('click', '#delete-btn', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
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
        }).then((willDelete) => {
            if (willDelete) {
                var formData = new FormData();
                formData.append('idk', id);
                $.ajax({
                    type: 'POST',
                    url: base_url + 'master-karyawan/hapus',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        if (response.result && response.result.success) {
                            swal("Data karyawan berhasil dihapus", {
                                icon: "success",
                            }).then(function() {
                                 window.location.href = base_url+"master-karyawan";
                                 reload();
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
function reload() {
    var formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0 // Set the number of decimal places to 0 for whole numbers
    });
    $.getJSON(base_url+'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        if ($.fn.DataTable.isDataTable('#table-karyawan')) {
            tkar.destroy();
        }
        tkar = $("#table-karyawan").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url+'master-karyawan/jsonkar',
                "type": "POST"
            },
            "columns": [
                { "data": "id_karyawan"},
                { "data": "nama_karyawan"},
                { "data": "role_user" },
                { "data": "email" },
                { 
                    "data": "password",
                    "render": function(data, type, row, meta) {
                        if (type === 'display') {
                            return '<span class="password-masked" style="cursor:pointer;">*********</span>' +
                                    '<span class="password-plain" style="display:none;">' + data + '</span>';
                        }
                        return data;
                    }
                },
                {
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            if (data === "1") {
                                return `<span class="badge rounded-pill badge-success">Aktif</span>`;
                                } else {
                                return `<span class="badge rounded-pill badge-secondary">Non Aktif</span>`;
                            }
                            return data;
                        }
                        return data;
                    }
                },
                { 
                    "data": "id_karyawan",
                    "orderable": false, // Disable sorting for this column
                    "render": function(data, type, full, meta) {
                        if (type === "display") {
                        if (data) {
                            return `
                                <ul class="action" style="justify-content: center;">
                                    <div class="btn-group">
                                        <button title="edit data" class="btn btn-success" id="edit-btn" type="button" 
                                            data-id="${data}" data-nk="${full.nama_karyawan}" data-tl="${full.tanggal_lahir}"
                                            data-jk="${full.jen_kel}" data-em="${full.email}" data-ps="${full.password}" data-prov="${full.provinsi}"
                                            data-kab="${full.kabupaten}" data-kec="${full.kecamatan}" data-kp="${full.kode_pos}" data-al="${full.alamat}"
                                            data-wa="${full.no_wa}" data-file="${full.file_cv}" data-role="${full.role_user}" data-tg="${full.tipe_gaji}"
                                            data-ba="${full.bank_acc}" data-nr="${full.norek}" data-gaji="${full.gaji}" data-stat="${full.status}"
                                            data-bs-toggle="modal" data-bs-target="#EditMasterKaryawan">
                                            <i class="icon-pencil"></i>
                                        </button>
                                        <button title="info data" class="btn btn-primary" id="info-btn" target="_blank" type="button" data-id="${data}"><i class="fa fa-external-link-square"></i></button>
                                        <button title="delete data" class="btn btn-secondary" id="delete-btn" type="button" data-id="${data}"><i class="icon-trash"></i></button>
                                    </div>
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
                        tkar.ajax.reload();
                    }
                }
            ]                                    
        });  
        $('#table-karyawan tbody').on('click', '.password-masked', function() {
            var $plainPassword = $(this).siblings('.password-plain');
            var $maskedPassword = $(this);
            $plainPassword.show();
            $maskedPassword.hide();
        });

        $('#table-karyawan tbody').on('click', '.password-plain', function() {
            var $maskedPassword = $(this).siblings('.password-masked');
            var $plainPassword = $(this);
            $maskedPassword.show();
            $plainPassword.hide();
        });
    });  
}
function fetchrolemodal() {
    $('#roles-container').empty();
    
    // Fetch roles data from the server
    $.ajax({
        type: 'GET',
        url: base_url+'master-karyawan/role-kar',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, role) {
                var roleContainer = $('<div class="row mb-2 role-item">');
                var inputField = $('<input class="form-control role-name" data-id="'+role.id_role+'" type="text">')
                                    .val(role.nama_role);
                var deleteButton = $('<button class="btn btn-danger delrole" data-id="'+role.id_role+'" type="button"><i class="fa fa-trash"></i></button>');

                roleContainer.append($('<div class="col-9">').append(inputField));
                roleContainer.append($('<div class="col-3">').append(deleteButton));

                $('#roles-container').append(roleContainer);
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    }); 
}
function loadrolekat() {
    $('#DaftarSubKategoriItem').on('show.bs.modal', function (event) {
        fetchrolemodal();
        deleterole();
        updaterole();
    });
}
function updaterole() {
    $('#editrole').on('click', function(e) {
        e.preventDefault();
        var rolesData = [];
        $('#roles-container .role-item').each(function() {
            var roleId = $(this).find('.role-name').data('id');
            var roleName = $(this).find('.role-name').val();

            rolesData.push({
                id: roleId,
                name: roleName
            });
        });
        var jsonData = JSON.stringify(rolesData);
        $.ajax({
            type: 'POST',
            url: base_url + 'MasterKaryawan/updaterole', // Replace with your server endpoint
            contentType: 'application/json',
            data: jsonData,
            success: function(response) {
                swal("Updated!", {
                    icon: "success",
                }).then(function() {
                    fetchrolemodal();
                });
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                alert('An error occurred while updating the roles.');
            }
        });
    });
}
function deleterole() {
    $(document).on('click', '.delrole', function(e) {
        e.preventDefault();
        // Get the data-id of the button clicked
        var roleId = $(this).data('id');

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
                    url: base_url + 'MasterKaryawan/deleterole/' + roleId,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", {
                                icon: "success",
                            }).then(function() {
                                fetchrolemodal();
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
function show_hide() {
    $('#togglePassword').on('click', function() {
        var $password = $('#password');
        var $icon = $(this);
        // Toggle the type attribute
        if ($password.attr('type') === 'password') {
            $password.attr('type', 'text');
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $password.attr('type', 'password');
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });  
}
