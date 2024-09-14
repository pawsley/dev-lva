        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Gudang LVA</h4>
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
                      <li class="breadcrumb-item">Gudang</li>
                      <li class="breadcrumb-item active">LVA</li>
                    </ol>
                  </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- Data Table Pembayaran -->
            <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                          <div class="row">
                            <div class="col-md-12 mb-4">
                                <h4>List Stok Material</h4>
                            </div>
                            <div class="col-md-12">
                                <a href="<?=base_url()?>pembelian/pembelian-material" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Pembelian Material
                                </a>
                            </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="display" id="table-gudang">
                                <thead>
                                    <tr>
                                        <th style="min-width: 100px;"><span class="f-light f-w-600">KODE</span></th>
                                        <th style="min-width: 140px;"><span class="f-light f-w-600">NAMA</span></th>
                                        <th style="min-width: 100px;"><span class="f-light f-w-600">STOK</span></th>
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
            <!-- Modal Detail Transaksi -->
            <div class="modal fade bd-example-modal-xl" id="DetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="DetailTransaksi" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                  <div class="modal-header social-profile text-start">
                    <h3>Detail Transaksi Pembelian</h3>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body social-profile text-start">
                    <ul class="list-group">
                      <!-- INVOICE -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>INVOICE</span>
                        <strong id="dinvpmb">-</strong>
                      </li>
                      <!-- TANGGAL PEMBELIAN -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>TANGGAL PEMBELIAN</span>
                        <strong id="dtglpmb">-</strong>
                      </li>
                      <!-- TIPE PEMBAYARAN -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>TIPE PEMBAYARAN</span>
                        <strong id="dtpmb">-</strong>
                      </li>
                      <!-- AKUN BANK -->
                      <li class="list-group-item d-flex justify-content-between align-items-center" id="libankac">
                        <span>AKUN BANK LVA</span>
                        <strong id="dbankacc">-</strong>
                      </li>
                      <!-- SUPPLIER -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>SUPPLIER</span>
                        <strong id="dsupmb">-</strong>
                      </li>
                      <!-- STATUS -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>STATUS</span>
                        <strong id="dstat">-</strong>
                      </li>
                      <!-- GRAND TOTAL -->
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>GRAND TOTAL</span>
                        <strong id="dgrand">0</strong>
                      </li>
                    </ul>
                    <div class="card"> 
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="display" id="table-dmaterial">
                            <thead>
                              <tr>
                                <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">MATERIAL</span></th>
                                <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">DETAIL</span></th>
                                <th scope="col" style="min-width: 40px;"><span class="f-light f-w-600">QTY</span></th>
                                <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">HARGA SATUAN</span></th>
                                <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">TOTAL</span></th>
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
            </div>
            <!-- Modal Pembelian Baru -->
            <div class="modal fade bd-example-modal-xl" id="PmbModal" tabindex="-1" role="dialog" aria-labelledby="PmbModal" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen" role="document">
                <div class="modal-content dark-sign-up">
                  <div class="modal-header social-profile text-start">
                    <h3>Form Pembelian Material</h3>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body social-profile text-start">
                    <form class="row g-3" id="form-pmb" method="post">
                        <!-- Tanggal -->
                        <div class="col-md-4 position-relative"> 
                            <label class="form-label" for="pmbtgl">TANGGAL & WAKTU</label>
                            <input class="form-control digits" id="pmbtgl" name="pmbtgl" type="datetime-local">
                        </div>
                        <!-- INVOICE -->
                        <div class="col-md-4 position-relative"> 
                            <label class="form-label" for="ivpb">NO INVOICE</label>
                            <input class="form-control" id="ivpb" name="ivpb" type="text" placeholder="TERISI OTOMATIS" readonly>
                        </div>
                        <!-- PILIH TIPE PEMBAYARAN -->
                        <div class="col-md-4 position-relative">
                            <label class="form-label" for="seltipe">TIPE PEMBAYARAN</label>
                            <select class="form-select" id="seltipe" name="seltipe" required>
                              <option></option>
                              <option value="tunai">TUNAI</option>
                              <option value="transfer">TRANSFER</option>
                            </select>
                        </div>
                        <!-- PILIH AKUN BANK -->                                    
                        <div class="col-md-12 position-relative d-none" id="bank-account-container">
                            <label class="form-label" for="bank_acc">AKUN BANK LVA</label>
                            <select class="form-select" id="bank_acc" name="bank_acc" required>
                            </select>
                        </div>                                                                        
                        <!-- PILIH SUPPLIER SELECT2 -->
                        <div class="col-md-12 position-relative">
                            <label class="form-label" for="selsupp">SUPPLIER</label>
                            <select class="form-select" id="selsupp" name="selsupp" required>
                            </select>
                        </div>
                        <div class="col-md-12 position-relative">
                            <h6>Informasi detail pembelian material</h6>
                        </div>
                        <div class="col-md-12 position-relative">
                            <div class="table-responsive">
                                <table class="display" id="table-material">
                                <thead>
                                    <tr>
                                        <th scope="col" style="min-width: 10px;"><input type="checkbox" id="select-all"></th>
                                        <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">MATERIAL</span></th>
                                        <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">DETAIL</span></th>
                                        <th scope="col" style="min-width: 40px; text-align:center;"><span class="f-light f-w-600">QTY</span></th>
                                        <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">HARGA SATUAN</span></th>
                                        <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">TOTAL</span></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex align-items-center">
                            <h2>Grand Total : </h2><h2 id="tx_gt" name="tx_gt"></h2>
                        </div>                           
                        <!-- Submit Transaksi -->
                        <div class="col-md-12 mt-3">
                            <button type="submit" id="subpmb" class="btn btn-primary">
                                <span id="spinner_subpmb" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                <span id="tx_subpmb">Submit Transaksi</span>
                            </button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>            
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->