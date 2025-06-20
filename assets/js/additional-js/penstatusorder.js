var tabstato;
var tableMat;
$(document).ready(function () {
    tablestato()
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
            language: json,
            processing: true,
            serverSide: false,
            orderCellsTop: true,
            responsive: true,
            autoWidth: false,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pageLength: 10,
            order: [[5, 'desc']], // Default order by tanggal_order (index 5)
            initComplete: function () {
                const api = this.api();
                $('#check-all').on('click', function () {
                    const isChecked = $(this).is(':checked');
                    $('.checkbox-class').prop('checked', isChecked);
                });

                if ($('#table-order thead tr.filter-row').length === 0) {
                    $('#table-order thead').append('<tr class="filter-row"></tr>');
                    $('#table-order thead tr:eq(0) th').each(function () {
                        $('#table-order thead tr.filter-row').append('<th></th>');
                    });
                }

                const filterableColumns = [1, 2, 3, 6, 5];

                filterableColumns.forEach(function (colIdx) {
                    const th = $('#table-order thead tr.filter-row th').eq(colIdx);
                    const select = $('<select><option value="">Semua</option></select>')
                        .appendTo(th.empty()) // Clear the header cell
                        .on('change', function () {
                            const selectedValues = $(this).val();
                            if (selectedValues && selectedValues.length > 0) {
                                const regex = selectedValues.map(val => `^${$.fn.dataTable.util.escapeRegex(val)}$`).join('|');
                                api.column(colIdx)
                                    .search(regex, true, false) // Use regex with OR pattern
                                    .draw();
                            } else {
                                api.column(colIdx).search('', true, false).draw(); // Clear filter
                            }
                        });

                    api.column(colIdx).data().unique().sort().each(function (d) {
                        if (d) {
                            select.append(`<option value="${d}">${d}</option>`);
                        }
                    });

                    // Initialize Select2
                    select.select2({
                        width: '100%',
                        allowClear: true,
                        multiple: true,
                    });
                });
            },
            ajax: {
                url: base_url + 'status-order/list',
                type: "POST",
            },
            columns: [
                {
                    title: "<input type='checkbox' id='check-all'>",
                    orderable: false,
                    data: "id_odtl",
                    render: function (data, type, full) {
                        if (type === "display") {
                            // return `
                            //         <button class="btn btn-info-gradien dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                            //         <div class="dropdown-menu" style="z-index: 9999;">
                            //             <a class="dropdown-item" href="${base_url}StatusOrder/detail/${full.id_order}/${full.id_odtl}">Beli Bahan</a>
                            //             <a class="dropdown-item" href="${base_url}StatusOrder/print/${full.id_order}/${full.id_odtl}">Print</a>
                            //             <a class="dropdown-item" href="#" id="data-approve" data-id="${full.id_odtl}">Approve</a>
                            //             <a class="dropdown-item" href="#" id="data-batal" data-id="${full.id_odtl}">Batal</a>
                            //         </div>
                            //     `;
                            return `
                                    <input type="checkbox" class="checkbox-class" id="checkbox_${data}" value="${data}">
                                `;
                        }
                        return data;
                    }
                },
                {
                    title: "Item",
                    data: "nama_katalog",
                    render: function (data, type, row) {
                        if (type === "display") {
                            return `
                                <div class="product-names">
                                    <div class="light-product-box">
                                        <img class="img-fluid" src="${base_url}assets/lvaimages/katalog/${row.img_katalog}" alt="katalog">
                                    </div>
                                    <div class="row">
                                        <div class="col-12"><strong>${row.id_katalog} | ${data}</strong></div>
                                        <div class="col-12">
                                            <strong>
                                                <span class="badge rounded-pill badge-dark">${row.warna_katalog}</span>
                                                <span class="badge rounded-pill badge-dark">${row.detail_size}</span>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }
                        return data;
                    }
                },
                { title: 'Order Id',data: "id_order" },
                { title: 'Customer', data: "nama_cst" },
                {
                    orderable: false,
                    title: 'Bahan',
                    data: 'bahan',
                    render: function (data, type) {
                        const bahanArray = typeof data === 'string' ? JSON.parse(data) : data;
                        if (!Array.isArray(bahanArray)) return '';

                        if (type !== 'display') return data;

                        let html = '<ul class="list-group">';

                        bahanArray.forEach(item => {
                        html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>${item.kode_material}</strong> - ${item.nama_material}
                                </div>
                                <span class="badge rounded-pill ${item.qty_bahan < 0 ? 'bg-danger' : 'bg-primary'}">
                                ${item.qty_bahan}${item.satuan_material}
                                </span>
                            </li>
                        `;
                        });

                        html += '</ul>';
                        return html;
                    }
                },
                {
                    title: 'Tanggal Order',
                    data: "tanggal_order",
                    render: function (data, type) {
                        if (type === 'display') {
                        let date = new Date(data);
                        return formatDateForTable(date); // show "12 Juni 2025"
                        }
                        return data; // raw "2025-06-12" for filtering/sorting
                    }
                },
                {
                    title: 'Status',
                    data: "status_item",
                    render: function (data, type) {
                        if (type === "display") {
                            let colorClass = 'success';
                            if (data === "Order Baru") colorClass = 'primary';
                            else if (data === "Batal") colorClass = 'danger';
                            else if (data === "Produksi") colorClass = 'warning';
                            return `<span class="badge rounded-pill badge-${colorClass} tag-pills-sm-mb">${data}</span>`;
                        }
                        return data;
                    }
                },
            ],
            dom: "<'row'<'col-sm-6'l><'col-sm-6'f>>" +
                "<'row'<'col-sm-2'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-4'i><'col-sm-8'p>>",
            buttons: [
                {
                    text: '<i class="icofont icofont-refresh"></i>',
                    className: 'custom-refresh-button btn btn-primary',
                    attr: { id: 'refresh-button', title: 'Refresh' },
                    action: function () {
                        tabstato.ajax.reload();
                    }
                },
                {
                    text: '<i class="icon-shopping-cart-full"></i>',
                    className: 'custom-pmb-button btn btn-secondary',
                    attr: { id: 'pmb-button', title: 'Pembelian Bahan' },
                    action: function () {
                        var selectedIds = [];
                        var allGrouped = {};
                        var $checked = $('#table-order .checkbox-class:checked'); // ✅ Only from tabstato

                        if ($checked.length === 0) {
                            alert("Pilih minimal satu item.");
                            return;
                        }

                        $checked.each(function () {
                            var checkboxVal = $(this).val();
                            var $tr = $(this).closest('tr');
                            var dtRow = tabstato.row($tr);

                            // ✅ Ensure the row is valid
                            if (!dtRow || !dtRow.data()) {
                                console.warn("Skipping checkbox with no valid DataTable row:", checkboxVal);
                                return;
                            }

                            selectedIds.push(checkboxVal);

                            var rowData = dtRow.data();
                            var bahanArray = typeof rowData.bahan === 'string'
                                ? JSON.parse(rowData.bahan)
                                : rowData.bahan;

                            if (Array.isArray(bahanArray)) {
                                bahanArray.forEach(item => {
                                    if (parseFloat(item.qty_bahan) < 0) {
                                        const key = `${item.kode_material}_${item.satuan_material}`;
                                        if (!allGrouped[key]) {
                                            allGrouped[key] = {
                                                kode_material: item.kode_material,
                                                nama_material: item.nama_material,
                                                qty_total: 0,
                                                satuan: item.satuan_material
                                            };
                                        }

                                        allGrouped[key].qty_total += Math.abs(parseFloat(item.qty_bahan));
                                    }
                                });
                            }
                        });

                        if (selectedIds.length === 0) {
                            alert("Tidak ada data valid yang dipilih.");
                            return;
                        }

                        window.materialNeedsMap = {};

                        Object.values(allGrouped).forEach(group => {
                            window.materialNeedsMap[group.kode_material] = {
                                material_need: group.qty_total,
                                sat_material: group.satuan
                            };
                        });

                        modalsView('pembelian-bahan', selectedIds);
                    }

                },
                {
                    text: '<i class="icofont icofont-database-add"></i>',
                    className: 'custom-produksi-button btn btn-info-gradien',
                    attr: { id: 'produksi-button', title: 'Tambahkan ke produksi' },
                    action: function () {
                        // var selectedIds = [];
                        // $('.checkbox-class:checked').each(function () {
                        //     selectedIds.push($(this).val());
                        // });

                        // if (selectedIds.length === 0) {
                        //     alert("Please select at least one item to print.");
                        //     return;
                        // }

                        // var url = base_url + 'StatusOrder/printMultiple/' + selectedIds.join(',');
                        // window.open(url, '_blank');
                    }
                }
            ],
        });
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
function modalsView(action = '', selectedIds = []) {
    const $modal = $('#PmbModal');
    const $title = $modal.find('#titleMod');
    const $body = $modal.find('.modal-body');
    const $footer = $modal.find('.modal-footer');

    $body.html('<div class="text-center">Loading...</div>');
    $footer.html('');

    switch (action) {
        case 'pembelian-bahan':
            selectTipe();
            generateid();
            addpmbm();
            tabmat();
            $title.text('Pembelian Bahan');
            $body.html(`
                <form class="row g-3" id="form-pmb" method="post">
                    <!-- Tanggal -->
                    <div class="col-md-4 position-relative"> 
                        <label class="form-label" for="pmbtgl">TANGGAL & WAKTU</label>
                        <input class="form-control digits" id="pmbtgl" name="pmbtgl" type="datetime-local">
                    </div>
                    <!-- INVOICE -->
                    <div class="col-md-4 position-relative"> 
                        <label class="form-label" for="ivpb">NO INVOICE</label>
                        <input class="form-control" id="ivpb" name="ivpb" type="text" placeholder="TERISI OTOMATIS" readonly>
                    </div>
                    <!-- PILIH TIPE PEMBAYARAN -->
                    <div class="col-md-4 position-relative">
                        <label class="form-label" for="seltipe">TIPE PEMBAYARAN</label>
                        <select class="form-select" id="seltipe" name="seltipe" required>
                            <option></option>
                            <option value="tunai">TUNAI</option>
                            <option value="transfer">TRANSFER</option>
                        </select>
                    </div>
                    <!-- PILIH AKUN BANK -->                                    
                    <div class="col-md-12 position-relative d-none" id="bank-account-container">
                        <label class="form-label" for="bank_acc">AKUN BANK LVA</label>
                        <select class="form-select" id="bank_acc" name="bank_acc" required>
                        </select>
                    </div>                                                                        
                    <!-- PILIH SUPPLIER SELECT2 -->
                    <div class="col-md-12 position-relative">
                        <label class="form-label" for="selsupp">SUPPLIER</label>
                        <select class="form-select" id="selsupp" name="selsupp" required>
                        </select>
                    </div>
                    <div class="col-md-12 position-relative">
                        <h6>Informasi detail pembelian material</h6>
                    </div>
                    <div class="col-md-12 position-relative">
                        <div class="table-responsive">
                            <table class="display" id="table-material">
                            <thead>
                                <tr>
                                    <th scope="col" style="min-width: 10px;"><input type="checkbox" id="select-all"></th>
                                    <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">MATERIAL</span></th>
                                    <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">DETAIL</span></th>
                                    <th scope="col" style="min-width: 40px; text-align:center;"><span class="f-light f-w-600">QTY</span></th>
                                    <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">HARGA SATUAN</span></th>
                                    <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">TOTAL</span></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">
                        <h2>Grand Total : </h2><h2 id="tx_gt" name="tx_gt"></h2>
                    </div>                           
                    <!-- Submit Transaksi -->
                    <div class="col-md-12 mt-3">
                        <button type="submit" id="subpmb" class="btn btn-primary">
                            <span id="spinner_subpmb" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                            <span id="tx_subpmb">Submit Transaksi</span>
                        </button>
                    </div>
                </form>
            `);
            break;
        case 'servis':
            $title.text('Servis');
            $body.html(`<p>Form servis untuk ${selectedIds.join(', ')}</p>`);
            break;
        default:
            $title.text('Aksi Tidak Dikenal');
            $body.html('<p>Tidak ada tindakan yang sesuai.</p>');
    }

    // Show modal via JavaScript using Bootstrap 5
$modal.modal('show'); 
}
