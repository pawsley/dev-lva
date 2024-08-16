var tabcst;
var formatcur = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
$(document).ready(function() {
    menucustomer();
});

function menucustomer() {
    if (window.location.href === base_url+'customer/buat-baru') {
        getselect2();
        newmod();
        dafmod();
        generateid();
        createdata();
        addcst();
    } else if (window.location.href === base_url+'customer/daftar-customer'){
        tablecst();
        editcst();
        deletedata();
    }
}
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'MasterCustomer/generateid',
            type: 'GET',
            dataType: 'json'
        });
        const def = response.defID;
        const opnameid = response.newID;

        if (opnameid !== def) {
            $('#idc').val(opnameid);
        } else {
            $('#idc').val(def);
        }
    } catch (error) {
        console.error('Error fetching id data:', error);
    }
}
function createdata() {
    $('#form-cst').off('submit').on('submit', function(e) {

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: base_url+'/servis/tambah-servis', 
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status ==='success') {
                    Swal.fire({
                        title: 'Success',
                        text: "Data berhasil ditambahkan",
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    })
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); 
            },
            complete: function() {
                $('#spinner-srv').addClass('d-none');
                $('#txsubsrv').removeClass('d-none');
                $('#subsrv').prop('disabled', false);
            }
        });
    });
}
function getselect2() {
    $('#tpc').select2({
        placeholder: 'Pilih Tipe Customer',
        allowClear: true,
        language: 'id',
        ajax: {
            url: base_url + 'MasterCustomer/loadtipe',
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
                            id: item.nama_sbc,
                            text: item.nama_sbc,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}
function newmod() {
    $('#TambahSubKategoriItem').on('shown.bs.modal', function () {
        setTimeout(function() {
            $('#item').val('').focus();
        }, 200);
    });
    $('.shownewmod').on('click', function () {
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
                url: base_url+"customer/newsb",
                data: {
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
        fetchdafmodal();
        updatedaf();
        deletedaf(id);
    });
}
function fetchdafmodal() {
    $('#daf-container').empty();
    
    $.ajax({
        type: 'GET',
        url: base_url+'MasterCustomer/loadtipe/',
        dataType: 'json',
        success: function(response) {
            if (response.length===0) {
                $('#daf-container').append('<h5 class="text-center">No Data</h5>');
                $('#editmod').addClass('d-none');
            }else{
                $.each(response, function(index, daf) {
                    var dafContainer = $('<div class="row mt-2 daf-item">');
                    var inputField = $('<input class="form-control daf-name" data-id="'+daf.id_sbc+'" type="text">')
                                        .val(daf.nama_sbc);
                    var deleteButton = $('<button class="btn btn-danger deldaf" data-id="'+daf.id_sbc+'" type="button"><i class="fa fa-trash"></i></button>');
    
                    dafContainer.append($('<div class="col-10">').append(inputField));
                    dafContainer.append($('<div class="col-2">').append(deleteButton));
    
                    $('#daf-container').append(dafContainer);
                });
            }
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
            url: base_url + 'MasterCustomer/updatedaf', 
            contentType: 'application/json',
            data: jsonData,
            success: function(response) {
                swal("Updated!", {
                    icon: "success",
                }).then(function() {
                    fetchdafmodal();
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
                    url: base_url + 'MasterCustomer/deletedaf/' + dafId,
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
function addcst() {
    $('#form-cst').off('submit').on('submit', function(e) {
        e.preventDefault();
        $('#spinner_cst').removeClass('d-none');
        $('#tx_subcst').addClass('d-none');
        $('#subcst').prop('disabled', true);

        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: base_url+'customer/input-data', 
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status ==='success') {
                    swal("Data berhasil ditambahkan", {
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                } else {
                    swal("Data gagal ditambahkan", {
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
                $('#form-cst').find('input, textarea').val('');
                $('#form-cst').find('select').val('0').trigger('change.select2');
                $('#spinner_cst').addClass('d-none');
                $('#tx_subcst').removeClass('d-none');
                $('#subcst').prop('disabled', false);
                generateid();
            }
        });
    });
}
function tablecst() {
    $.getJSON(base_url+'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        if ($.fn.DataTable.isDataTable('#table-customer')) {
            tabcst.destroy();
        }
        tabcst = $("#table-customer").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url+'customer/list-customer',
                "type": "POST"
            },
            "columns": [
                { "data": "id_cst"},
                { "data": "nama_cst"},
                { "data": "tipe_cst"},
                { "data": "email_cst"},
                { "data": "wa_cst" },
                { 
                    "data": "saldo_cst",
                    "render": function (data, type, row) {
                        return formatcur.format(data);
                    }
                },
                { 
                    "data": "id_cst",
                    "orderable": false, // Disable sorting for this column
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <ul class="action">
                                        <div class="btn-group">
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditMasterCustomer" 
                                            data-id="${data}" data-tpc="${full.tipe_cst}" data-nmc="${full.nama_cst}" data-emc="${full.email_cst}" data-wac="${full.wa_cst}"
                                            data-prov="${full.provinsi}" data-kab="${full.kabupaten}" data-kec="${full.kecataman}" data-kp="${full.kode_pos}" data-alm="${full.alamat_cst}" data-sts="${full.status}"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-success"><i class="fa fa-external-link-square"></i></button>
                                            <button class="btn btn-secondary" id="delete-data" data-id="${data}"><i class="icon-trash"></i></button>
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
                        tabcst.ajax.reload();
                    }
                }
            ]                                    
        });  
    }); 
}
function editcst() {
    $('#EditMasterCustomer').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget);

        $('#enmc').val(button.data('nmc'));
        $('#eidc').val(button.data('id'));
        $('#emc').val(button.data('emc'));
        $('#ewac').val(button.data('wac'));
        $('#eprov_name').val(button.data('prov'));
        $('#ekab_name').val(button.data('kab'));
        $('#ekec_name').val(button.data('kec'));
        $('#ekode_pos').val(button.data('kp'));
        $('#ealamat').val(button.data('alm'));
        $('#etpc').select2({
            placeholder: 'Pilih Tipe Customer',
            dropdownParent: $("#EditMasterCustomer"),
            language: 'id',
            ajax: {
                url: base_url + 'MasterCustomer/loadtipe',
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
                                id: item.nama_sbc,
                                text: item.nama_sbc,
                            };
                        }),
                    };
                },
                cache: false,
            },
        });
        $("#etpc").empty().append('<option value="' + button.data('tpc') + '">' +button.data('tpc')+ '</option>').trigger('change.select2');
        $('#estatus').select2({
            dropdownParent: $("#EditMasterCustomer"),
            language: 'id',
        });
        $("#estatus").val(button.data('sts')).trigger('change');
        updatecst(button.data('id'));
    });
}
function updatecst(id) {
    $('#form-ecst').off('submit').on('submit', function(e) {
        e.preventDefault();
        $('#spinner_ecst').removeClass('d-none');
        $('#tx_esubcst').addClass('d-none');
        $('#esubcst').prop('disabled', true);
        $.ajax({
            type: 'POST',
            url: base_url + 'customer/update-data', 
            dataType: "json", 
            data: {
                eidc: $('#eidc').val(),
                enmc: $('#enmc').val(),
                ewac: $('#ewac').val(),
                emc: $('#emc').val(),
                etpc: $('#etpc').val(),
                eprov_name: $('#eprov_name').val(),
                ekab_name: $('#ekab_name').val(),
                ekec_name: $('#ekec_name').val(),
                ekode_pos: $('#ekode_pos').val(),
                ealamat: $('#ealamat').val(),
                estatus: $('#estatus').val(),
            },
            success: function(response) {
                if (response.status ==='success') {
                    swal("Data berhasil diupdate", {
                        icon: "success",
                        buttons: false,
                        timer: 1000
                    });
                } else {
                    swal("Data gagal diupdate", {
                        icon: "error",
                        buttons: false,
                        timer: 1000
                    });
                }
            },
            complete: function() {
                $('#spinner_ecst').addClass('d-none');
                $('#tx_esubcst').removeClass('d-none');
                $('#esubcst').prop('disabled', false);
                tabcst.ajax.reload();
            }
        });
    });
}
function deletedata() {
    $('#table-customer').on('click', '#delete-data', function (e) {
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
                $.ajax({
                    type: 'POST',
                    url: base_url + 'customer/delete-data/' + id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal('Deleted!', response.message, 'success');
                        } else {
                            swal('Error!', response.message, 'error');
                        }
                    },
                    error: function (error) {
                        swal('Error!', 'An error occurred while processing the request.', 'error');
                    },
                    complete: function() {
                        tabcst.ajax.reload();
                    }
                });
            }
        });        
    });
}