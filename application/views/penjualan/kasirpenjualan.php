        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Kasir</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">                                       
                          <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
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
                              <h4>Formulir Penjualan</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3 mb-4">
                                    <!-- Invoice ID -->
                                    <div class="col-2 position-relative">
                                      <label class="form-label" for="">INVOICE ID</label>
                                      <input class="form-control" id="" type="text" placeholder="Terisi Otomatis" required readonly>
                                    </div>
                                    <!-- Select Produk -->
                                    <div class="col-9 position-relative">
                                        <label class="form-label" for="">PILIH PRODUK</label>
                                        <input class="form-control" id="" type="text" placeholder="Pilih Produk Katalog" required readonly>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-1 position-relative">
                                      <label class="form-label" for="shortcuttambahdata">KATALOG</label>
                                      <div>
                                          <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-shopping-basket"></i></a>
                                      </div>
                                    </div>
                                    <!-- Table Keranjang -->
                                    <div class="order-history table-responsive wishlist">
                                      <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>PRODUK</th>
                                            <th>SIZE</th>
                                            <th>LD</th>
                                            <th>PB</th>
                                            <th>HARGA</th>
                                            <th>QUANTITY</th>
                                            <th>AKSI</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <!-- Data 1 -->
                                          <tr>
                                            <!-- Gambar -->
                                            <td><img class="img-fluid img-40" src="../assets/images/katalog/jannete.jpg" alt="#"></td>
                                            <!-- Nama Produk -->
                                            <td>
                                              <div class="product-name">JANNETE DRESS</div>
                                            </td>
                                            <!-- Size Produk -->
                                            <td>L</td>
                                            <!-- LD Produk -->
                                            <td>
                                              <div class="input-group">
                                                <input class="form-control me-2" type="text" placeholder="2.67" readonly>
                                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">M</span>
                                              </div>
                                            </td>
                                            <!-- Panjang Produk -->
                                            <td>
                                              <div class="input-group">
                                                <input class="form-control me-2" type="text" placeholder="2.67" readonly>
                                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">M</span>
                                              </div>
                                            </td>
                                            <!-- Harga Produk -->
                                            <td>Rp1.890.000</td>
                                            <!-- Qty Produk -->
                                            <td>
                                              <fieldset class="qty-box">
                                                <div class="input-group">
                                                  <input class="touchspin text-center" type="text" value="1">
                                                </div>
                                              </fieldset>
                                            </td>
                                            <!-- Aksi Buton Hapus -->
                                            <td>
                                              <i data-feather="trash-2"></i>
                                            </td>
                                          </tr>
                                          <!-- Data 2 -->
                                          <tr>
                                            <!-- Gambar -->
                                            <td><img class="img-fluid img-40" src="../assets/images/katalog/beyza.jpg" alt="#"></td>
                                            <!-- Nama Produk -->
                                            <td>
                                              <div class="product-name">BEYZA DRESS</div>
                                            </td>
                                            <!-- Size Produk -->
                                            <td>CUSTOM</td>
                                            <!-- LD Produk -->
                                            <td>
                                              <div class="input-group">
                                                <input class="form-control me-2" type="text" placeholder="Custom">
                                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">M</span>
                                              </div>
                                            </td>
                                            <!-- Panjang Produk -->
                                            <td>
                                              <div class="input-group">
                                                <input class="form-control me-2" type="text" placeholder="Custom">
                                                <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">M</span>
                                              </div>
                                            </td>
                                            <!-- Harga Produk -->
                                            <td>Rp1.890.000</td>
                                            <!-- Qty Produk -->
                                            <td>
                                              <fieldset class="qty-box">
                                                <div class="input-group">
                                                  <input class="touchspin text-center" type="text" value="1">
                                                </div>
                                              </fieldset>
                                            </td>
                                            <!-- Aksi Buton Hapus -->
                                            <td>
                                              <i data-feather="trash-2"></i>
                                            </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    </div>
                                    <!-- Catatan -->
                                    <div class="col-12 position-relative">
                                      <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea" placeholder="Buat Catatan Disini"></textarea>
                                        <label for="floatingTextarea">Catatan (Opsional)</label>
                                      </div>
                                    </div>
                                    <!-- Lanjut Pembayaran -->
                                    <div class="row g-3 mt-4">
                                      <!-- Detail Pelanggan -->
                                      <div class="col-xl-6 col-sm-12">
                                        <form>
                                          <div class="row">
                                            <div class="mb-3 col-sm-9">
                                              <label for="">CUSTOMER</label>
                                              <select class="form-select" id="" required="">
                                                <option selected="" disabled="" value="">Pilih Customer ...</option>
                                                <option>ELVC-0001 | ILHAM RAMADHAN TAUFIQ | AGEN | Rp23.000.000</option>
                                              </select>
                                            </div>
                                            <!-- Button Tambah -->
                                            <div class="col-sm-3 mb-3 position-relative">
                                              <label class="form-label" for="shortcuttambahdata">ADD NEW</label>
                                              <div>
                                                <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#CustomerBaru" style="padding-bottom: 6px;border-bottom-width: 1px;border-bottom-style: solid;margin-top: 5px;"><i class="fa fa-plus"></i></a>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="mb-3 col-sm-6">
                                              <label for="">WHATSAPP</label>
                                              <input class="form-control" id="" type="number" placeholder="Terisi Otomatis" readonly>
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                              <label for="">EMAIL ADDRESS</label>
                                              <input class="form-control" id="" type="email" placeholder="Terisi Otomatis" readonly>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <!-- Provinsi -->
                                            <div class="mb-3 col-sm-12">
                                              <label class="form-label" for="FormProvinsi">PROVINSI</label>
                                              <select class="form-select" id="FormProvinsi" required="">
                                                  <option selected="" disabled="" value="">Pilih Provinsi ...</option>
                                                  <option>Jawa Timur</option>
                                                  <option>Jawa Tengah</option>
                                                  <option>Jawa Barat</option>
                                              </select>
                                            </div>
                                            <!-- Kabupaten / Kota -->
                                            <div class="mb-3 col-sm-6">
                                              <label class="form-label" for="FormKotaKab">KOTA / KABUPATEN</label>
                                              <select class="form-select" id="FormKotaKab" required="">
                                                <option selected="" disabled="" value="">Pilih Kota / Kab ...</option>
                                                <option>Kota Surabaya</option>
                                                <option>Kabupaten Sidoarjo</option>
                                                <option>Kabupaten Malang</option>
                                              </select>
                                            </div>
                                            <!-- Kecamatan -->
                                            <div class="mb-3 col-sm-6">
                                              <label class="form-label" for="FormKecamatan">KECAMATAN</label>
                                              <select class="form-select" id="FormKecamatan" required="">
                                                  <option selected="" disabled="" value="">Pilih Kecamatan ...</option>
                                                  <option>Jagir</option>
                                                  <option>Wonokromo</option>
                                                  <option>Kedung Asri</option>
                                              </select>
                                            </div>
                                            <!-- Kelurahan -->
                                            <div class="mb-3 col-sm-6">
                                              <label class="form-label" for="FormKelurahaan">KELURAHAN</label>
                                              <select class="form-select" id="FormKelurahaan" required="">
                                                  <option selected="" disabled="" value="">Pilih Kelurahaan ...</option>
                                                  <option>Sawunggaling</option>
                                                  <option>Kesatrian</option>
                                                  <option>Gedangan</option>
                                              </select>
                                            </div>
                                            <!-- Postal Code -->
                                            <div class="mb-3 col-sm-6">
                                              <label for="inputAddress6">KODE POS</label>
                                              <input class="form-control" id="inputAddress6" type="number">
                                            </div>
                                            <!-- Detail Jalan -->
                                            <div class="mb-3 col-sm-12">
                                              <label for="inputAddress5">DETAIL JALAN</label>
                                              <input class="form-control" id="inputAddress5" type="text">
                                            </div>
                                            <!-- Pilih Kurir -->
                                            <div class="mb-3 col-sm-12">
                                              <label for="">Pilih Jasa Pengiriman</label>
                                              <select class="form-select" id="" required="">
                                                <option selected="" disabled="" value="">Pilih Pengiriman ...</option>
                                                <option>API Raja Ongkir</option>
                                                <option>API Raja Ongkir</option>
                                                <option>API Raja Ongkir</option>
                                            </select>
                                            </div>
                                          </div>
                                        </form>
                                      </div>
                                      <!-- Summary Order -->
                                      <div class="col-xl-6 col-sm-12">
                                        <div class="row">
                                          <!-- Tanggal -->
                                          <div class="mb-3 col-sm-12">
                                            <label class="form-label" for="">DUE DATE</label>
                                            <input class="form-control digits" id="" name="" type="datetime-local" value="2023-05-03T18:45:00">
                                          </div>
                                          <!-- Saldo Aktif -->
                                          <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="SaldoAktif">SALDO AKTIF</label>
                                              <div class="input-group"><span class="input-group-text" id="SaldoAktif">Rp</span>
                                                <input class="form-control" id="" type="text" value="4.500.000" readonly="">
                                              </div>
                                          </div>
                                          <!-- Kode Diskon -->
                                          <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="">KODE DISKON</label>
                                              <div class="input-group">
                                                <input class="form-control me-2" type="text" placeholder="Kode Kupon"><a class="btn btn-primary" href="#">Apply</a>
                                              </div>
                                          </div>
                                          <!-- Bank Pengirim -->
                                          <div class="col-mb-3 col-sm-6"> 
                                            <label class="form-label" for="">BANK PENGIRIM</label>
                                              <select class="form-select" id="">
                                                  <option selected="" disabled="" value="">Pilih Bank</option>
                                                  <option>BCA</option>
                                                  <option>MANDIRI</option>
                                                  <option>BNI</option>
                                                  <option>BRI</option>
                                              </select>
                                          </div>
                                          <!-- Bank Penerima -->
                                          <div class="col-mb-3 col-sm-6"> 
                                            <label class="form-label" for="">BANK PENGIRIM</label>
                                              <select class="form-select" id="">
                                                  <option selected="" disabled="" value="">Pilih Bank</option>
                                                  <option>BCA | 3456787 | ELVA FAUQO</option>
                                                  <option>MANDIRI | 4567865437 | ELVA FAUQO</option>
                                                  <option>BNI | 9876545678 | ELVA FAUQO</option>
                                                  <option>BRI | 98765456789 | ELVA FAUQO</option>
                                              </select>
                                          </div>
                                          <!-- Nomor Rekening -->
                                          <div class="mb-3 mt-3 col-sm-12">
                                            <label for="">NOMOR REKENING</label>
                                            <input class="form-control" id="" type="text" placeholder="Input Nomor Rekening Pengirim">
                                          </div>
                                          <!-- Jumlah Pembayaran -->
                                          <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="">NOMINAL PEMBAYARAN</label>
                                              <div class="input-group"><span class="input-group-text" id="">Rp</span>
                                                <input class="form-control" id="" type="text" value="" onkeyup="formatRupiah(this)">
                                              </div>
                                          </div>
                                          <!-- Total Tagihan -->
                                          <div class="mb-3 col-sm-6">
                                            <label class="form-label" for="SaldoAktif">TOTAL TAGIHAN</label>
                                              <div class="input-group"><span class="input-group-text" id="SaldoAktif">Rp</span>
                                                <input class="form-control" id="" type="text" value="" readonly="">
                                              </div>
                                          </div>
                                        </div>
                                        <!-- Detail Pemesanan -->
                                        <div class="checkout-details">
                                          <div class="order-box">
                                            <div class="title-box">
                                              <div class="checkbox-title">
                                                <h4>Detail Pesanan </h4><span>Total</span>
                                              </div>
                                            </div>
                                            <ul class="sub-total">
                                              <li>Subtotal <span class="count">Rp3.780.000</span></li>
                                              <li>Biaya Pengiriman <span class="count">Rp120.000</span></li>
                                              <li>Biaya Tambahan <span class="count">Rp60.000</span></li>
                                              <li>Diskon <span class="count text-danger">Rp756.000</span></li>
                                            </ul>
                                            <hr>
                                            <ul class="sub-total mt-4">
                                              <li>GRAND TOTAL <span class="count text-success f-w-700">Rp3.204.000</span></li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Submit Pesanan -->
                                    <div class="col-12">
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