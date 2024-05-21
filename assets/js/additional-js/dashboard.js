var tableAP;
var tableLB;
var tableSP;
var tableDK;
var tableCT;
var tableKY;
var tableCB;
var formatcur = new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0
});
var formatdec = new Intl.NumberFormat('id-ID', {
    style: 'decimal',
    minimumFractionDigits: 0
});
$(document).ready(function () {
    // card();
    // cardgd();
    // allcount(formatcur);
    // topsales();
    // detaillaba();
    // detailasset();
    // detailsales();
    // detaildiskon();
    // // detailcust();
    // detailcb();
    // detailkar();
});

function card() {
    $('.cardlaba').click(function(event) {
        event.preventDefault();
        $('#spinner').removeClass('d-none');
        $('#laba').addClass('d-none');
        countlaba(formatcur);
    });
    $('.cap').click(function(event) {
        event.preventDefault();
        $('#spintp').removeClass('d-none');
        $('#cardtp').addClass('d-none');
        countassetp(formatcur);
    });
    $('.cdp').click(function(event) {
        event.preventDefault();
        $('#spindp').removeClass('d-none');
        $('#carddp').addClass('d-none');
        countdis(formatcur);
    });
    $('.cp').click(function(event) {
        event.preventDefault();
        $('#spinp').removeClass('d-none');
        $('#cardp').addClass('d-none');
        countpen(formatcur);
    });
    $('.ctc').click(function(event) {
        event.preventDefault();
        $('#spintc').removeClass('d-none');
        $('#cardtc').addClass('d-none');
        countct(formatcur);
    });
    $('.ctu').click(function(event) {
        event.preventDefault();
        $('#spintu').removeClass('d-none');
        $('#counttu').addClass('d-none');
        countus(formatcur);
    });
    $('.cts').click(function(event) {
        event.preventDefault();
        $('#spints').removeClass('d-none');
        $('#countts').addClass('d-none');
        countos(formatcur);
    });
    $('.cardLink').click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('#spinst-' + id).removeClass('d-none');
        $('#counst-' + id).addClass('d-none');
        countStockByStore(id);
    });
    $('.cardhpp').click(function(event) {
        event.preventDefault();
        var id = $(this).data('id');
        $('#spinhpp-' + id).removeClass('d-none');
        $('#counthpp-' + id).addClass('d-none');
        countbystore(id, formatcur);
    });
}
function allcount(formatcur) {
    $('#spinner').removeClass('d-none');
    $('#spintp').removeClass('d-none');
    $('#spinp').removeClass('d-none');
    $('#spindp').removeClass('d-none');
    $('#spintc').removeClass('d-none');
    $('#spinpk').removeClass('d-none');
    $('#spintpp').removeClass('d-none');
    $('#spinnpmg').removeClass('d-none');
    $('#spintu').removeClass('d-none');
    $('#spints').removeClass('d-none');
    $('.spinst').removeClass('d-none');
    getCountStock(formatcur);
    countlaba(formatcur);
    countassetp(formatcur);
    countpen(formatcur);
    countdis(formatcur);
    countct(formatcur);
    countus(formatcur);
    countos(formatcur);
    getCountPM();
    getCountPK();
    getCountTotal();
}
function countlaba(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/labakotor/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#laba').removeClass('d-none');
            $.each(data, function(index, item) {
                var formattedValue = formatcur.format(item.laba_kotor);
                $('#laba').text(formattedValue);
                $('.cardlaba').attr('data-total_laba', formattedValue);
                return false;
            });
            $('#spinner').addClass('d-none');
        }
    });
}
function countassetp(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tproduk/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#cardtp').removeClass('d-none');
            $.each(data, function(index, item) {
                $('#cardtp').text(formatcur.format(item.total_hpp));
                $('.cap').attr('data-total_asset', formatcur.format(item.total_hpp));
                return false;
            });
            $('#spintp').addClass('d-none');
        }
    });
}
function countpen(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tpenjualan/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#cardp').removeClass('d-none');
            $.each(data, function(index, item) {
                var sales = formatcur.format(item.total_penjualan)
                $('#cardp').text(sales);
                $('.cp').attr('data-total_sales', sales);
                return false;
            });
            $('#spinp').addClass('d-none');
        }
    });
}
function countdis(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tdiskon/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#carddp').removeClass('d-none');
            $.each(data, function(index, item) {
                var diskon = formatcur.format(item.total_diskon)
                $('#carddp').text(diskon);
                $('.cdp').attr('data-diskon_sales', diskon);
                return false;
            });
            $('#spindp').addClass('d-none');
        }
    });
}
function countct(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tcb/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#cardtc').removeClass('d-none');
            $.each(data, function(index, item) {
                var tcba = formatcur.format(item.total_cashback);
                $('#cardtc').text(tcba);
                $('.ctc').attr('data-total_cba', tcba);
                return false;
            });
            $('#spintc').addClass('d-none');
        }
    });
}
function countus(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tuser/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#counttu').removeClass('d-none');
            $.each(data, function(index, item) {
                var usr = formatcur.format(item.total_user).replace(/\D/g, '');
                $('#counttu').text(usr);
                $('.ctu').attr('data-total_usr', usr);
                return false;
            });
            $('#spintu').addClass('d-none');
        }
    });
}
function countos(formatcur) {
    $.ajax({
        url: base_url + 'Welcome/tsupp/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#countts').removeClass('d-none');
            $.each(data, function(index, item) {
                var supp = formatcur.format(item.total_supplier).replace(/\D/g, '');
                $('#countts').text(supp);
                $('.cts').attr('data-total_supp', supp);
                return false;
            });
            $('#spints').addClass('d-none');
        }
    });
}
function topsales() {
    $.ajax({
        url: base_url + 'Welcome/topsales/',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var topSalesTableBody = $('#topSalesTableBody');
            topSalesTableBody.empty(); // Clear previous entries
            var counter = 1; // Initialize counter
            $.each(data, function(index, item) {
                var row = $('<tr>');
                var buttonClass = 'btn btn-primary'; // Default button class
                if (counter === 2) {
                    buttonClass = 'btn btn-secondary';
                } else if (counter === 3) {
                    buttonClass = 'btn btn-success';
                } else if (counter > 3) {
                    buttonClass = 'btn btn-secondary disabled';
                }
                row.append($('<td>').html('<span class="' + buttonClass + '">' + counter + '</span>'));
                row.append($('<td>').html('<a class="f-w-500" href="#" data-bs-toggle="modal" data-bs-target="#DetailKasir" data-id_ksr="'+item.id_ksr+'" data-total_ksr="'+item.total_jual+'">' + item.nama_ksr + '</a><br><span class="f-light">' + formatcur.format(item.total_jual) + '</span>'));
                topSalesTableBody.append(row);
                counter++;
            });
        }
    });
}
function cardgd() {
    $('#cardpmg').click(function(event) {
        event.preventDefault();
        $('#spinnpmg').removeClass('d-none');
        $('#pm').addClass('d-none');
        getCountPM();
    });
    $('#cardpk').click(function(event) {
        event.preventDefault();
        $('#spinpk').removeClass('d-none');
        $('#pk').addClass('d-none');
        getCountPK();
    });
    $('#cardtpp').click(function(event) {
        event.preventDefault();
        $('#spintpp').removeClass('d-none');
        $('#tp').addClass('d-none');
        getCountTotal();
    });
}
function getCountPM() {
    $.ajax({
        url: base_url+'StockOpname/countpm/', 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#pm').removeClass('d-none');
            $('#pm').text(response);
            $('#spinnpmg').addClass('d-none');
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
            $('#spinnpmg').addClass('d-none');
        }
    });
}
function getCountPK() {
    $.ajax({
        url: base_url+'StockOpname/countpk/', 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#pk').removeClass('d-none');
            $('#pk').text(response);
            $('#spinpk').addClass('d-none');
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
            $('#spinpk').addClass('d-none');
        }
    });
}
function getCountTotal() {
    $.ajax({
        url: base_url+'StockOpname/counttotal/', 
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $('#tp').removeClass('d-none');
            $('#tp').text(response);
            $('#spintpp').addClass('d-none');
        },
        error: function(xhr, status, error) {
            console.error(xhr, status, error);
            $('#spintpp').addClass('d-none');
        }
    });
}
function countStockByStore(id){
    $.ajax({
        url: base_url + 'barang-keluar/stock/'+id,
        type: 'GET',
        dataType: 'json',
        data: { id: id },
        success: function(data) {
            var matched = false;
            $('#counst-' + id).removeClass('d-none');
            $.each(data, function(index, item) {
                if (item.id_toko === id) {
                    var formattedNumber = formatcur.format(item.brg_rdy).replace(/\D/g, '');
                    $('#counst-' + id).text(formattedNumber);
                    matched = true;
                    return false;
                }
            });
            if (!matched) {
                $('#counst-' + id).text('0');
            }
            $('#spinst-' + id).addClass('d-none');
        }
    });
}
function countbystore(id, formatcur){
    $.ajax({
        url: base_url + 'produk-list/asset-store/'+id,
        type: 'GET',
        dataType: 'json',
        data: { id: id },
        success: function(data) {
            var matched = false;
            $('#counthpp-' + id).removeClass('d-none');
            $.each(data, function(index, item) {
                if (item.id_toko === id) {
                    $('#counthpp-' + id).text('Rp '+item.total_asset);
                    matched = true;
                    return false;
                }
            });
            if (!matched) {
                $('#counthpp-' + id).text('0');
            }
            $('#spinhpp-' + id).addClass('d-none');
        }
    });
}
function getCountStock(formatcur) {
    $('h5#id_toko').each(function() {
        var id = $(this).data('id');
        var count = $(this).closest('.card').find('.counst');
        var spinner = $(this).closest('.card').find('.spinst');

        $.ajax({
            url: base_url + 'barang-keluar/stock/'+id,
            type: 'GET',
            dataType: 'json',
            data: { id: id },
            success: function(data) {
                var matched = false;
                count.removeClass('d-none');
                $.each(data, function(index, item) {
                    if (item.id_toko === id) {
                        var formattedNumber = formatcur.format(item.brg_rdy).replace(/\D/g, '');
                        count.text(formattedNumber);
                        matched = true;
                        return false;
                    }
                });
                if (!matched) {
                    count.text('0');
                }
                spinner.addClass('d-none');
            }
        });
    });
}
function tablelaba() {
    if ($.fn.DataTable.isDataTable('#table-laba')) {
        tableLB.destroy();
    }
    tableLB = $("#table-laba").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-laba',
            "type": "POST"
        },
        "columns": [
            { "data": "kode_penjualan" },
            { "data": "sn_brg" },
            { "data": "nama_brg" },   
            { 
                "data": "harga_jual",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { 
                "data": "nilai",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { 
                "data": "bayar",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },   
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableLB.ajax.reload();
                }
            },
        ]
            
    });
    return tableLB;
}
function tableasset() {
    if ($.fn.DataTable.isDataTable('#table-asset')) {
        tableAP.destroy();
    }
    tableAP = $("#table-asset").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-asset',
            "type": "POST"
        },
        "columns": [
            { "data": "sn_brg" },
            { "data": "nama_brg" },   
            { 
                "data": "hrg_hpp",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { "data": "nama_toko" },   
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableAP.ajax.reload();
                }
            },
        ]
            
    });
    return tableAP;
}
function tablesales() {
    if ($.fn.DataTable.isDataTable('#table-sales')) {
        tableSP.destroy();
    }
    tableSP = $("#table-sales").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-sales',
            "type": "POST"
        },
        "columns": [
            { "data": "kode_penjualan" },
            { "data": "sn_brg" },
            { "data": "nama_brg" },   
            { 
                "data": "harga_jual",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { "data": "nama_toko" },   
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableSP.ajax.reload();
                }
            },
        ]
            
    });
    return tableSP;
}
function tablediskon() {
    if ($.fn.DataTable.isDataTable('#table-diskon')) {
        tableDK.destroy();
    }
    tableDK = $("#table-diskon").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-diskon',
            "type": "POST"
        },
        "columns": [
            { "data": "id_toko" },
            { "data": "nama_toko" },
            { 
                "data": "total_diskon",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableDK.ajax.reload();
                }
            },
        ]
            
    });
    return tableDK;
}
function tablecb() {
    if ($.fn.DataTable.isDataTable('#table-cb')) {
        tableCB.destroy();
    }
    tableCB = $("#table-cb").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-cb',
            "type": "POST"
        },
        "columns": [
            { "data": "sn_brg" },
            { "data": "nama_brg" },
            { 
                "data": "cb",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { "data": "nama_supplier" },
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableCB.ajax.reload();
                }
            },
        ]
            
    });
    return tableCB;
}
function tablecust() {
    if ($.fn.DataTable.isDataTable('#table-cust')) {
        tableCT.destroy();
    }
    tableCT = $("#table-cust").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'detail-customer',
            "type": "POST"
        },
        "columns": [
            { "data": "id_plg" },
            { "data": "nama_plg" },
            { "data": "no_ponsel" },
            { "data": "email" },
            { "data": "alamat" },
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-6'B>>" +
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
                    tableCT.ajax.reload();
                }
            },
        ]
            
    });
    return tableCT;
}
function tabledts(ids) {
    if ($.fn.DataTable.isDataTable('#table-dt')) {
        tableDRS.destroy();
    }
    tableDRS = $("#table-dt").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [
            [0, 'desc'] 
        ],
        "ajax": {
            "url": base_url + 'riwayat-penjualan/laporan-detail-penjualan/'+ids,
            "type": "POST"
        },
        "columns": [
            { "data": "kode_penjualan" },
            { "data": "sn_brg" },   
            { "data": "nama_brg" },   
            { 
                "data": "harga_jual",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { 
                "data": "diskon",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
            { 
                "data": "harga_ril",
                "render": function (data, type, row) {
                    return formatcur.format(data);
                }
            },
        ],
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12 col-md-4'B>>" +
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
                    tableRS.ajax.reload();
                }
            },
            {
                extend: 'excelHtml5', // Specify the Excel button
                text: 'Export', // Text for the button
                className: 'btn btn-success', // Add a class for styling
                title: 'Detail Penjualan',
                exportOptions: {
                    columns: ':visible:not(:last-child):not(:nth-last-child(1))'
                }
            }
        ]
            
    });
    return tableDRS;
}
function detaillaba() {
    $('#DetailLaba').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_laba');
        $("#tlk").text(total);
        tablelaba();
    });
}
function detailasset() {
    $('#DetailAssetProduk').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_asset');
        $("#tap").text(total);
        tableasset();
    });
}
function detailsales() {
    $('#DetailSales').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_sales');
        $("#tp").text(total);
        tablesales();
    });
}
function detaildiskon() {
    $('#DetailDiskon').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('diskon_sales');
        $("#td").text(total);
        tablediskon();
    });
}
function detailcb() {
    $('#DetailCashback').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_cba');
        $("#tca").text(total);
        tablecb();
    });
}
function detailcust() {
    $('#DetailCust').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_cust');
        $("#tk").text(total);
        tablecust();
    });
}
function detailksr(){
    $('#DetailKasir').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var ids = button.data('id_ksr');
        var tt = button.data('total_ksr');
        $("#ttdh").text(formatcur.format(tt));
        $("#saldh").text(ids+' | '+sl);
        tabledts(ids);
    });
}
function detailkar() {
    $('#DetailUser').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var total = button.data('total_cust');
        $("#tk").text(total);
        tablekar();
    });
}
function tablekar() {
    if ($.fn.DataTable.isDataTable('#table-kar')) {
        tableKY.destroy();
    }
    tableKY = $("#table-kar").DataTable({
        "processing": true,
        "language": {
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
        },
        "serverSide": true,
        "order": [],
        "ajax": {
            "url": base_url + 'Welcome/detailkar',
            "type": "POST"
        },
        "columns": [
            { "data": "id_admin" },
            { "data": "nama_admin" },
            // { "data": "email_admin" },
            {
                "data": "id_toko",
                "render": function (data, type, row, meta) {
                    return '<select class="select2" id="cab" value="'+row.id_toko+'" data-id_toko="'+row.id_toko+'" data-id_admin="' + row.id_admin + '" data-current-value="' + data + '" data-cab="' + row.id_toko + '"></select>';
                },
            },                     
        ],
        "drawCallback": function(settings) {
            $('.select2').each(function() {
                var $select = $(this);
                var currentValue = $select.data('current-value');
                var value = $select.data('id_toko');
                var id_admin = $select.data('id_admin');
        
                $select.select2({
                    language: 'id',
                    ajax: {
                        url: base_url + 'BarangTerima/loadstore',
                        type: 'GET',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id_toko,
                                        text: item.id_toko
                                    };
                                })
                            };
                        },
                        cache: true
                    }
                });
                if (currentValue) {
                    $select.append('<option value="' + value + '" selected>' + currentValue + '</option>').trigger('change');
                }

                $select.on('change', function() {
                    var newValue = $(this).val();
                    var toko = $(this).find('option:selected').text();
                    var id_admin = $select.data('id_admin');
                    console.log(id_admin);
                    
                    $.ajax({
                        url: 'Welcome/updatekar',
                        method: 'POST',
                        data: {
                            ids: id_admin, // Array of IDs
                            cab: newValue // Value of cab
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                swal("Berhasil dipindah "+toko, {
                                    icon: "success",
                                }).then((value) => {
                                    reload();
                                });
                            } else {
                                swal("Gagal pindah barang", {
                                    icon: "error",
                                });
                            }
                        },
                    });
                });
            });
        },
        "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                "<'col-sm-12 col-md-2'B>" +
               "<'row'<'col-sm-12'tr>>" +
               "<'row'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-6'p>>",
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
                        tableKY.ajax.reload();
                    }
                },
            ]
    });
    return tableKY;
}
function reload() {
    var bkReloaded = tablekar();
    if (bkReloaded) {
        bkReloaded.clear().draw();
        bkReloaded.ajax.reload();
    }
}