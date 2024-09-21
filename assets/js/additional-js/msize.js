var tableCodm;
$(document).ready(function() {
    addsb();
    dafsb();
    addsizechart();
});
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
function addsizechart() {
    // Event handler for adding a new row
    $('#add-row').on('click', function(e) {
        e.preventDefault(); 
        var newRow = `
            <tr>
                <td>
                    <select class="form-select sizelog" name="sizelog[]" required>
                    </select>
                </td>
                <td class="dszrow">
                    <div class="input-group dlog">
                        <span class="input-group-append ps-1">
                            <a class="btn badge-light-primary remove-row-dsz" href="javascript:void(0)"><i class="fa fa-plus"></i></a>
                        </span>
                        <select class="form-select dszlog" style="width: 54%;" required>
                        </select>
                        <input class="form-control input-air-primary logval"style="width: 18%;" type="text" placeholder="0" required>
                        <span class="input-group-append ps-1">
                            <a class="btn badge-light-primary remove-row-dsz" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                        </span>                
                    </div>
                </td>
                <th scope="row">
                    <ul class="action">
                        <li class="delete">
                            <a href="javascript:void(0)" class="delete-row">
                                <i class="icon-trash"></i>
                            </a>
                        </li>
                        <li class="edit">
                            <a href="javascript:void(0)" class="copy-row">
                                <i class="icon-files"></i>
                            </a>
                        </li>
                    </ul>                                                            
                </th>
            </tr>
        `;

        // Append the new row to the table body
        $('#table-body').append(newRow);

        // Load options for the newly added <select> elements
        optionST($('.satlog:last'));
        optionDSZ($('.dszlog:last'));
    });

    $('#table-body').on('click', '.remove-row-dsz', function (e) {
        e.preventDefault();
        const inputGroups = $(this).closest('.dszrow').find('.input-group');
        
        if (inputGroups.length > 1) {
            $(this).closest('.input-group').remove();
        } else {
            alert('Tidak bisa dihapus!');
        }
    });

    // Event delegation to handle row deletion
    $('#table-body').on('click', '.delete-row', function(e) {
        e.preventDefault();
        $(this).closest('tr').remove(); 
    });

    $('#table-body').on('click', '.copy-row', function(e) {
        e.preventDefault();
    
        let $row = $(this).closest('tr');
        let $newRow = $row.clone();
    
        // Copy values for input and select elements
        $newRow.find('input, select').each(function() {
            const elementType = $(this).prop('nodeName').toLowerCase();
            
            if (elementType === 'input') {
                // Preserve input values
                $(this).val($(this).val());
            }
        });
    
        $('#table-body').append($newRow);
    });
    
    $('#table-body').on('mousedown', '.sizelog', function () {
        optionSZ($(this));
    });
    $('#table-body').on('mousedown', '.dszlog', function () {
        optionDSZ($(this));
    });

    $('#table-body').on('input', 'input[type="text"]', function() {
        let value = $(this).val();
        value = value.replace(',', '.');
        if (!/^[0-9.,]*$/.test(value)) {
            value = value.slice(0, -1);
        }
        $(this).val(value);
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
function optionDSZ(selector) {
    let val = 'DSZ';
    $.ajax({
        url: base_url + 'katalog/dafsb/' + val,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.length > 0) {
                selector.empty();
                $.each(response, function(index, item) {
                    selector.append('<option value="' + item.nama + '">' + item.nama + '</option>');
                });
                selector.select(); // Refresh select2
                selector.prop('required', true);
            }
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
    });
}