        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Deposit Customer</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-user"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Customer</li>
                      <li class="breadcrumb-item active"> Deposit Customer</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <!-- Form Deposit -->
                <div class="row">
                    <!-- Form Deposit -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Formulir Deposit Customer</h4>
                            </div>
                            <div class="card-body custom-input">
                                <form class="row g-3">
                                    <!-- Tanggal Dan Waktu -->
                                    <div class="col-3 position-relative"> 
                                        <label class="form-label" for="">TANGGAL & WAKTU</label>
                                        <input class="form-control digits" id="" name="" type="datetime-local" readonly="">
                                    </div>
                                    <!-- ID INVOICE -->
                                    <div class="col-3 position-relative"> 
                                        <label class="form-label" for="">ID INVOICE</label>
                                        <input class="form-control" id="" type="text" placeholder="ID Terisi Otomatis" aria-label="" readonly>
                                    </div>
                                    <!-- Nama Customer -->
                                    <div class="col-6 position-relative">
                                        <label class="form-label" for="">DATA CUSTOMER</label>
                                        <select class="form-select" id="" required="">
                                            <option selected="" disabled="" value="">Pilih Data Customer</option>
                                            <option value="">ELVC-0001 | Ilham Ramadhan Taufiq | Agen | Rp250.000</option>
                                            <option value="">ELVC-0002 | Nizam Alfian | Reseller | Rp100.000</option>
                                            <option value="">ELVC-0003 | Figo Vio Hidayat | Member</option>
                                        </select>
                                    </div>
                                    <!-- BANK AKUN -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="">BANK PENGIRIM</label>
                                        <select class="form-select" id="" required="">
                                            <option selected="" disabled="" value="">Pilih Bank Pengirim</option>
                                            <option value="">BCA</option>
                                            <option value="">BNI</option>
                                            <option value="">BTN</option>
                                            <option value="">MANDIRI</option>
                                        </select>
                                    </div>
                                    <!-- BANK PENERIMA -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="">BANK PENERIMA</label>
                                        <select class="form-select" id="" required="">
                                            <option selected="" disabled="" value="">Pilih Bank Penerima</option>
                                            <option value="">BCA</option>
                                            <option value="">BNI</option>
                                            <option value="">BTN</option>
                                            <option value="">MANDIRI</option>
                                        </select>
                                    </div>
                                    <!-- Saldo Aktif -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="">SALDO AKTIF</label>
                                        <div class="input-group"><span class="input-group-text" id="">Rp</span>
                                            <input class="form-control" id="" type="text" value="4.500.000" readonly>
                                        </div>
                                    </div>
                                    <!-- Nominal Deposit -->
                                    <div class="col-3 position-relative">
                                        <label class="form-label" for="">NOMINAL DEPOSIT</label>
                                        <div class="input-group"><span class="input-group-text" id="">Rp</span>
                                            <input class="form-control" id="" type="text" onkeyup="formatRupiah(this)">
                                        </div>
                                    </div>
                                    <!-- Submit Customer -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">DEPOSIT SEKARANG</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Deposit -->
                <!-- Data Transaksi Deposit -->
                <div class="row">
                    <div class="col-12">
                        <div class="card height-equal">
                            <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                                <h4>Data Transaksi Deposit</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="export-button">
                                        <thead>
                                        <tr>
                                            <th><span class="f-light f-w-600">TANGGAL</span></th>
                                            <th style="min-width: 100px;"><span class="f-light f-w-600">ID CUSTOMER</span></th>
                                            <th style="min-width: 100px;"><span class="f-light f-w-600">ID TRANSAKSI</span></th>
                                            <th><span class="f-light f-w-600">INVOICE</span></th>
                                            <th><span class="f-light f-w-600">WAKTU</span></th>
                                            <th style="min-width: 120px;"><span class="f-light f-w-600">BANK PENGIRIM</span></th>
                                            <th style="min-width: 120px;"><span class="f-light f-w-600">BANK PENERIMA</span></th>
                                            <th style="min-width: 100px;"><span class="f-light f-w-600">NOMINAL</span></th>
                                            <th><span></span></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Data 1 -->
                                            <tr class="odd" role="row">
                                                <td>
                                                    <p class="f-light">01/15/2024</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">ELVC-0001</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">TR-0001</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">INV-00012</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">15:13:00</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">BCA</p>
                                                </td>
                                                <td>
                                                    <p class="f-light">MANDIRI</p>
                                                </td>
                                                <td>
                                                    <p class="f-light f-w-600 text-success">Rp3.870.000</p>
                                                </td>
                                                <td> 
                                                    <ul class="action">
                                                        <li class="delete">
                                                            <a data-bs-toggle="modal" data-bs-target="#">
                                                                <i class="icon-trash"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
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
            <!-- End Listing Supplier -->
          </div>