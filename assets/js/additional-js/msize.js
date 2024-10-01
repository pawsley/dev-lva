var tablesize;
$(document).ready(function() {
    getselect2();
    rowsize();
    adddata();
    tabsize();
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
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditMasterCustomer" 
                                            data-id="${data}"><i class="icon-pencil"></i></button>
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