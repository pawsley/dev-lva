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
                                    <div class="col-3 position-relative"> 
                                        <label class="form-label" for="idm">ID MATERIAL</label>
                                        <input class="form-control" id="idm" type="text" placeholder="ID Otomatis" aria-label="idm" readonly>
                                    </div>
                                    <!-- Nama Material -->
                                    <div class="col-9 position-relative">
                                        <label class="form-label" for="nmm">NAMA MATERIAL</label>
                                        <input class="form-control" id="nmm" type="text" placeholder="Silahkan Masukkan Nama Material" required>
                                    </div>
                                    <!-- Kategori Material -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="katm">KATEGORI MATERIAL</label>
                                        <select class="form-select" id="katm" data-id="KAT" required="">
                                            <option selected="" disabled="" value="">Pilih Kategori Material</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="KAT" data-title="Tambah Kategori Baru" data-label="Nama Kategori Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="KAT" data-title="Daftar Kategori" data-label="Nama Kategori"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Brand Product -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="mrkm">MEREK MATERIAL</label>
                                        <select class="form-select" id="mrkm" required="">
                                            <option selected="" disabled="" value="">Pilih Merek</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="MRK" data-title="Tambah Merk Baru" data-label="Nama Merk Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="MRK" data-title="Daftar Merk" data-label="Nama Merk"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Variant Warna -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="wrnm">WARNA MATERIAL</label>
                                        <select class="form-select" id="wrnm" required="">
                                            <option selected="" disabled="" value="">Pilih Variant Warna</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="WRN" data-title="Tambah Warna Baru" data-label="Nama Warna Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="WRN" data-title="Daftar Warna" data-label="Nama Warna"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Satuan MAterial -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="satm">SATUAN MATERIAL</label>
                                        <select class="form-select" id="satm" required="">
                                            <option selected="" disabled="" value="">Pilih Satuan Material</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="SAT" data-title="Tambah Satuan Baru" data-label="Nama Satuan Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="SAT" data-title="Daftar Satuan" data-label="Nama Satuan"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Upload Gambar -->
                                    <div class="col-12 position-relative">
                                        <input class="form-control" id="imgm" name="imgm" type="file" accept=".png, .jpg, .jpeg" required style="display: none;">
                                        <div id="upload-btn" class="upload-btn"></div>
                                    </div>
                                    <!-- Submit Barang -->
                                    <div class="col-12 position-relative mb-3">
                                        <button class="btn btn-primary" type="button" id="addm">TAMBAH MATERIAL</button>
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
                            <table class="display" id="table-material">
                                <thead>
                                <tr>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">ID MATERIAL</span></th>
                                    <th style="text-align:center; min-width: 150px;"><span class="f-light f-w-600">NAMA MATERIAL</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">KATEGORI</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">MEREK</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">WARNA</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">SATUAN</span></th>
                                    <th style="text-align:center;"><span class="f-light f-w-600">AKSI</span></th>
                                </tr>
                                </thead>
                                <tbody>
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
            <div class="modal fade" id="TambahSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="TambahSubKategoriItem" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <div class="modal-header mb-4">
                                <h3 id="titmod"></h3>
                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="row g-3">
                            <!-- Nama -->
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="item" id="labmod"></label>
                                <input class="form-control" id="item" name="item" type="text" placeholder="Masukkan Item Baru">
                            </div>
                            <!-- Button Simpan -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="button" id="addmod" data-bs-dismiss="modal">Tambah Baru</button>
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
                            <h1 class="modal-title fs-5" id="labdaf"></h1>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body custom-input">
                            <form>
                                <div class="row g-3" id="daf-container">
                                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="editmod" data-bs-dismiss="modal" type="button">Simpan</button>
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