        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Produksi Baru</h4>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                                    <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                                <li class="breadcrumb-item"> Produksi</li>
                                <li class="breadcrumb-item active"> Produksi Baru</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <!-- Form Produksi -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h4>Form Produksi</h4>
                        </div>
                        <div class="card-body custom-input">
                            <form class="row g-3 mb-4" id="form-prodbaru">
                                <!-- ORDER ID -->
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="ordid">PRODUKSI ID</label>
                                    <input class="form-control" id="ordid" name="ordid" type="text" placeholder="Terisi Otomatis" required readonly>
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="dateprod">TANGGAL PRODUKSI</label>
                                    <input class="form-control digits" id="dateprod" name="dateprod" type="date">
                                </div>
                                <div class="col-md-4 position-relative">
                                    <label class="form-label" for="duedateprod">TANGGAL PRODUKSI SELESAI</label>
                                    <input class="form-control digits" id="duedateprod" name="duedateprod" type="date">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label class="form-label" for="selord">PILIH ORDER ID</label>
                                    <select class="form-select" id="selord" name="selord" required>
                                    </select>
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label class="form-label" for="statmtr">STATUS ORDER</label>
                                    <button type="button" class="btn btn-light form-control disabled">Belum Ada Status</button> 
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
                                <!-- Table Produksi -->
                                <div class="order-history table-responsive wishlist">
                                    <table class="table table-bordered" id="table-prodbaru" width="100%">
                                    <thead>
                                        <tr>
                                        <th style="width: 5%">#</th>
                                        <th style="width: 30%">PRODUK</th>
                                        <th style="width: 5%">SIZE</th>
                                        <th style="width: 20%">DETAIL MATERIAL</th>
                                        <th style="width: 10%">QUANTITY</th>
                                        <th style="width: 20%">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list-prodbaru">
                                    </tbody>
                                    </table>
                                </div>
                                <!-- Catatan -->
                                <div class="col-md-12 position-relative">
                                    <div class="form-floating">
                                    <textarea class="form-control" id="txtcatatan" name="txtcatatan" placeholder="Buat Catatan Disini"></textarea>
                                    <label for="floatingTextarea">Keterangan (Opsional)</label>
                                    </div>
                                </div>                                    
                                <!-- Submit PRODUKSI -->
                                <div class="col-md-12 position-relative">
                                    <button class="btn btn-warning-gradien cart-btn-transform" id="btn_submit" type="submit">
                                    <span id="spinner_submit" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                    <span id="tx_submit">PROSES PRODUKSI</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Produksi -->
            </div>
        </div>