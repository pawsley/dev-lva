let datid = "";
var tableProduksi;
$(document).ready(function () {
    if (window.location.href === base_url+'tagihan/baru') {
        dateform();
        generateid();
        getSelect2();
        // addprod();
    } else if (window.location.href === base_url+'tagihan/list-tagihan') {
        // tabkatalog();
    }
});
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'Tagihan/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const newid = response.newID;

        // Set the value in the input field
        $('#invid').val((newid !== def ? newid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function dateform() {
    $('#dateinv').val(updateDateNow(datid));
    // $('#duedateinv').val(updateDateNow(datid));
}
function getSelect2() {
    $('#selord').select2({
        language: 'id',
        placeholder: 'Pilih Order',
        allowClear: true,
    });
    $('#selprd').select2({
        language: 'id',
        placeholder: 'Pilih Produk',
        allowClear: true,
    });
    $('#selcst').select2({
        language: 'id',
        placeholder: 'Pilih Customer',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'PenKasir/loadcustomer/';
            },
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return { q: params.term };
            },
            processResults: function(data) {
                let groups = {};
                let results = [];

                data.forEach(function(item) {
                    let groupName = item.tipe_cst;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_cst,
                        text: item.nama_cst,
                        wa : item.wa_cst,
                        email : item.email_cst,
                        id_sbc : item.id_sbc,
                        nama_sbc : item.tipe_cst,
                        diskon : item.diskon,
                    });
                });

                Object.keys(groups).forEach(function(groupName) {
                    results.push({
                        text: groupName,
                        children: groups[groupName]
                    });
                });

                return { results: results };
            },
            cache: false,
        },
        templateResult: function (data) {
            if (!data.id) {
                return data.text;
            }
            return getSelect2Data(data);
        }
    });
    $('#selcst').on('select2:select', function(e) {
        var data = e.params.data;
        $('#wa').val(data.wa && data.wa !== '' ? data.wa : " - ");
        $('#email').val(data.email && data.email !== '' ? data.email : " - ");
        $('#tcst').val(data.nama_sbc && data.nama_sbc !== '' ? data.nama_sbc : " - ");
    });   
}
function getSelect2Data(data) {
    var $option = $('<span></span>');
    $option.text(data.text);
    $option.attr('data-wa', data.wa);
    $option.attr('data-email', data.email);
    $option.attr('data-id_sbc', data.id_sbc);
    $option.attr('data-nama_sbc', data.nama_sbc);
    $option.attr('data-diskon', data.diskon);
    return $option;
}