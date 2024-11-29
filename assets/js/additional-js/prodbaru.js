let datid = "";
$(document).ready(function () {
    $('#dateprod').val(updateDateNow(datid));
    $('#duedateprod').val(updateDateFinish(14));
    generateid();
    getSelect2();
});
async function generateid() {
    try {
        const response = await $.ajax({
            url: base_url + 'ProdOrder/generateid',
            type: 'GET',
            dataType: 'json'
        });

        const def = response.defID;
        const newid = response.newID;

        // Set the value in the input field
        $('#prdid').val((newid !== def ? newid : def));

    } catch (error) {
        console.error('Error fetching ID data:', error);
    }
}
function getSelect2() {
    $('#selord').select2({
        language: 'id',
        placeholder: 'Order ID',
        allowClear: true,
        ajax: {
            url: function() {
                return base_url + 'produksi/get-data/';
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
                    let groupName = item.nama_cst;
                    if (!groups[groupName]) {
                        groups[groupName] = [];
                    }
                    groups[groupName].push({
                        id: item.id_order,
                        text: item.id_order
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
    }).on('change', function() {
        let selectedValue = $(this).val();
        $.ajax({
            type: 'POST',
            url: base_url + 'produksi/get-data/',
            data: { ido : selectedValue },
            dataType: 'json',
            success: function(response) {
                $('#list-prodbaru').empty();
                response.forEach(function(daf) {
                    $('#info-stat').text(daf.status).removeClass('btn-light').addClass('btn-success')
                    $('#cst').val(daf.nama_cst)
                    $('#wa').val(daf.wa_cst)
                    $('#email').val(daf.email_cst)
                    $('#tcst').val(daf.tipe_cst)
                    if (daf.list_data_po.length > 0) {
                        daf.list_data_po.forEach(function(list) {
                            let materials = "No Material"; // Default value if no materials are found
                            if (list.list_material && list.list_material.length > 0) {
                                // Concatenate all nama_material into a single string
                                materials = list.list_material.map(material => 
                                    `${material.nama_material} | ${material.qty_material} ${material.sat_material}`
                                ).join("<br>");
                            }
                            $('#list-prodbaru').append(`
                                <tr id="idkatdl" data-idkdl="${list.id_katalog_dtl}">
                                    <td><div class="light-product-box"><img class="img-50" src="${base_url+'assets/lvaimages/katalog/'+list.img_katalog}" alt="katalog"></div></td>
                                    <td>${list.id_katalog+' | '+list.nama_katalog}</td>
                                    <td>${list.detail_size}</td>
                                    <td>${materials}</td>
                                    <td>${list.qty_order}</td>
                                </tr>
                            `);                            
                        });
                    }
                });
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    });
}