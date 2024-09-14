var tableGDLDP;
var tableGDLVA;
$(document).ready(function () {
    if (window.location.href === base_url+'gudang/lva') {
        tablva();
    } else if (window.location.href === base_url+'gudang/ldp') {
        tabldp();
    }
});
function tabldp() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-gudang')) {
            tableGDLDP.destroy();
        }
        
        tableGDLDP = $("#table-gudang").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'Gudang/tablegudangldp',
                "type": "POST",
            },
            "columns": [
                {
                    "data": "kode_material",
                },
                {
                    "data": "nama_material",
                },
                {
                    "data": "stoklva",
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
                        tableGDLDP.ajax.reload(); // Refresh data
                    }
                },
            ]
        });
    });
}
function tablva() {  
    $.getJSON(base_url + 'assets/json/datatable-id.json', function(json) {
        json.processing = '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Sedang memproses...</span></div></div>';
        
        if ($.fn.DataTable.isDataTable('#table-gudang')) {
            tableGDLDP.destroy();
        }
        
        tableGDLDP = $("#table-gudang").DataTable({
            "language": json,
            "processing": true,
            "serverSide": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": base_url + 'Gudang/tablegudanglva',
                "type": "POST",
            },
            "columns": [
                {
                    "data": "kode_material",
                },
                {
                    "data": "nama_material",
                },
                {
                    "data": "stoklva",
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
                        tableGDLDP.ajax.reload(); // Refresh data
                    }
                },
            ]
        });
    });
}