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