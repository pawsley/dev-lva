        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>TRANSAKSI CUSTOMER</h4>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="index.html">                                       
                              <svg class="stroke-icon">
                              <use href="../assets/svg/icon-sprite.svg#stroke-gallery"></use>
                              </svg>
                          </a>
                      </li>
                      <li class="breadcrumb-item">Penjualan</li>
                      <li class="breadcrumb-item active">Transaksi Customer</li>
                    </ol>
                  </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- FORMULIR TRANSAKSI -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card height-equal">
                        <div class="card-header">
                            <h4>FORMULIR TRANSAKSI</h4>
                        </div>
                        <div class="card-body custom-input col-xl-12">
                          <!-- Pembayaran Tagihan -->
                          <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                            <!-- Pembayaran Tagihan Tab  -->
                            <li class="nav-item">
                                <a class="nav-link active txt-primary" id="pembayaran-tagihan-tab" data-bs-toggle="tab" href="#pembayaran-tagihan" role="tab" aria-controls="pembayaran-tagihan" aria-selected="true"><i class="icofont icofont-money"></i>Pembayaran Tagihan</a>
                            </li>
                          </ul>
                          <!-- Isi Form Konten -->
                          <div class="tab-content" id="icon-tabContent">
                            <div class="tab-pane fade show active" id="pembayaran-tagihan" role="tabpanel" aria-labelledby="pembayaran-tagihan-tab">
                                <div class="pt-3 mb-0">
                                    <form class="row g-3">
                                        <!-- Tanggal -->
                                        <div class="col-md-4"> 
                                            <label class="form-label" for="">TANGGAL & WAKTU</label>
                                            <input class="form-control digits" id="" name="" type="datetime-local" value="2023-05-03T18:45:00">
                                        </div>
                                        <!-- INVOICE -->
                                        <div class="col-md-4"> 
                                            <label class="form-label" for="">NO INVOICE</label>
                                            <input class="form-control" id="" type="text" placeholder="TERISI OTOMATIS" readonly>
                                        </div>
                                        <!-- ID TRANSAKSI -->
                                        <div class="col-md-4"> 
                                            <label class="form-label" for="">ID TRANSAKSI</label>
                                            <input class="form-control" id="" type="text" placeholder="TERISI OTOMATIS" aria-label="" readonly>
                                        </div>
                                        <!-- PILIH CUSTOMER -->
                                        <div class="col-md-3 position-relative">
                                            <label class="form-label" for="">NAMA CUSTOMER</label>
                                            <select class="form-select" id="" required="">
                                                <option selected="" disabled="" value="">Pilih Customer</option>
                                                <option>INVS-0001 | NIZAM ALFIAN | RESELLER</option>
                                                <option>INVS-0002 | ILHAM IRWANSYAH | AGEN</option>
                                            </select>
                                        </div>
                                        <!-- BANK PENGIRIM -->
                                        <div class="col-md-3"> 
                                            <label class="form-label" for="">BANK PENGIRIM</label>
                                              <select class="form-select" id="">
                                                  <option selected="" disabled="" value="">Pilih Bank</option>
                                                  <option>BCA</option>
                                                  <option>MANDIRI</option>
                                                  <option>BNI</option>
                                                  <option>BRI</option>
                                              </select>
                                        </div>
                                        <!-- NO REKENING -->
                                        <div class="col-md-3"> 
                                          <label class="form-label" for="">NOMOR REKENING</label>
                                          <input class="form-control" id="" type="text" placeholder="Input Nomor Rekening" aria-label="">
                                        </div>
                                        <!-- BANK PENERIMA -->
                                        <div class="col-md-3"> 
                                          <label class="form-label" for="">BANK PENERIMA</label>
                                            <select class="form-select" id="">
                                                <option selected="" disabled="" value="">Pilih Bank</option>
                                                <option>BCA | 3456787 | ELVA FAUQO</option>
                                                <option>MANDIRI | 4567865437 | ELVA FAUQO</option>
                                                <option>BNI | 9876545678 | ELVA FAUQO</option>
                                                <option>BRI | 98765456789 | ELVA FAUQO</option>
                                            </select>
                                        </div>
                                        <!-- Nominal DP -->
                                        <div class="col-md-4 position-relative">
                                            <label class="form-label" for="NominalDPSupplier">NOMINAL DP</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">Rp</span>
                                                <input class="form-control" id="NominalDPSupplier" type="text" onkeyup="formatRupiah(this); hitungNominalHutang()" required="">
                                            </div>
                                        </div>
                                        <!-- Nominal Tagihan -->
                                        <div class="col-md-4 position-relative">
                                            <label class="form-label" for="NominalTagihanSupplier">NOMINAL TAGIHAN</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">Rp</span>
                                                <input class="form-control" id="NominalTagihanSupplier" type="text" onkeyup="formatRupiah(this); hitungNominalHutang()" required="">
                                            </div>
                                        </div>
                                        <!-- Total Hutang -->
                                        <div class="col-md-4 position-relative">
                                            <label class="form-label" for="NominalHutangSupplier">NOMINAL HUTANG AKTIF</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text">Rp</span>
                                                <p class="form-control" type="text" id="NominalHutangSupplier" readonly></p>
                                            </div>
                                        </div>
                                        <!-- Submit Transaksi -->
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-primary" type="submit">Submit Transaksi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Table Pembayaran -->
            <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                          <h4>Data Pembayaran</h4>
                              <div class="d-flex align-items-center">
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="dt-ext table-responsive">
                              <table class="display" id="export-button">
                              <thead>
                                <tr>
                                  <th><span class="f-light f-w-600">TANGGAL</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID INVOICE</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID TRANSAKSI</span></th>
                                  <th style="min-width: 100px;"><span class="f-light f-w-600">ID CUSTOMER</span></th>
                                  <th><span class="f-light f-w-600">PEMBAYARAN</span></th>
                                  <th style="min-width: 120px;"><span class="f-light f-w-600">TAGIHAN AKTIF</span></th>
                                  <th><span class="f-light f-w-600"></span></th>
                                </tr>
                              </thead>
                              <tbody>
                                <!-- Data 1 -->
                                <tr>
                                    <td id="D">
                                        <p class="f-light">2024/02/05</p>
                                    </td>
                                    <td id="">
                                      <p class="f-light">INVS-00001</p>
                                    </td>
                                    <td id="">
                                      <p class="f-light">5678312345670</p>
                                    </td>
                                    <td id="">
                                      <p class="f-light">ELVC-0001</p>
                                    </td>
                                    <td id="">
                                        <strong class="f-light text-success">Rp15.600.000</strong>
                                    </td>
                                    <td id="">
                                        <strong class="f-light text-danger">Rp24.900.000</strong>
                                    </td>
                                    <!-- Aksi Button -->
                                    <td>
                                      <div class="btn-group" role="group">
                                        <button class="btn btn-info-gradien dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AKSI</button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                            <a class="dropdown-item" href="javascript(0);" data-bs-toggle="modal" data-bs-target="#DetailTransaksi">Detail Transaksi</a>
                                            <a class="dropdown-item" href="invoicetagihan.html" target="_blank">Detail Invoice</a>
                                        </div>
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
                                    <strong class="text-success">Rp1.835.000</strong>
                                </li>
                                <!-- Nominal Tagihan -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  <span>TAGIHAN AKTIF</span>
                                  <strong class="text-danger">Rp1.000.000</strong>
                                </li>
                                <!-- Total Tagihan -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                  <span>TOTAL TAGIHAN</span>
                                  <strong>Rp2.835.000</strong>
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