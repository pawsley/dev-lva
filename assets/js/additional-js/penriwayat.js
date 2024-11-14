var tabriwayat;
$(document).ready(function () {
    tableriwayat()
});

function tableriwayat() {
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-riwayatp')) {
            tabriwayat.destroy();
        }
        
        tabriwayat = $("#table-riwayatp").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'penjualan/list-riwayat',
                "type": "POST",
            },
            "columns": [
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
                    "data":"grand_total",
                    "render": function (data, type, row) {
                        return formatcurrency.format(data);
                    }
                },
                {
                    "data": "status",
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `<span class="badge rounded-pill badge-success tag-pills-sm-mb">${data}</span>`;
                        }
                        return data;
                    }
                },
                {
                    "data": "id_order",
                    "orderable": false,
                    "render": function (data, type, full, meta) {
                        if (type === "display") {
                            return `
                                    <button class="btn btn-info-gradien dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                    <div class="dropdown-menu">
                                        ${(full.status == "Selesai") ? `
                                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#InfoOrder">Info Order</a>
                                        ` : `
                                        `}
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
                        tabriwayat.ajax.reload(); // Refresh data
                    }
                }
            ]
        });
    });
}