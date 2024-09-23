        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Master Tipe Agen</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Data Master</li>
                      <li class="breadcrumb-item active"> Master Tipe Agen</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
            <!-- Data Customer -->
                <div class="row">
                    <div class="col-12">
                        <div class="card height-equal">
                            <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                                <h4>List Tipe Agen</h4>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)" class="btn btn-primary shownewmod" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="TCS" data-title="Tambah Tipe Agen" data-label="Nama Tipe Agen" data-labeldis="Diskon Agen">
                                        <i class="fa fa-plus"></i> Buat Tipe Agen
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="table-tipe" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%;"><span class="f-light f-w-600">NAMA TIPE AGEN</span></th>
                                                <th style="width: 40%;"><span class="f-light f-w-600">DISKON AGEN</span></th>
                                                <th class="text-center"><span class="f-light f-w-600">AKSI</span></th>
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
            <!-- End Data Customer -->
            <!-- Modal Edit Tipe -->
            <div class="modal fade" id="EditTipe" tabindex="-1" role="dialog" aria-labelledby="EditTipe" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start">
                            <div class="modal-toggle-wrapper">
                                <div class="modal-header mb-4">
                                    <h3>Edit Agen</h3>
                                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" id="form-edit">
                                    <!-- Nama -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="eitem">Nama Tipe Agen</label>
                                        <input class="form-control" id="eitem" name="eitem" type="text" placeholder="Masukkan Item Baru">
                                    </div>
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="evaldis">Diskon Agen</label>
                                        <input class="form-control" id="evaldis" name="evaldis" type="number" placeholder="Masukkan Diskon">
                                    </div>
                                    <!-- Button Simpan -->
                                    <div class="col-12">
                                        <button class="btn btn-primary" type="submit" id="edmod" data-bs-dismiss="modal">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Tipe -->
            <div class="modal fade" id="TambahSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="TambahSubKategoriItem" aria-hidden="true">
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
                                <div class="col-md-6 position-relative">
                                    <label class="form-label" for="item" id="labmod"></label>
                                    <input class="form-control" id="item" name="item" type="text" placeholder="Masukkan Item Baru">
                                </div>
                                <div class="col-md-6 position-relative">
                                    <label class="form-label" for="valdis" id="labdis"></label>
                                    <input class="form-control" id="valdis" name="valdis" type="number" placeholder="Masukkan Diskon">
                                </div>
                                <!-- Button Simpan -->
                                <div class="col-12">
                                    <button class="btn btn-primary" type="button" id="addmod" data-bs-dismiss="modal">Tambah Baru</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>