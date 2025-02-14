<div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>List Tagihan</h4>
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
                            <li class="breadcrumb-item"> Tagihan</li>
                            <li class="breadcrumb-item active"> List Tagihan</li>
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
                                        <th><span class="f-light f-w-600">INVOICE</span></th>
                                        <th><span class="f-light f-w-600">CUSTOMER</span></th>
                                        <th><span class="f-light f-w-600">TANGGAL INVOICE</span></th>
                                        <th><span class="f-light f-w-600">TOTAL INVOICE</span></th>
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
        </div>
        <!-- Container-fluid Ends-->
    </div>