var tablesize;
$(document).ready(function() {
    getselect2();
    rowsize();
    adddata();
    tabsize();
    addsb();
    dafsb();
    deletedtl();
	edsize();
});
function getselect2() {
    $('#selkat').select2({
        language: 'id',
        placeholder: 'Pilih Tipe',
        dropdownParent: $("#TambahSubKategoriItem"),
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
function rowsize() {
    $('.addrow').on('click', function(e) {
        e.preventDefault(); 
        var newRow = `
            <div class="input-group dlog">
                <input class="form-control" name="size[]" type="text" placeholder="Size" required>
                <input class="form-control" name="nmdtl[]" style="width: 30%;" type="text" placeholder="Masukkan Detail Size" required>
                <input class="form-control" name="valdtl[]" type="number" placeholder="0" required>
                <button class="btn badge-light-primary copyrow"><i class="icon-files"></i></button>
                <a class="btn badge-light-primary deleterow" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
            </div>
        `;
        $('.ipt').append(newRow);
    });
    $(document).on('click', '.copyrow', function(e) {
        e.preventDefault();
        
        let $row = $(this).closest('.dlog');
        let $newRow = $row.clone();
        
        // Clear out ID attributes to prevent conflicts
        $newRow.find('input').each(function() {
            $(this).removeAttr('id');  // Remove the ID to avoid duplication
        });
    
        // Append the cloned row
        $('.ipt').append($newRow);
    });
    $(document).on('click', '.deleterow', function(e) {
        e.preventDefault();
        $(this).closest('.dlog').remove(); 
    });
}
function adddata() {
    $('#formsize').off('submit').on('submit', function (e) {
        e.preventDefault();
        var sizeData = [];
        let tipe = $('#selkat').val();
        $('.ipt').each(function () {
            var tableData = [];
            $(this).find('.dlog').each(function () {
                let size = $(this).find('input[name="size[]"]').val();
                let detail = $(this).find('input[name="nmdtl[]"]').val();
                let value = parseFloat($(this).find('input[name="valdtl[]"]').val()) || 0;    
                tableData.push({
                    sizepost: size,
                    detailpost: detail,
                    valuepost: value
                });
            });
            sizeData.push({
                tipepost: tipe,
                tabledata: tableData
            });
        });
    
        $.ajax({
            url: base_url + 'master-size/add-data',
            type: 'POST',
            data: JSON.stringify(sizeData), // Convert object to JSON string
            contentType: 'application/json', // Specify the content type
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
                $('input[name="size[]"]').val('');
                $('input[name="valdtl[]"]').val('');
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', error);
            }
        });
    });    
}
function tabsize() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-size')) {
            tablesize.destroy();
        }
        
        tablesize = $("#table-size").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'master-size/list-data',
                "type": "POST",
            },
            'rowsGroup': [0],
            "columns": [
                {
                    "data": "datasize",
                    "render": function(data, type, row) {
                        return row.nama + ' <b>('+row.ukuran+')</b>';
                    }
                },
                {
                    "data": "detail_size",
                },
                {
                    "data": "val_size",
                    "render": function(data, type, row) {
                        return data + ' CM';
                    }
                },
                {
                    "data": "id_szdtl",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <ul class="action">
                                        <div class="btn-group">
                                            <button class="btn btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#EditDetailSize" 
                                            data-id="${data}"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-secondary" id="delete-data" data-id="${data}" data-idsz="${full.id}"><i class="icon-trash"></i></button>
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
                        tablesize.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
    });
}
function edsize() {
    $('#table-size tbody').on('click', '.edit-btn', function () {
        var data = tablesize.row($(this).closest('tr')).data();
		var datsz = data.datasize.split('(')[0].trim();
		// console.log(data);
		// getselect2();
        $('#EditDetailSize').find('#usize').val(data.ukuran);
        $('#EditDetailSize').find('#unmdtl').val(data.detail_size);
        $('#EditDetailSize').find('#uvaldtl').val(data.val_size);
		$('#EditDetailSize').find("#uselkat").empty().append('<option value="' + data.id + '">' + datsz + '</option>').trigger('change.select2');
		updatedata(data.id_szdtl);
    });
}
function updatedata(id) {
    $("#editdtl").off('click').on("click", function (e) {
        e.preventDefault();
		var formData = new FormData();
        formData.append('eid', id);
        formData.append('size', $('#usize').val());
        formData.append('dsize', $('#unmdtl').val());
        formData.append('vsize', $('#uvaldtl').val());
        formData.append('isize', $('#uselkat').val());
    
        $.ajax({
            url: base_url + 'master-size/update-data',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                swal("Berhasil diupdate", {
                    icon: "success",
                    buttons: false,
                    timer: 1000
                }).then(function() {
                    $('#EditDetailSize').modal('hide');
                    tablesize.ajax.reload();
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
function addsb() {
    $('#TambahTipeItem').on('shown.bs.modal', function () {
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
function deletedtl() {
    $(document).on('click', '#delete-data', function(e) {
        e.preventDefault();
        // Get the data-id of the button clicked
        var id = $(this).data('id');
        var idsz = $(this).data('idsz');

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
                    url: base_url + 'master-size/hapus/' + idsz +'/'+ id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", {
                                icon: "success",
                            }).then(function() {
                                tablesize.ajax.reload();
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
