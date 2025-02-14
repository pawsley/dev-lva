        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Buat Tagihan</h4>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                                    <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                                <li class="breadcrumb-item"> Tagihan</li>
                                <li class="breadcrumb-item active"> Buat Tagihan</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <!-- Form Tagihan -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>Form Tagihan</h4>
                        </div>
                        <div class="card-body custom-input">
                            <form class="row g-3 mb-4" id="form-invbaru">
                                <!-- ORDER ID -->
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="invid">INVOICE ID</label>
                                    <input class="form-control" id="invid" name="invid" type="text" placeholder="Terisi Otomatis" required readonly>
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="dateinv">TANGGAL INVOICE</label>
                                    <input class="form-control digits" id="dateinv" name="dateinv" type="date">
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="duedateinv">TANGGAL TENGGAT WAKTU INVOICE</label>
                                    <input class="form-control digits" id="duedateinv" name="duedateinv" type="date">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label class="form-label" for="selord">PILIH ORDER ID</label>
                                    <select class="form-select" id="selord" name="selord" required>
                                    </select>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label class="form-label">STATUS ORDER</label>
                                    <button type="button" class="btn btn-light form-control disabled" id="info-stat">Belum Ada Status</button> 
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="cst">CUSTOMER</label>
                                    <input class="form-control" id="cst" name="cst" type="text" placeholder="Terisi Otomatis" readonly>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="wa">WHATSAPP</label>
                                    <input class="form-control" id="wa" name="wa" type="text" placeholder="Terisi Otomatis" readonly>
                                </div>
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="email">EMAIL</label>
                                    <input class="form-control" id="email" name="email" type="text" placeholder="Terisi Otomatis" readonly>
                                </div>                               
                                <div class="col-md-3 position-relative">
                                    <label class="form-label" for="tcst">TIPE AGEN</label>
                                    <input class="form-control" id="tcst" name="tcst" type="text" placeholder="Terisi Otomatis" readonly>
                                    </select>
                                </div>
                                <!-- Table Tagihan -->
                                <div class="order-history table-responsive wishlist">
                                    <table class="table table-bordered" id="table-invoice" width="100%">
                                    <thead>
                                        <tr>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 30%">PRODUK</th>
                                        <th style="width: 5%">SIZE</th>
                                        <th style="width: 20%">DETAIL MATERIAL</th>
                                        <th style="width: 10%">QUANTITY ORDER</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-invoice">
                                    </tbody>
                                    </table>
                                </div>
                                <!-- Catatan -->
                                <div class="col-md-12 position-relative">
                                    <div class="form-floating">
                                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" placeholder="Buat Catatan Disini"></textarea>
                                    <label>Keterangan (Opsional)</label>
                                    </div>
                                </div>                                    
                                <!-- Submit Tagihan -->
                                <div class="col-md-12 position-relative">
                                    <button class="btn btn-primary-gradien cart-btn-transform" id="btn_submit" type="submit">
                                    <span id="spinner_submit" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                    <span id="tx_submit">BUAT INVOICE</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Tagihan -->
            </div>
        </div>