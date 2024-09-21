        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Kasir Penjualan</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">                                       
                          <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Penjualan</li>
                      <li class="breadcrumb-item active"> Kasir Penjualan</li>
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
                              <h4>Form Order</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3 mb-4">
                                    <!-- ORDER ID -->
                                    <div class="col-md-4 position-relative">
                                      <label class="form-label" for="ordid">ORDER ID</label>
                                      <input class="form-control" id="ordid" name="ordid" type="text" placeholder="Terisi Otomatis" required readonly>
                                    </div>
                                    <!-- Select Produk -->
                                    <div class="col-md-7 position-relative">
                                        <label class="form-label" for="selkat">PILIH PRODUK</label>
                                        <select class="form-select" id="selkat" name="selkat" required>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-md-1 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">KATALOG</label>
                                      <div>
                                          <a class="btn badge-light-primary" href="<?=base_url()?>katalog/buat-baru" ><i class="fa fa-shopping-basket"></i></a>
                                      </div>
                                    </div>
                                    <!-- Table Keranjang -->
                                    <div class="order-history table-responsive wishlist">
                                      <table class="table table-bordered" id="table-order" width="100%">
                                        <thead>
                                          <tr>
                                            <th style="width: 2%">#</th>
                                            <th>PRODUK</th>
                                            <th>SIZE</th>
                                            <th>HARGA</th>
                                            <th>QUANTITY</th>
                                            <th>AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody id="list-order">
                                        </tbody>
                                      </table>
                                    </div>
                                    <div class="col-md-12 position-relative">
                                      <div class="checkout-details">
                                        <div class="order-box">
                                          <ul class="sub-total">
                                            <li>Subtotal <span class="count">0</span></li>
                                            <li>Diskon <span class="count text-danger">0</span></li>
                                          </ul>
                                          <hr>
                                          <ul class="sub-total mt-4">
                                            <li>GRAND TOTAL <span class="count text-success f-w-700">0</span></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>                                    
                                    <!-- Catatan -->
                                    <div class="col-md-12 position-relative">
                                      <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" placeholder="Buat Catatan Disini"></textarea>
                                        <label for="floatingTextarea">Catatan (Opsional)</label>
                                      </div>
                                    </div>
                                    <div class="col-md-4 position-relative">
                                      <label class="form-label" for="cst">CUSTOMER</label>
                                      <div class="input-group">
                                        <select class="form-select" id="cst" name="cst" required>
                                        </select>
                                        <span class="input-group-append ps-1">
                                            <a class="btn badge-light-primary shownewmod" href="<?=base_url()?>customer/buat-baru" ><i class="fa fa-plus"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                      <label class="form-label" for="wa">WHATSAPP</label>
                                      <input class="form-control" id="wa" name="wa" type="text" placeholder="Terisi Otomatis" readonly>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                      <label class="form-label" for="email">EMAIL</label>
                                      <input class="form-control" id="email" name="email" type="text" placeholder="Terisi Otomatis" readonly>
                                    </div>
                                    <div class="col-md-2 position-relative">
                                      <label class="form-label" for="duedate">TANGGAL ORDER</label>
                                      <input class="form-control digits" id="duedate" name="duedate" type="date">
                                    </div>
                                    <!-- Submit Pesanan -->
                                    <div class="col-md-12 position-relative">
                                      <button class="btn btn-success-gradien cart-btn-transform" type="submit">PROSES PESANAN</button>
                                    </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Produk -->
            </div>
            <!-- End Listing Supplier -->
            <!-- Modal buat Customer Baru -->
            <div class="modal fade bd-example-modal-lg" id="CustomerBaru" tabindex="-1" role="dialog" aria-labelledby="CustomerBaru" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start" style="max-height: 95vh; overflow-y: auto;">
                          <div class="modal-toggle-wrapper">
                              <div class="modal-header mb-4">
                                  <h3>Buat Customer Baru</h3>
                                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="card-body custom-input">
                                <form class="row g-3">
                                  <!-- Nama Customer -->
                                  <div class="col-6 position-relative">
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
              </div>
            </div>
            <!-- Modal Data Katalog -->
            <div class="modal fade bd-example-modal-lg" id="CariBarang" tabindex="-1" role="dialog" aria-labelledby="CariBarang" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start" style="max-height: 95vh; overflow-y: auto;">
                          <div class="modal-toggle-wrapper">
                              <div class="modal-header mb-4">
                                  <h3>Inventori Stock</h3>
                                  <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <!-- Isi Konten -->
                              <ul class="list-group">
                                <!-- ID OPNAME -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>ID OPNAME</span>
                                    <strong>#OPNM-0020001</strong>
                                </li>
                                <!-- Nama Auditor -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>NAMA AUDITOR</span>
                                    <strong>FIGO VIO HIDAYAT</strong>
                                </li>
                                <!-- NAMA CABANG -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>DETAIL CABANG</span>
                                    <strong>DHC-0002 | DH STORE PTC</strong>
                                </li>
                                <!-- TANGGAL & WAKTU -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>TANGGAL & WAKTU</span>
                                    <strong>23/01/2024 18:39 WIB</strong>
                                </li>
                                <!-- TOTAL PRODUK -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>TOTAL PRODUK</span>
                                    <strong>0</strong>
                                </li>
                              </ul>
                              <!-- Data Table -->
                              <div class="col-lg-12"> 
                                  <div class="card"> 
                                      <div class="card-body">
                                          <div class="list-product-header">
                                              <div> 
                                                  <div class="light-box">
                                                  <a data-bs-toggle="collapse" href="#filterstockopname" role="button" aria-expanded="false" aria-controls="filterstockopname">
                                                  <i class="filter-icon show" data-feather="filter"></i>
                                                  <i class="icon-close filter-close hide"></i>
                                                  </a>
                                                  </div>
                                                  <a class="btn btn-primary" type="submit"><i class="fa fa-plus"></i>Tambahkan</a>
                                              </div>
                                              <div class="collapse" id="filterstockopname">
                                                <div class="card card-body list-product-body">
                                                    <div class="row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-2 g-3">
                                                    <!--Filter 1 -->
                                                    <div class="col">
                                                        <select class="form-select" aria-label="FilterSupplier">
                                                        <option selected="">Filter Supplier</option>
                                                        <option value="1">DHSUPP-0001 | DH STORE</option>
                                                        <option value="2">DHSUPP-0002 | TAM Teletama Artha Mandiri</option>
                                                        <option value="3">DHSUPP-0003 | SUPPLIER 3</option>
                                                        </select>
                                                    </div>
                                                    <!--Filter 2 -->
                                                    <div class="col"> 
                                                        <select class="form-select" aria-label="FilterMerek">
                                                        <option selected="">Filter Merek</option>
                                                        <option value="1">APPLE</option>
                                                        <option value="2">WINDOWS</option>
                                                        <option value="3">SAMSUNG</option>
                                                        <option value="3">SPIGEN</option>
                                                        <option value="3">ARMORS</option>
                                                        </select>
                                                    </div>
                                                    <!--Filter 3 -->
                                                    <div class="col"> 
                                                        <select class="form-select" aria-label="FilterJenis">
                                                        <option selected="">Filter Jenis</option>
                                                        <option value="1">AKSESORIS</option>
                                                        <option value="2">HANDPHONE</option>
                                                        <option value="3">LAPTOP</option>
                                                        <option value="3">TABLETS</option>
                                                        </select>
                                                    </div>
                                                    <!--Filter 4 -->
                                                    <div class="col"> 
                                                        <select class="form-select" aria-label="FilterPenyimpanan">
                                                        <option selected="">Pilih Penyimpanan</option>
                                                        <option value="1">16 Gb</option>
                                                        <option value="2">32 Gb</option>
                                                        <option value="3">64 Gb</option>
                                                        <option value="4">128 Gb</option>
                                                        <option value="5">256 Gb</option>
                                                        <option value="6">500 Gb</option>
                                                        <option value="7">1000 Gb</option>
                                                        <option value="8">2000 Gb</option>
                                                        </select>
                                                    </div>
                                                    <!--Filter 5 -->
                                                    <div class="col"> 
                                                        <select class="form-select" aria-label="FilterWarna">
                                                        <option selected="">Pilih Warna</option>
                                                        <option value="1">Warna 1</option>
                                                        <option value="2">Warna 2</option>
                                                        <option value="3">Warna 3</option>
                                                        <option value="4">Warna 4</option>
                                                        <option value="5">Warna 5</option>
                                                        </select>
                                                    </div>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          <!-- Data Table List -->
                                          <div class="list-product">
                                              <table class="table" id="project-status">
                                              <thead> 
                                                  <!-- Header Data Table -->
                                                  <tr>
                                                      <th> <div class="form-check"><input class="form-check-input checkbox-primary" type="checkbox"></div></th>
                                                      <th> <span class="f-light f-w-600">NAMA PRODUK</span></th>
                                                      <th> <span class="f-light f-w-600">ID SUPPLIER</span></th>
                                                      <th> <span class="f-light f-w-600">SN PRODUK</span></th>
                                                      <th> <span class="f-light f-w-600">MEREK</span></th>
                                                      <th> <span class="f-light f-w-600">JENIS</span></th>
                                                      <th> <span class="f-light f-w-600">KAPASITAS</span></th>
                                                  </tr>
                                              </thead>
                                              <tbody> 
                                                  <!-- Data 1 -->
                                                  <tr class="product-removes">
                                                      <!-- Action Button -->
                                                      <td>
                                                          <div class="form-check"> 
                                                          <input class="form-check-input checkbox-primary" type="checkbox">
                                                          </div>
                                                      </td>
                                                      <!-- Nama Produk -->
                                                      <td>
                                                          <div class="product-names">
                                                              <p>IPHONE 12 PRO MAX</p>
                                                          </div>
                                                      </td>
                                                      <!-- Supplier -->
                                                      <td> 
                                                          <p class="f-light">DHSUPP-0002</p>
                                                      </td>
                                                      <!-- SN Produk -->
                                                      <td> 
                                                          <p class="f-light">350944540625782</p>
                                                      </td>
                                                      <!-- MEREK -->
                                                      <td> 
                                                        <p class="f-light">APPLE</p>
                                                      </td>
                                                      <!-- JENIS -->
                                                      <td> 
                                                        <p class="f-light">HANDPHONE</p>
                                                      </td>
                                                      <!-- Kapasitas -->
                                                      <td> 
                                                        <p class="f-light">256 Gb</p>
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
                  </div>
              </div>
            </div>
          </div>