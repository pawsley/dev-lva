        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Riwayat Penjualan</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">                                       
                            <svg class="stroke-icon">
                            <use href="../assets/svg/icon-sprite.svg#stroke-ecommerce"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Penjualan</li>
                    <li class="breadcrumb-item active">Riwayat Penjualan</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- Mulai Data Produk Katalog -->
            <div class="row"> 
              <div class="col-12"> 
                <div class="card height-equal"> 
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead> 
                                <tr>
                                  <th><span class="f-light f-w-600">TANGGAL</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID INVOICE</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID TRANSAKSI</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID CUSTOMER</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">NOMINAL HARGA</span></th>
                                  <th><span class="f-light f-w-600">TOMBOL AKSI</span></th>
                                </tr>
                            </thead>
                            <tbody> 
                              <!-- Data Produk 1 -->
                              <tr class="odd" role="row">
                                <td>
                                    <p class="f-light">2024/02/05</p>
                                </td>
                                <td>
                                    <p class="f-light">INVS-00001</p>
                                </td>
                                <td>
                                    <p class="f-light">5678312345670</p>
                                </td>
                                <td>
                                    <p class="f-light">ELVC-0001</p>
                                </td>
                                <td>
                                    <p class="f-light f-w-600 text-success">Rp3.204.000</p>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-info"><i class="fa fa-truck"></i></button>
                                        <button class="btn btn-info"><i class="fa fa-envelope"></i></button>
                                        <button class="btn btn-info"><i class="fa fa-file-text-o"></i></button>
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#DetailTransaksi"><i class="fa fa-eye"></i></button>
                                    </div>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <!-- Modal Detail Transaksi -->
            <div class="modal fade" id="DetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="DetailTransaksi" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content dark-sign-up">
                      <div class="modal-body social-profile text-start" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                      <div class="modal-toggle-wrapper">
                        <div class="modal-header mb-4">
                            <h3>Detail Info</h3>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="row g-3 mb-3">
                            <!-- Table Produk -->
                            <div class="order-history table-responsive wishlist">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>PRODUK</th>
                                      <th>SIZE</th>
                                      <th>LD</th>
                                      <th>PB</th>
                                      <th>QTY</th>
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
                                      <td>2.67M</td>
                                      <!-- Panjang Produk -->
                                      <td>2.67M</td>
                                      <!-- Qty Produk -->
                                      <td>1</td>
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
                                      <td>2.67M</td>
                                      <!-- Panjang Produk -->
                                      <td>2.67M</td>
                                      <!-- Qty Produk -->
                                      <td>1</td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Detail Card -->
                        <ul class="list-group">
                            <!-- Tanggal Pembayaran -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>TANGGAL & WAKTU</span>
                                <strong>2024/02/05 13:47:51</strong>
                            </li>
                            <!-- INVOICE ID -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>INVOICE ID</span>
                                <strong>INVS-00001</strong>
                            </li>
                            <!-- TRANSAKSI ID -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>TRANSAKSI ID</span>
                                <strong>5678312345670</strong>
                            </li>
                            <!-- ID CUSTOMER -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>CUSTOMER ID</span>
                                <strong>ELVC-0001</strong>
                            </li>
                            <!-- Nama Katalog -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>NAMA CUSTOMER</span>
                                <strong>ILHAM RAMADHAN TAUFIQ</strong>
                            </li>
                            <!-- Kategori -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>KATEGORI CUSTOMER</span>
                            <strong>AGEN</strong>
                            </li>
                            <!-- Bank pengirim -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>BANK PENGIRIM</span>
                            <strong>MANDIRI</strong>
                            </li>
                            <!-- Nomor Rekeing -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>NOMOR REKEKING</span>
                            <strong>1420003333316</strong>
                            </li>
                            <!-- Bank Penerima -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>BANK PENERIMA</span>
                            <strong>MANDIRI</strong>
                            </li>
                            <!-- Nomor Rekening -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>NOMOR REKEKING</span>
                            <strong>1420003333316</strong>
                            </li>
                            <!-- Nominal Tagihan -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>NOMINAL PEMBAYARAN</span>
                                <strong class="text-success">Rp3.204.000</strong>
                            </li>
                            <!-- Nominal Tagihan -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>CATATAN</span>
                            <strong>Tidak ada Catatan</strong>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>