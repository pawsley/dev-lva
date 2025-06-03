        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Status Order</h4>
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
                                <li class="breadcrumb-item active">Status Order</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row"> 
                    <div class="col-12"> 
                        <div class="card height-equal">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="table-order" width="2000px">
                                        <thead> 
                                            <tr>
                                                <th style="min-width: 40px;"><span class="f-light f-w-600">AKSI</span></th>
                                                <th style="min-width: 200px;"><span class="f-light f-w-600">ITEM</span></th>
                                                <th style="min-width: 100px;"><span class="f-light f-w-600">ORDER ID</span></th>
                                                <th style="min-width: 100px;"><span class="f-light f-w-600">CUSTOMER</span></th>
                                                <th style="min-width: 200px;"><span class="f-light f-w-600">BAHAN</span></th>
                                                <th style="min-width: 60px;"><span class="f-light f-w-600">TANGGAL ORDER</span></th>
                                                <th style="min-width: 20px;"><span class="f-light f-w-600">STATUS</span></th>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <th>
                                                    <select class="form-select form-select-sm" id="item-filter">
                                                        <option value="">Semua</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    <select class="form-select form-select-sm" id="item-filter">
                                                        <option value="">Semua</option>
                                                    </select>
                                                </th>
                                                <th>
                                                    <select class="form-select form-select-sm" id="item-filter">
                                                        <option value="">Semua</option>
                                                    </select>
                                                </th>
                                                <th></th>
                                                <th><input type="date" placeholder="dd/mm/yyyy" class="form-control form-control-sm" /></th>
                                                <th>
                                                    <select class="form-select form-select-sm" id="status-filter">
                                                        <option value="">Semua</option>
                                                        <option value="1">Proses</option>
                                                        <option value="2">Selesai</option>
                                                        <option value="3">Batal</option>
                                                    </select>
                                                </th>
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
            <!-- Container-fluid Ends-->
        </div>