var tsupp;
$(document).ready(function () {
    reload();
    getid();
    getbank();
    deletedata();
});

function reload() {
    if ($.fn.DataTable.isDataTable('#table-supplier')) {
      tsupp.destroy();
    }
    tsupp = $("#table-supplier").DataTable({
        "processing": true,
        "language": { 
            "processing": '<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div></div>',
            // "url": '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json',            
        },
        "serverSide": true,
        "order": [
          [0, 'asc']
        ],
        "ajax": {
            "url": base_url+'master-supplier/jsonsup',
            "type": "POST"
        },
        "columns": [
            { "data": "id_supplier"},
            { "data": "nama_supplier"},
            { "data": "pic"},
            { "data": "kontak"},
            { "data": "provinsi" },
            { "data": "kabupaten" },
            { "data": "kecamatan" },
            { "data": "alamat" },
            {
              "data": "status",
              "render": function (data, type, full, meta) {
                  // You can customize the rendering here
                  if (type === "display") {
                      if (data === "1") {
                          return `<span class="badge rounded-pill badge-success">Aktif</span>`;
                        } else {
                          return `<span class="badge rounded-pill badge-secondary">Non Aktif</span>`;
                      }
                      return data; // return the original value for other cases
                  }
                  return data;
              }
            },
            { 
              "data": "id_supplier",
              "orderable": false, // Disable sorting for this column
              "render": function(data, type, full, meta) {
                if (type === "display") {
                  if (data) {
                    return `
                      <ul class="action">
                        <li class="edit">
                          <button class="btn" id="edit-btn" type="button" data-id="${data}" data-bs-toggle="modal" data-bs-target="#EditMasterSupplierModal"><i class="icon-pencil"></i></button>
                        </li>
                        <li class="delete">
                          <button class="btn" id="delete-btn" type="button" data-id="${data}"><i class="icon-trash"></i></button>
                        </li>
                      </ul>
                    `;
                  }
                }
                return data;
              }
            }
          ],                        
    });    
}
function getbank() {
    $('#bank_acc').select2({
        language: 'id',
        ajax: {
            url: base_url + 'MasterBank/bank_json',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.code + ' | ' + item.name,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}
function getselect(){
    $('#ebank_acc').select2({
        dropdownParent: $("#EditMasterSupplierModal"),
        language: 'id',
        ajax: {
            url: base_url + 'MasterBank/bank_json',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // Add the search term to your AJAX request
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.code + ' | ' + item.name,
                        };
                    }),
                };
            },
            cache: false,
        },
    });
}
function getid(){
  $('#EditMasterSupplierModal').on('show.bs.modal', function (e) {
        getselect();    
        $('#estatus').select2({
            dropdownParent: $("#EditMasterSupplierModal"),
            language: 'id',
        });  
        var button = $(e.relatedTarget);
        var id_sup = button.data('id');
        
        $.ajax({
            url: base_url + "master-supplier/edit/"+id_sup,
            dataType: "json",
            success: function(data) {
                $.each(data.get_id, function(index, item) {
                    $("#eid").val(item.id_supplier);
                    $("#enama").val(item.nama_supplier);
                    $("#epic").val(item.pic);
                    $("#ekontak").val(item.kontak);
                    $("#eprov").val(item.provinsi);
                    $("#ekot").val(item.kabupaten);
                    $("#ekec").val(item.kecamatan);
                    $("#ealamat").val(item.alamat);
                    $("#ebank_acc").empty().append('<option value="' + item.bank_acc + '">' + item.bank_acc + '</option>').trigger('change.select2');
                    $("#enorek").val(item.norek);
                    $("#estatus").val(item.status).trigger('change');
                });
            }
        });
        updatedata();
  });
}
function updatedata(){
  $("#update").on("click", function (){
      var id = $("#eid").val();
      var nama = $("#enama").val();
      var pic = $("#epic").val();
      var kontak = $("#ekontak").val();
      var prov = $("#eprov").val();
      var kota = $("#ekot").val();
      var kec = $("#ekec").val();
      var alamat = $("#ealamat").val();
      var bank_acc = $("#ebank_acc").val();
      var norek = $("#enorek").val();
      var status = $("#estatus").val();
      if (!nama || !prov || !kota || !kec || !pic || !alamat || !kontak) {
          swal("Error", "Lengkapi form yang kosong", "error");
          return;
      }
      $.ajax({
          type: "POST",
          url: "master-supplier/update-data",
          data: {
              eid: id,
              epic: pic,
              ekontak: kontak,
              enama: nama,
              eprov: prov,
              ekot: kota,
              ekec: kec,
              ealamat: alamat,
              ebank_acc: bank_acc,
              enorek: norek,
              estatus: status,
          },
          dataType: "json", 
          success: function (response) {
              if (response.status === 'success') {
                  swal("Data berhasil diupdate", {
                      icon: "success",
                  }).then((value) => {
                      reload();
                  });
              } else {
                  swal("Gagal update data", {
                      icon: "error",
                  });
              }
          },
          error: function (error) {
              swal("Gagal", {
                  icon: "error",
              });
          }
      });
  });
}
function deletedata() {
  $('#table-supplier').on('click', '#delete-btn', function (e) {
      e.preventDefault();
      var id = $(this).data('id');
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
      }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  type: 'POST',
                  url: base_url + 'master-supplier/hapus/' + id,
                  dataType: 'json',
                  success: function (response) {
                      if (response.success) {
                          swal('Deleted!', response.message, 'success');
                          reload();
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