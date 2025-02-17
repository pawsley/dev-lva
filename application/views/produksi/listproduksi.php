    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>List Produksi</h4>
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
                            <li class="breadcrumb-item"> Home</li>
                            <li class="breadcrumb-item"> Produksi</li>
                            <li class="breadcrumb-item active"> List Produksi</li>
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
                                <!-- <div class="col-md-12 mb-4">
                                    <h4>List Produksi</h4>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table-produksi" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 40%;"><span class="f-light f-w-600">DETAIL PO</span></th>
                                        <th style="width: 10%;"><span class="f-light f-w-600">PRODUK</span></th>
                                        <th style="width: 40%;"><span class="f-light f-w-600">TANGGAL PRODUKSI</span></th>
                                        <th style="width: 10%;"><span class="f-light f-w-600">AKSI</span></th>
                                    </tr>
                                </thead>
                                <tbody id="list-body">
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-md" id="cutModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                    <div class="modal-content social-profile text-start">
						<div class="modal-header">
							<h4>KELENGKAPAN POTONGAN</h4>
							<button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
                        <div class="modal-body">
                            <div class="modal-toggle-wrapper">
								<div class="form-check checkbox checkbox-primary ps-0 main-icon-checkbox">
									<ul class="checkbox-wrapper">
										<!-- <li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon" type="checkbox">
											<label class="form-check-label" for="checkbox-icon"><span>KRAH</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon1" type="checkbox">
											<label class="form-check-label" for="checkbox-icon1"></i><span>BADAN DEPAN</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon2" type="checkbox">
											<label class="form-check-label" for="checkbox-icon2"></i><span>BADAN BELAKANG</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon3" type="checkbox">
											<label class="form-check-label" for="checkbox-icon3"></i><span>LENGAN</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon4" type="checkbox">
											<label class="form-check-label" for="checkbox-icon4"></i><span>ROK BAGIAN DEPAN</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon5" type="checkbox">
											<label class="form-check-label" for="checkbox-icon5"></i><span>ROK BAGIAN BELAKANG</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon6" type="checkbox">
											<label class="form-check-label" for="checkbox-icon6"></i><span>FURING</span></label>
										</li>
										<li> 
											<input class="form-check-input checkbox-shadow" id="checkbox-icon7" type="checkbox">
											<label class="form-check-label" for="checkbox-icon7"></i><span>ALAT - ALAT</span></label>
										</li> -->
									</ul>
								</div>
                            </div>
                        </div>
						<div class="modal-footer">
							<button class="btn btn-secondary addrow" type="button">Tambah Detail Potongan</button>
							<button class="btn btn-primary" id="addptg" type="button">Simpan</button>
						</div>
                    </div>
                </div>
            </div>
			<div class="modal fade bd-example-modal-sm" id="addcutModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content social-profile text-start">
						<div class="modal-header">
							<h6>DETAIL POTONGAN</h6>
							<button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
                        <div class="modal-body">
                            <div class="modal-toggle-wrapper">
								<form class="row g-3">
									<div class="col-md-12 position-relative">
										<label class="form-label" for="item" id="labmod">Item</label>
										<input class="form-control" id="item" name="item" style="text-transform: uppercase;" type="text" placeholder="Masukkan Item Baru">
									</div>
								</form>
                            </div>
                        </div>
						<div class="modal-footer">
							<button class="btn btn-primary" id="addmod" type="button">Simpan</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
