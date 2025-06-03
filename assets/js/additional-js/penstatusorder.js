var tabstato;
$(document).ready(function () {
    // tablestato()
    approve();
    cancel()
});

function tablestato() {
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-order')) {
            tabstato.destroy();
        }
        
        tabstato = $("#table-order").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            orderCellsTop: true,
			fixedHeader: true,
            "order": [
                [0, 'desc']
            ],
            "ajax": {
                "url": base_url + 'status-order/list',
                "type": "POST",
            },
            "columns": [
                {
                    "data": "id_order",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            if (full.status === "Order Baru") {
                                return `
                                    <ul class="action">
                                        <div class="btn-group">
                                            <button class="btn btn-success" id="data-approve" data-id="${data}"><i class="icon-check"></i></button>
                                            <button class="btn btn-danger" id="data-batal" data-id="${data}"><i class="icon-close"></i></button>
                                        </div>
                                    </ul>
                                `;
                            }else if(full.status === "Batal" || full.status === "Produksi" || full.status === "Selesai" || full.status === "Approve"){
                                return `
                                    <ul class="action">
                                        <div class="btn-group">
                                            <button class="btn btn-success" disabled id="data-approve" data-id="${data}"><i class="icon-check"></i></button>
                                            <button class="btn btn-danger" disabled id="data-batal" data-id="${data}"><i class="icon-close"></i></button>
                                        </div>
                                    </ul>
                                `;
                            }
                        }
                        return data;
                    }
                },
                {
                    "data": "id_order",
                },
                {
                    "data": "tanggal_order",
                    "render": function (data, type, row) {
                        var date = new Date(data);
                        return formatDateForTable(date);
                    }
                },
                {
                    "data": "nama_cst",
                },
                {
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            if (data === "Order Baru") {
                                return `<span class="badge rounded-pill badge-primary tag-pills-sm-mb">${data}</span>`;
                            }else if(data === "Batal"){
                                return `<span class="badge rounded-pill badge-danger tag-pills-sm-mb">${data}</span>`;
                            }else if(data === "Produksi"){
                                return `<span class="badge rounded-pill badge-warning tag-pills-sm-mb">${data}</span`;
                            }else {
                                return `<span class="badge rounded-pill badge-success tag-pills-sm-mb">${data}</span`;
                            }
                        }
                        return data;
                    }
                },             
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
                        tabstato.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
        // $('#table-order tbody').on('click', 'tr', function () {
        //     var row = tabstato.row(this);
            
        //     // Toggle color for expanded row
        //     $(this).toggleClass("selected");
        
        //     if (row.child.isShown()) {
        //         row.child.hide();
        //         $(this).removeClass('selected');
        //     } else {
        //         var rowData = row.data();
        //         $.ajax({
        //             url: base_url + 'status-order/detail',
        //             type: 'POST',
        //             data: {
        //                 ido: rowData.id_order
        //             },
        //             success: function (response) {
        //                 // row.child(`<div>${details}</div>`).show();
        //                 if (typeof response === "string") {
        //                     response = JSON.parse(response);
        //                 }
                        
        //                 var detailTable = `
        //                 <table class="table table-bordered table-sm">
        //                     <thead>
        //                         <tr>
        //                             <th>Katalog</th>
        //                             <th>Detail</th>
        //                             <th>Quantity</th>
        //                         </tr>
        //                     </thead>
        //                     <tbody>
        //                 `;
        
        //                 // Loop through each item in the `data` array to add rows
        //                 response.data.forEach(function(item) {
        //                     detailTable += `
        //                         <tr>
        //                             <td><div class="light-product-box"><img class="img-100" src="${base_url+'assets/lvaimages/katalog/'+item.img_katalog}" alt="katalog"></div></td>
        //                             <td>${item.nama_katalog+' <b>('+item.detail_size+')</b> '}</td>
        //                             <td>${item.qty_order}</td>
        //                         </tr>
        //                     `;
        //                 });
        
        //                 detailTable += `
        //                         </tbody>
        //                     </table>
        //                 `;
        //                 row.child(detailTable).show();
        //             },
        //             error: function () {
        //                 row.child(`<div class="alert alert-danger">Failed to load details.</div>`).show();
        //             }
        //         });
        //     }
        // });        
    });
}
function approve() {
    $(document).on('click', '#data-approve', function () {
        var id = $(this).data('id');

        if (confirm("Are you sure you want to approve this item?")) {
            $.ajax({
                url: base_url + 'StatusOrder/approve',
                type: 'POST',
                data: {
                    id: id
                },
                success: function (response) {
                    alert("Item approved successfully!");
                    $('#table-order').DataTable().ajax.reload();
                },
                error: function () {
                    // Handle error response
                    alert("Failed to approve item. Please try again.");
                }
            });
        }
    });
}
function cancel() {
    $(document).on('click', '#data-batal', function () {
        var id = $(this).data('id');

        if (confirm("Are you sure you want to cancel this item?")) {
            $.ajax({
                url: base_url + 'StatusOrder/cancel',
                type: 'POST',
                data: {
                    id: id
                },
                success: function (response) {
                    alert("Item cancel successfully!");
                    $('#table-order').DataTable().ajax.reload();
                },
                error: function () {
                    // Handle error response
                    alert("Failed to approve item. Please try again.");
                }
            });
        }
    });
}
