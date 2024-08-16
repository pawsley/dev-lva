        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Buat Customer</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-user"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Customer</li>
                      <li class="breadcrumb-item active"> Buat Baru</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
              <!-- Form Tambah CST -->
              <div class="row">
                  <!-- Form CST -->
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Formulir Customer Baru</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3" id="form-cst" method="post">
                                    <!-- Nama Customer -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="nmc">NAMA CUSTOMER</label>
                                        <input class="form-control" id="nmc" name="nmc" type="text" placeholder="Silahkan Masukkan Nama Customer" required>
                                    </div>
                                    <!-- Tipe Customer -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="tpc">TIPE CUSTOMER</label>
                                        <div class="input-group">
                                            <select class="form-control" id="tpc" name="tpc" required>
                                                <option disabled="" value="0">Pilih Tipe Customer</option>
                                            </select>
                                            <span class="input-group-append ps-1">
                                                <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="TCS" data-title="Tambah Tipe Customer" data-label="Nama Tipe Customer"><i class="fa fa-plus"></i></a>
                                                <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="TCS" data-title="Daftar Tipe Customer" data-label="Nama Tipe Customer"><i class="fa fa-bars"></i></a>
                                            </span>
                                            <div class="invalid-tooltip">Pilih tipe customer</div>
                                        </div>
                                    </div>
                                    <!-- ID Customer -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="idc">ID CUSTOMER</label>
                                        <input class="form-control" id="idc" name="idc" type="text" placeholder="ID Terisi Otomatis" aria-label="IDCustomer" readonly>
                                    </div>
                                    <!-- Email Customer -->
                                    <div class="col-6 position-relative"> 
                                        <label class="form-label" for="emc">EMAIL CUSTOMER</label>
                                        <input class="form-control" id="emc" name="emc" type="email" placeholder="alamat@email.com" aria-label="" required>
                                    </div>
                                    <!-- Nomor Whatsaap -->
                                    <div class="col-6 position-relative">
                                        <label class="form-label" for="wac">NOMOR WHATSAPP</label>
                                        <div class="input-group has-validation"><span class="input-group-text" id="">+62</span>
                                            <input class="form-control" id="wac" name="wac" type="text" oninput="formatPhoneNumber(this)" placeholder="contoh: +6281220812206" required>
                                            <div class="invalid-tooltip">Pastikan Nomor Whatsapp Aktif.</div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4>Informasi Lanjutan</h4>
                                        <p class="f-m-light mt-1">
                                         <code>Berikut adalah formulir detail informasi alamat CUSTOMER ( OPSIONAL ).</code>
                                        </p>
                                    </div>
                                    <!-- Provinsi -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="province">Provinsi </label>
                                        <select class="form-select" id="province" name="prov" required>
                                            <option selected="" disabled="" value="0">Pilih Provinsi ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="prov_name" id="prov_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Provinsi.</div>
                                    </div>
                                    <!-- Kabupaten / Kota -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kabupaten">Kota / Kabupaten</label>
                                        <select class="form-select" id="kabupaten" name="kab" required>
                                            <option selected="" disabled="" value="0">Pilih Kota / Kab ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="kab_name" id="kab_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kota / Kab.</div>
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kecamatan">Kecamatan</label>
                                        <select class="form-select" id="kecamatan" name="kec" required>
                                            <option selected="" disabled="" value="0">Pilih Kecamatan ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="kec_name" id="kec_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kecamatan.</div>
                                    </div>
                                    <!-- Kode Pos -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kode_pos">Kode Pos </label>
                                        <input class="form-control" id="kode_pos" name="kode_pos" type="number" placeholder="contoh: 60293" required>
                                    </div>
                                    <!-- Detai Alamat -->
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label" for="alamat">Detail Alamat</label>
                                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="contoh: Jl. Tamtama No 19" required>
                                    </div>
                                    <!-- Submit Customer -->
                                    <div class="col-12">
                                        <!-- <button class="btn btn-primary" type="submit">BUAT BARU</button> -->
                                        <button type="submit" id="subcst" class="btn btn-primary">
                                            <span id="spinner_cst" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                            <span id="tx_subcst">BUAT BARU</span>
                                        </button>
                                    </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form CST -->
            </div>
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
            <div class="modal fade" id="DaftarSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="DaftarSubKategoriItem" aria-hidden="true">
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
            <!-- End Listing CST -->
        </div>
        