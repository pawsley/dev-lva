        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Buat Katalog</h4>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="<?=base_url()?>">                                       
                                        <svg class="stroke-icon">
                                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"> General</li>
                                <li class="breadcrumb-item"> Katalog</li>
                                <li class="breadcrumb-item active"> Buat Katalog</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <!-- Form Tambah Supplier -->
                <div class="row">
                    <!-- Form Produk -->
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                              <h4>Formulir Input Produk</h4>
                          </div>
                          <div class="card-body custom-input">
                                <form class="row g-3" id="form-log" enctype="multipart/form-data">
                                    <!-- ID Produk -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="sku">SKU KATALOG</label>
                                        <input class="form-control" id="sku" name="sku" type="text" placeholder="Nomor SKU Katalog" aria-label="SKUKatalog" readonly>
                                    </div>
                                    <!-- Nama Produk -->
                                    <div class="col-8 position-relative">
                                        <label class="form-label" for="namakatalog">NAMA KATALOG</label>
                                        <input class="form-control" id="namakatalog" name="namakatalog" type="text" placeholder="Silahkan Masukkan Nama Katalog" required>
                                    </div>
                                    <!-- Tipe Produk -->
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="selkat">TIPE</label>
                                        <select class="form-select" id="selkat" name="selkat" required="">
                                            <!-- <option selected="" disabled="" value="0">Pilih Tipe</option> -->
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="TPE" data-title="Tambah Tipe Baru" data-label="Nama Tipe Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="TPE" data-title="Daftar Tipe" data-label="Nama Tipe"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Brand Product -->
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="selmrk">MERK</label>
                                        <select class="form-select" id="selmrk" name="selmrk" required="">
                                            <!-- <option selected="" disabled="" value="0">Pilih Merek</option> -->
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
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="selwrn">WARNA</label>
                                        <select class="form-select" id="selwrn" name="selwrn" required="">
                                            <!-- <option selected="" disabled="" value="0">Pilih Warna</option> -->
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
                                    <div class="col-5 position-relative">
                                        <label class="form-label" id="logdtl">DETAIL KATALOG</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary" href="#!" id="add-row"><i class="icofont icofont-baby-cloth"></i></a>
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="SZ" data-title="Tambah Size Baru" data-label="Nama Size Baru">SZ</a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="SZ" data-title="Daftar Size" data-label="Nama Size"><i class="icofont icofont-settings"></i></a>
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="ST" data-title="Tambah Satuan Baru" data-label="Nama Satuan Baru">ST</a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="ST" data-title="Daftar Satuan" data-label="Nama Satuan"><i class="icofont icofont-settings"></i></a>
                                        </div>
                                    </div>
                                    <!-- Size Chart -->
                                    <div class="col-12 position-relative">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 6px !important;">Size</th>
                                                        <th scope="col" style="width: 6px !important;">Satuan</th>
                                                        <th scope="col" style="width: 2px !important;">Panjang</th>
                                                        <th scope="col" style="width: 2px !important;">Lebar</th>
                                                        <th scope="col" style="width: 2px !important;">Ukuran LD</th>
                                                        <th scope="col" style="width: 2px !important;">Ukuran PB</th>
                                                        <th scope="col" style="width: 120px !important; text-align:center;">Harga Jual</th>
                                                        <th scope="col" style="width: 1px !important;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="table-body">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- Catatan Produk -->
                                    <div class="col-12 position-relative">
                                      <label class="form-label" for="notes">CATATAN TAMBAHAN</label>
                                      <textarea class="form-control input-air-primary" id="notes" name="notes" rows="3"></textarea>
                                    </div>
                                    <!-- Upload Gambar -->
                                    <div class="col-12 position-relative"> 
                                        <label class="form-label" for="imgm">UPLOAD GAMBAR</label>
                                        <input class="form-control" id="imgm" name="imgm" type="file" accept=".png, .jpg, .jpeg" style="visibility: hidden;">
                                        <div id="upload-btn" class="upload-btn"></div>
                                    </div>
                                    <!-- Submit Barang -->
                                    <div class="col-12">
                                        <button type="submit" id="sublog" class="btn btn-primary">
                                            <span id="spinner_sublog" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                            <span id="tx_sublog">Tambah Katalog</span>
                                        </button>
                                        <!-- <button class="btn btn-primary" type="submit">Tambah Katalog</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- End Form Produk -->
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
                                <button class="btn btn-primary" type="button" id="addmod">Tambah Baru</button>
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
          </div>