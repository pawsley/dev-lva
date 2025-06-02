        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Kasir Penjualan</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
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
                              <form class="row g-3 mb-4" id="form-order">
                                    <!-- ORDER ID -->
                                    <div class="col-md-6 position-relative">
                                      <label class="form-label" for="ordid">ORDER ID</label>
                                      <input class="form-control" id="ordid" name="ordid" type="text" placeholder="Terisi Otomatis" required readonly>
                                    </div>
                                    <div class="col-md-6 position-relative">
                                      <label class="form-label" for="duedate">TANGGAL ORDER</label>
                                      <input class="form-control digits" id="duedate" name="duedate" type="date">
                                    </div>                                    
                                    <div class="col-md-4 position-relative">
                                      <label class="form-label" for="selcst">CUSTOMER</label>
                                      <div class="input-group">
                                        <select class="form-select" id="selcst" name="selcst" required>
                                        </select>
                                        <span class="input-group-append ps-1">
                                            <a class="btn badge-light-primary shownewmod" href="<?=base_url()?>customer/buat-baru" ><i class="fa fa-plus"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-md-4 position-relative">
                                      <label class="form-label" for="wa">WHATSAPP</label>
                                      <input class="form-control" id="wa" name="wa" type="text" placeholder="Terisi Otomatis" readonly>
                                    </div>
                                    <div class="col-md-4 position-relative">
                                      <label class="form-label" for="email">EMAIL</label>
                                      <input class="form-control" id="email" name="email" type="text" placeholder="Terisi Otomatis" readonly>
                                    </div>                               
                                    <!-- Select Produk -->
                                    <div class="col-md-8 position-relative">
                                        <label class="form-label" for="selkat">PILIH KATALOG PRODUK</label>
                                        <select class="form-select" id="selkat" name="selkat" required>
                                        </select>
                                    </div>
                                    <div class="col-md-3 position-relative">
                                      <label class="form-label" for="seltipe">TIPE AGEN</label>
                                      <select class="form-select" id="seltipe" name="seltipe" required>
                                      </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-md-1 position-relative">
                                      <label class="form-label">KATALOG</label>
                                      <div>
                                          <a class="btn badge-light-primary" href="<?=base_url()?>katalog/list" ><i class="fa fa-shopping-basket"></i></a>
                                      </div>
                                    </div>
                                    <!-- Table Keranjang -->
                                    <div class="order-history table-responsive wishlist">
                                      <table class="table table-bordered" id="table-order" width="100%">
                                        <thead>
                                          <tr>
                                            <th style="width: 20%">PRODUK</th>
                                            <th style="width: 5%">QTY</th>
                                            <th style="width: 5%">DISC</th>
                                            <th style="width: 10%">NOMINAL</th>
                                            <th style="width: 15%">KETERANGAN</th>
                                            <th style="width: 10%">TOTAL</th>
                                            <th style="width: 2%">AKSI</th>
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
                                            <li>SUBTOTAL <span id="subtotal" class="count"></span></li>
                                            <li>DISKON <span id="diskon" class="count text-danger"></span></li>
                                          </ul>
                                          <hr>
                                          <ul class="sub-total mt-4">
                                            <li>GRAND TOTAL <span id="grand" class="count text-success f-w-700"></span></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Catatan -->
                                    <div class="col-md-12 position-relative">
                                      <div class="form-floating">
                                        <textarea class="form-control" id="txtcatatan" name="txtcatatan" placeholder="Buat Catatan Disini"></textarea>
                                        <label for="txtcatatan">Catatan (Opsional)</label>
                                      </div>
                                    </div>                                    
                                    <!-- Submit Pesanan -->
                                    <div class="col-md-12 position-relative">
                                      <button class="btn btn-success-gradien cart-btn-transform" id="btn_submit" type="submit">
                                        <span id="spinner_submit" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                        <span id="tx_submit">PROSES PESANAN</span>
                                      </button>
                                    </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Produk -->
            </div>
          </div>