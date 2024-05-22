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
              <!-- Form Tambah Supplier -->
              <div class="row">
                  <!-- Form Produk -->
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4>Formulir Customer Baru</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3">
                                    <!-- Nama Customer -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="NamaCustomer">NAMA CUSTOMER</label>
                                        <input class="form-control" id="NamaCustomer" type="text" placeholder="Silahkan Masukkan Nama Customer" required>
                                    </div>
                                    <!-- Tipe Customer -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="KategoriCustomer">TIPE CUSTOMER</label>
                                        <select class="form-select" id="KategoriCustomer" required="">
                                            <option selected="" disabled="" value="">Pilih Kategori Customer</option>
                                            <option value="">Agen</option>
                                            <option value="">Reseller</option>
                                            <option value="">Member</option>
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
                                    <!-- ID Customer -->
                                    <div class="col-3 position-relative"> 
                                        <label class="form-label" for="IDCustomer">ID CUSTOMER</label>
                                        <input class="form-control" id="IDCustomer" type="text" placeholder="ID Terisi Otomatis" aria-label="IDCustomer" readonly>
                                    </div>
                                    <!-- Email Customer -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="">EMAIL CUSTOMER</label>
                                        <input class="form-control" id="" type="email" placeholder="alamat@email.com" aria-label="">
                                    </div>
                                    <!-- Nomor Whatsaap -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="whatsappNumber">NOMOR WHATSAPP</label>
                                        <div class="input-group has-validation"><span class="input-group-text" id="">+62</span>
                                            <input class="form-control" id="whatsappNumber" type="text" aria-describedby="whatsappHelp" placeholder="format : 81 xxx" required>
                                            <div class="invalid-tooltip">Pastikan Nomor Whatsapp Aktif.</div>
                                        </div>
                                    </div>
                                    <!-- Jenis Kelamin -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="">JENIS KELAMIN</label>
                                        <select class="form-select" id="" required="">
                                            <option selected="" disabled="" value="">Pilih Jenis Kelamin</option>
                                            <option value="">Pria</option>
                                            <option value="">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="card-header">
                                        <h4>Informasi Lanjutan</h4>
                                        <p class="f-m-light mt-1">
                                         <code>Berikut adalah formulir detail informasi alamat CUSTOMER ( OPSIONAL ).</code>
                                        </p>
                                    </div>
                                    <!-- Provinsi -->
                                    <div class="col-md-6 position-relative">
                                    <label class="form-label" for="FormProvinsi">PROVINSI</label>
                                    <select class="form-select" id="FormProvinsi" required="">
                                        <option selected="" disabled="" value="">Pilih Provinsi ...</option>
                                        <option>Jawa Timur</option>
                                        <option>Jawa Tengah</option>
                                        <option>Jawa Barat</option>
                                    </select>
                                    <div class="invalid-tooltip">Sialhkan Pilih Provinsi.</div>
                                    </div>
                                    <!-- Kabupaten / Kota -->
                                    <div class="col-md-6 position-relative">
                                    <label class="form-label" for="FormKotaKab">KOTA / KAB</label>
                                    <select class="form-select" id="FormKotaKab" required="">
                                        <option selected="" disabled="" value="">Pilih Kota / Kab ...</option>
                                        <option>Kota Surabaya</option>
                                        <option>Kabupaten Sidoarjo</option>
                                        <option>Kabupaten Malang</option>
                                    </select>
                                    <div class="invalid-tooltip">Sialhkan Pilih Kota / Kab.</div>
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-md-6 position-relative">
                                    <label class="form-label" for="FormKecamatan">KECAMATAN</label>
                                    <select class="form-select" id="FormKecamatan" required="">
                                        <option selected="" disabled="" value="">Pilih Kecamatan ...</option>
                                        <option>Jagir</option>
                                        <option>Wonokromo</option>
                                        <option>Kedung Asri</option>
                                    </select>
                                    <div class="invalid-tooltip">Sialhkan Pilih Kecamatan.</div>
                                    </div>
                                    <!-- Kelurahaan -->
                                    <div class="col-md-6 position-relative">
                                    <label class="form-label" for="FormKelurahaan">KELURAHAN</label>
                                    <select class="form-select" id="FormKelurahaan" required="">
                                        <option selected="" disabled="" value="">Pilih Kelurahaan ...</option>
                                        <option>Sawunggaling</option>
                                        <option>Kesatrian</option>
                                        <option>Gedangan</option>
                                    </select>
                                    <div class="invalid-tooltip">Sialhkan Pilih Kelurahaan.</div>
                                    </div>
                                    <!-- Detai Alamat -->
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label" for="FormDetailAlamat">DETAIL ALAMAT</label>
                                        <input class="form-control" id="FormDetailAlamat" type="text" placeholder="contoh: Jl. Tamtama No 19" required="">
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>
                                    <!-- Submit Customer -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">BUAT BARU</button>
                                    </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Produk -->
            </div>
            <!-- End Listing Supplier -->
          </div>