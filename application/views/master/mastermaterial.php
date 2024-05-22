<div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Data Master Material</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Data Master</li>
                      <li class="breadcrumb-item active"> Master Material</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <!-- Form Material -->
              <div class="row">
                  <!-- Form MATERIAL -->
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Formulir Input Material</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3">
                                  <!-- ID Material -->
                                  <div class="col-2 position-relative"> 
                                      <label class="form-label" for="idMaterial">ID MATERIAL</label>
                                      <input class="form-control" id="idMaterial" type="text" placeholder="ID Otomatis" aria-label="idMaterial" readonly>
                                  </div>
                                  <!-- Nama Material -->
                                  <div class="col-7 position-relative">
                                      <label class="form-label" for="NamaMaterial">NAMA MATERIAL</label>
                                      <input class="form-control" id="NamaMaterial" type="text" placeholder="Silahkan Masukkan Nama Material" required>
                                  </div>
                                  <!-- Invoice Nomor -->
                                  <div class="col-3 position-relative">
                                      <label class="form-label" for="FakturMaterial">NO.FAKTUR</label>
                                      <input class="form-control" id="FakturMaterial" type="text" placeholder="Input No. Faktur/Invoice" required>
                                  </div>
                                  <!-- Kategori Material -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="KategoriMaterial">KATEGORI</label>
                                    <select class="form-select" id="KategoriMaterial" required="">
                                        <option selected="" disabled="" value="">Pilih Kategori Material</option>
                                        <option>Jenis 1</option>
                                        <option>Jenis 2</option>
                                    </select>
                                  </div>
                                  <!-- Button Tambah -->
                                  <div class="col-2 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                                      <div class="text-center">
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                                      </div>
                                  </div>
                                  <!-- Brand Product -->
                                  <div class="col-4 position-relative"> 
                                      <label class="form-label" for="MerekMatrial">MEREK MATERIAL</label>
                                      <select class="form-select" id="MerekMatrial" required="">
                                          <option selected="" disabled="" value="">Pilih Merek</option>
                                          <option>Merek 1</option>
                                          <option>Merek 2</option>
                                      </select>
                                  </div>
                                  <!-- Button Tambah -->
                                  <div class="col-2 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                                      <div class="text-center">
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                                      </div>
                                  </div>
                                  <!-- Variant Warna -->
                                  <div class="col-4 position-relative"> 
                                      <label class="form-label" for="VarianWarnaMaterial">WARNA MATERIAL</label>
                                      <select class="form-select" id="VarianWarnaMaterial" required="">
                                          <option selected="" disabled="" value="">Pilih Variant Warna</option>
                                          <option>Merah</option>
                                          <option>Biru</option>
                                      </select>
                                  </div>
                                  <!-- Button Tambah -->
                                  <div class="col-2 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                                      <div class="text-center">
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                                      </div>
                                  </div>
                                  <!-- Satuan MAterial -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="SatuanMaterial">SATUAN MATERIAL</label>
                                    <select class="form-select" id="SatuanMaterial" required="">
                                      <option selected="" disabled="" value="">Pilih Satuan Material</option>
                                      <option>Meter</option>
                                      <option>Pcs</option>
                                    </select>
                                  </div>
                                  <!-- Button Tambah -->
                                  <div class="col-2 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                                      <div class="text-center">
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                                      </div>
                                  </div>
                                    <!-- Jumlah Stock -->
                                    <div class="col-2 position-relative"> 
                                      <label class="form-label" for="QtyMaterialStock">JUMLAH STOCK</label>
                                      <input class="form-control" id="QtyMaterialStock" type="text" placeholder="Input Total Stock" aria-label="QtyProdukStock">
                                  </div>
                                  <!-- Satuan Stock -->
                                  <div class="col-2 position-relative"> 
                                      <label class="form-label" for="SatuanMaterialStock">SATUAN STOCK</label>
                                      <select class="form-select" id="SatuanMaterialStock" required="">
                                          <option selected="" disabled="" value="">Pilih Satuan Material</option>
                                          <option>/ PCS</option>
                                          <option>/ Meter</option>
                                          <option>/ Centimeter</option>
                                      </select>
                                  </div>
                                  <!-- Button Tambah -->
                                  <div class="col-2 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                                      <div class="text-center">
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                                      </div>
                                  </div>
                                  <!-- Harga Pokok Matrial -->
                                  <div class="col-md-3 position-relative">
                                      <label class="form-label" for="HargaPokokMaterial">COGS MATERIAL</label>
                                      <div class="input-group has-validation">
                                          <span class="input-group-text">Rp</span>
                                          <input class="form-control" id="HargaPokokMaterial" type="text" onkeyup="formatRupiah1(this)" required="">
                                      </div>
                                  </div>
                                  <!-- Harga Total Stock -->
                                  <div class="col-md-3 position-relative">
                                      <label class="form-label" for="TotalHargaPokokMaterial">GRAND TOTAL</label>
                                      <div class="input-group">
                                          <span class="input-group-text">Rp</span>
                                          <input class="form-control" id="TotalHargaPokokMaterial" type="text" onkeyup="formatRupiah(this)" readonly required="">
                                      </div>
                                  </div>
                                  <!-- Catatan Material -->
                                  <div class="col-12 position-relative">
                                    <label class="form-label" for="CatatanMaterial">LEAD NOTE</label>
                                    <textarea class="form-control input-air-primary" id="exampleFormControlTextarea19" rows="3"></textarea>
                                  </div>
                                  <!-- Upload Gambar -->
                                  <div class="col-12 position-relative"> 
                                    <label class="form-label" for="formFile">UPLOAD GAMBAR</label>
                                    <input class="form-control" id="formFile" type="file" accept=".png, .jpg, .jpeg" required>
                                  </div>
                                  <!-- Submit Barang -->
                                  <div class="col-12">
                                      <button class="btn btn-primary" type="submit">INPUT BAHAN</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Material -->
              <!-- Data Listing Material -->
              <div class="row">
                <div class="col-12">
                    <div class="card height-equal">
                      <div class="card-header">
                        <h4>List Data Material</h4>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="display" id="export-button">
                            <thead>
                              <tr>
                                <th><span class="f-light f-w-600">IMG</span></th>
                                <th style="min-width: 100px;"><span class="f-light f-w-600">ID MATERIAL</span></th>
                                <th style="min-width: 150px;"><span class="f-light f-w-600">NAMA MATERIAL</span></th>
                                <th style="min-width: 100px;"><span class="f-light f-w-600">KATEGORI</span></th>
                                <th style="min-width: 100px;"><span class="f-light f-w-600">MEREK</span></th>
                                <th style="min-width: 120px;"><span class="f-light f-w-600">WARNA</span></th>
                                <th><span class="f-light f-w-600">STOCK</span></th>
                                <th><span class="f-light f-w-600">SATUAN</span></th>
                                <th style="min-width: 100px;"><span class="f-light f-w-600">NOMINAL</span></th>
                                <th style="min-width: 150px;"><span class="f-light f-w-600">CATATAN</span></th>
                                <th><span class="f-light f-w-600"></span></th>
                              </tr>
                            </thead>
                            <tbody>
                            <!-- Data 1 -->
                            <tr class="odd" role="row">
                                <td><img class="img-fluid table-avtar" src="<?=base_url()?>assets/images/img-bahan/benang-astra.jpeg" alt=""></td>
                                <td>
                                  <p class="f-light">ELVB-0001</p>
                                </td>
                                <td>
                                  <p class="f-light">Benang Astra</p>
                                </td>
                                <td>
                                  <p class="f-light">Benang Jahit</p>
                                </td>
                                <td>
                                  <p class="f-light">Astra</p>
                                </td>
                                <td>
                                  <p class="f-light">Ungu Maroon</p>
                                </td>
                                <td>
                                  <p class="f-light">1.500</p>
                                </td>
                                <td>
                                  <p class="f-light">Pcs</p>
                                </td>
                                <td>
                                  <p class="f-light f-w-600 text-success">Rp7.650.000</p>
                                </td>
                                <td>
                                  <p class="f-light">Belum ada catatan</p>
                                </td>
                                <td> 
                                    <ul class="action">
                                      <li class="info">
                                          <a data-bs-toggle="modal" data-bs-target="#DetailMaterial">
                                            <i class="icon-file"></i>
                                          </a>
                                      </li>
                                      <li class="delete">
                                          <a data-bs-toggle="modal" data-bs-target="#">
                                              <i class="icon-trash"></i>
                                          </a>
                                      </li>
                                    </ul>
                                </td>
                            </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
            <!-- End Listing Supplier -->
            <!-- Modal Tambah Sub Kategori Baru -->
            <div class="modal fade" id="TambahSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="SubKategoriItem" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <div class="modal-header mb-4">
                                <h3>Tambah Sub Kategori</h3>
                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="row g-3">
                            <!-- Nama Supplier -->
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="SubKategoriItem">Sub Kategori</label>
                                <input class="form-control" id="SubKategoriItem" type="text" placeholder="Masukkan Item Baru">
                            </div>
                            <!-- Button Simpan -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Tambah Baru</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal Daftar Kategori -->
            <div class="modal fade" id="DaftarSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="#DaftarSubKategoriItem" aria-hidden="true">
              <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                  <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="category-pill-modalLabel">Daftar Kategori</h1>
                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body custom-input">
                      <form>
                      <div class="row g-3">
                          <!-- Kategori 1 -->
                          <div class="col-9">
                          <input class="form-control" id="merek" name="merek" type="text" placeholder="Merek">
                          </div>
                          <!-- Hapus -->
                          <div class="col-3">
                          <div class="btn-group">
                              <button class="btn btn-danger add_merk" type="button" id="add_merk"><i class="fa fa-trash"></i></button>
                          </div>
                          </div>
                          <!-- Kategori 1 -->
                          <div class="col-9">
                          <input class="form-control" id="merek" name="merek" type="text" placeholder="Merek">
                          </div>
                          <!-- Hapus -->
                          <div class="col-3">
                          <div class="btn-group">
                              <button class="btn btn-danger add_merk" type="button" id="add_merk"><i class="fa fa-trash"></i></button>
                          </div>
                          </div>
                      </div>
                      </form>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                      <button class="btn btn-primary" type="button">Simpan</button>
                  </div>
                  </div>
              </div>
            </div>
            <!-- Detail Produk -->
            <div class="modal fade" id="DetailMaterial" tabindex="-1" role="dialog" aria-labelledby="DetailMaterial" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                        <div class="modal-toggle-wrapper">
                          <div class="modal-header mb-4">
                              <h3>Detail Info</h3>
                              <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <ul class="list-group">
                                <!-- Barcode Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>BARCODE</span>
                                    <strong>
                                        <div style="font-size:0;position:relative;width:90px;height:35px;">
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:0px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:3px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:6px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:11px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:4px;height:35px;position:absolute;left:13px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:19px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:22px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:27px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:30px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:33px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:4px;height:35px;position:absolute;left:35px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:41px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:44px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:49px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:52px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:55px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:57px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:63px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:66px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:70px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:75px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:77px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:3px;height:35px;position:absolute;left:82px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:86px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:88px;top:0">&nbsp;</div>
                                        </div>
                                    </strong>
                                </li>
                                <!-- ID Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>ID PRODUK</span>
                                    <strong>ELVP-0001</strong>
                                </li>
                                <!-- Suplier -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>ID SUPPLIER</span>
                                    <strong>ELVSS-0001</strong>
                                </li>
                                <!-- No. Faktur -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>NO FAKTUR</span>
                                    <strong>KP981920003931</strong>
                                </li>
                                <!-- Nama Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>NAMA PRODUK</span>
                                    <strong>KAIN JCC-34-REVI</strong>
                                </li>
                                <!-- Merek Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>MEREK PRODUK</span>
                                    <strong>ELVA BRANDS</strong>
                                </li>
                                <!-- Jenis Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>KATEGORI PRODUK</span>
                                    <strong>KAIN PRINTING</strong>
                                </li>
                                <!-- Warna Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>WARNA PRODUK</span>
                                    <strong>COKLAT MAROON</strong>
                                </li>
                                <!-- Size Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>SIZE PRODUK</span>
                                    <strong>-</strong>
                                </li>
                                <!-- Panjang Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>UKURAN PANJANG</span>
                                    <strong>-</strong>
                                </li>
                                <!-- Lebar Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>UKURAN LEBAR</span>
                                    <strong>-</strong>
                                </li>
                                <!-- Satuan Produk -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>SATUAN PRODUK</span>
                                    <strong>METER</strong>
                                </li>
                                <!-- Jumlah Stock -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>TOTAL STOCK</span>
                                    <strong>250</strong>
                                </li>
                                <!-- Satuan Stock -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>SATUAN STOCK</span>
                                    <strong>METER</strong>
                                </li>
                                <!-- Total Modal -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>TOTAL COGS</span>
                                    <strong class="text-success">Rp68.750.000</strong>
                                </li>
                                <!-- Tanggal Registrasi -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>TANGGAL REGISTER</span>
                                    <strong>23/01/2024</strong>
                                </li>
                                <!-- Waktu Register -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>WAKTU REGISTER</span>
                                    <strong>18:39:59</strong>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          </div>