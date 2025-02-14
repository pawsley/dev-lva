<div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Finishing</h4>
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
                            <li class="breadcrumb-item active"> Finishing</li>
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
                                        <th style="width: 10%;"><span class="f-light f-w-600">GAMBAR</span></th>
                                        <th style="width: 40%;"><span class="f-light f-w-600">KATALOG</span></th>
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
            <!-- Modal Tambah Sub Kategori Baru -->
            <div class="modal fade bd-example-modal-lg" id="TambahSubKategoriItem" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start">
                            <div class="modal-toggle-wrapper">
                                <div class="modal-header mb-4">
                                    <h3>Tambah Detail Size Chart</h3>
                                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" id="formsize" method="post">
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="selkat">Tipe Katalog</label>
                                        <select class="form-select" id="selkat" name="selkat" required="">
                                        </select>
                                        <button class="btn badge-light-primary addrow"><i class="fa fa-plus"></i> Tambah Detail Size</button>
                                    </div>
                                    <div class="col-md-8 position-relative">
                                        <label class="form-label">Size</label>
                                        <div class="ipt">
                                            <div class="input-group dlog">
                                                <input class="form-control" name="size[]" type="text" placeholder="Size" required>
                                                <input class="form-control" name="nmdtl[]" style="width: 30%;" type="text" placeholder="Masukkan Detail Size" required>
                                                <input class="form-control" name="valdtl[]" type="number" placeholder="0" required>
                                                <button class="btn badge-light-primary copyrow"><i class="icon-files"></i></button>
                                                <a class="btn badge-light-primary deleterow" href="javascript:void(0)"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button Simpan -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit">Tambahkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-lg" id="EditDetailSize" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start">
                            <div class="modal-toggle-wrapper">
                                <div class="modal-header mb-4">
                                    <h3>Edit Size Chart</h3>
                                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" id="formsize" method="post">
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="uselkat">Tipe Katalog</label>
                                        <select class="form-select" id="uselkat" name="uselkat" required="">
                                        </select>
                                    </div>
                                    <div class="col-md-8 position-relative">
                                        <label class="form-label">Size</label>
                                        <div class="ipt">
                                            <div class="input-group dlog">
                                                <input class="form-control" name="usize" id="usize" type="text" placeholder="Size" required>
                                                <input class="form-control" name="unmdtl" id="unmdtl" style="width: 30%;" type="text" placeholder="Masukkan Detail Size" required>
                                                <input class="form-control" name="uvaldtl" id="uvaldtl" type="number" placeholder="0" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button Simpan -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" id="editdtl" type="submit">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Sub Kategori Baru -->
            <div class="modal fade" id="TambahTipeItem" tabindex="-1" role="dialog" aria-labelledby="TambahTipeItem" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <div class="modal-header mb-4">
                                <h3 id="titmod"></h3>
                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="row g-3">
                            <!-- Nama -->
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="item" id="labmod"></label>
                                <input class="form-control" id="item" name="item" type="text" placeholder="Masukkan Item Baru">
                            </div>
                            <!-- Button Simpan -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="button" id="addmod">Tambah Baru</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal Daftar Kategori -->
            <div class="modal fade" id="DaftarSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="#DaftarSubKategoriItem" aria-hidden="true">
                <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="labdaf"></h1>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body custom-input">
                            <form>
                                <div class="row g-3" id="daf-container">
                                
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" id="editmod" type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>