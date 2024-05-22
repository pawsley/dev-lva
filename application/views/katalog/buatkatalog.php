<div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Buat Katalog</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-gallery"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
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
                              <form class="row g-3">
                                    <!-- ID Produk -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="SKUKatalog">SKU KATALOG</label>
                                        <input class="form-control" id="SKUKatalog" type="text" placeholder="Nomor SKU Katalog" aria-label="SKUKatalog">
                                    </div>
                                    <!-- Nama Produk -->
                                    <div class="col-8 position-relative">
                                        <label class="form-label" for="NamaKatalog">NAMA KATALOG</label>
                                        <input class="form-control" id="NamaKatalog" type="text" placeholder="Silahkan Masukkan Nama Katalog" required>
                                    </div>
                                    <!-- Kategori Produk -->
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="KategoriProduk">KATEGORI</label>
                                        <select class="form-select" id="KategoriProduk" required="">
                                            <option selected="" disabled="" value="">Pilih Kategori Produk</option>
                                            <option>Kain Cetak</option>
                                            <option>Kain Krudung</option>
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
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="MerekProduk">MEREK KATALOG</label>
                                        <select class="form-select" id="MerekProduk" required="">
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
                                    <div class="col-2 position-relative"> 
                                        <label class="form-label" for="VarianWarnaProduk">WARNA KATALOG</label>
                                        <select class="form-select" id="VarianWarnaProduk" required="">
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
                                    <!-- Ukuran / Size -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="UkuranProduk">SIZE KATALOG</label>
                                        <select class="form-select" id="SatuanProduk" required="">
                                            <option selected="" disabled="" value="">Pilih Satuan Produk</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                            <option>Xtra Large</option>
                                            <option>Custom</option>
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
                                    <!-- Satuan Produk -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="SatuanProduk">SATUAN KATALOG</label>
                                        <select class="form-select" id="SatuanProduk" required="">
                                            <option selected="" disabled="" value="">Pilih Satuan Produk</option>
                                            <option>Centi Meter</option>
                                            <option>Mili Meter</option>
                                            <option>Meter</option>
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
                                    <!-- Ukuran Panjang -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="PanjangUkuranProduk">UKURAN PANJANG</label>
                                        <input class="form-control" id="PanjangUkuranProduk" type="text" placeholder="Ukuran Panjang" required>
                                    </div>
                                    <!-- Ukuran Lebar -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="LebarUkuranProduk">UKURAN LEBAR</label>
                                        <input class="form-control" id="LebarUkuranProduk" type="text" placeholder="Ukuran Lebar" required>
                                    </div>
                                    <!-- Lingkar Dada -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="LebarUkuranProduk">UKURAN LD</label>
                                        <input class="form-control" id="LebarUkuranProduk" type="text" placeholder="Ukuran Lingkar Dada" required>
                                    </div>
                                    <!-- Panjang Baju -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="LebarUkuranProduk">UKURAN PB</label>
                                        <input class="form-control" id="LebarUkuranProduk" type="text" placeholder="Ukuran Panjang Baju" required>
                                    </div>
                                    <!-- Catatan Produk -->
                                    <div class="col-12 position-relative">
                                      <label class="form-label" for="CatatanProduk">CATATAN TAMBAHAN</label>
                                      <textarea class="form-control input-air-primary" id="exampleFormControlTextarea19" rows="3"></textarea>
                                    </div>
                                    <!-- Upload Gambar -->
                                    <div class="col-12 position-relative"> 
                                        <label class="form-label" for="formFile">UPLOAD GAMBAR</label>
                                        <input class="form-control" id="formFile" type="file" accept=".jgp, .jpeg, .png" maxlength="10000000" required>
                                    </div>
                                    <!-- Submit Barang -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">INPUT PRODUK</button>
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
                    <h1 class="modal-title fs-5" id="category-pill-modalLabel">List Data</h1>
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
          </div>