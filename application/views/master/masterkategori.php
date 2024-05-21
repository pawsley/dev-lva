        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Data Master Kategori</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Data Master</li>
                    <li class="breadcrumb-item active"> Master Kategori</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
              <!-- Form Tambah Supplier -->
              <div class="row">
                  <!-- Form Kategori -->
                  <div class="col-xl-12">
                      <div class="card height-equal">
                          <div class="card-header">
                              <h4>Formulir Input Kategori</h4>
                          </div>
                          <div class="card-body custom-input">
                              <form class="row g-3" novalidate="">
                                  <!-- Kategori 1 -->
                                  <div class="col-9"> 
                                      <label class="form-label" for="FormKategori1">Kategori 1</label>
                                      <input class="form-control" id="merek" name="merek" type="text" placeholder="Merek">
                                  </div>
                                  <!-- Butom Edit -->
                                  <div class="col-3">
                                      <label class="form-label" for="shortcuttambahdata">Tombol Aksi</label>
                                      <div class="btn-group">
                                          <button class="btn btn-primary add_merk" type="button" id="add_merk"><i class="fa fa-plus"></i></button>
                                          <button class="btn btn-success change-modal" type="button" data-type="MRK" data-bs-toggle="modal" data-bs-target="#SubKategoriItem"><i class="fa fa-list-alt"></i></button>
                                      </div>
                                  </div>
                                  <!-- Kategori 2 -->
                                  <div class="col-9"> 
                                      <label class="form-label" for="FormKategori2">Kategori 2</label>
                                      <input class="form-control" id="jenis" name="jenis" type="text" placeholder="Jenis">
                                  </div>
                                  <!-- Butom Edit -->
                                  <div class="col-3">
                                      <label class="form-label" for="shortcuttambahdata">Tombol Aksi</label>
                                      <div class="btn-group">
                                            <button class="btn btn-primary" type="button" id="add_jenis"><i class="fa fa-plus"></i></button>
                                            <button class="btn btn-success change-modal" type="button" data-type="JNS" data-bs-toggle="modal" data-bs-target="#SubKategoriItem"><i class="fa fa-list-alt"></i></button>
                                      </div>
                                  </div>
                                  <!-- Kategori 3 -->
                                  <!-- <div class="col-9"> 
                                      <label class="form-label" for="FormKategori3">Kategori 3</label>
                                      <input class="form-control" id="storage" name="storage" type="text" placeholder="Penyimpanan">
                                  </div>
                                  <div class="col-3">
                                      <label class="form-label" for="shortcuttambahdata">Tombol Aksi</label>
                                      <div class="btn-group">
                                          <button class="btn btn-primary" type="button" id="add_storage"><i class="fa fa-plus"></i></button>
                                          <button class="btn btn-success change-modal" type="button" data-type="STR" data-bs-toggle="modal" data-bs-target="#SubKategoriItem"><i class="fa fa-list-alt"></i></button>
                                      </div>
                                  </div> -->
                                  <!-- Kategori 4 -->
                                  <!-- <div class="col-9"> 
                                      <label class="form-label" for="FormKategori4">Kategori 4</label>
                                      <input class="form-control" id="variant" name="variant" type="text" placeholder="Variant Warna">
                                  </div>
                                  <div class="col-3">
                                      <label class="form-label" for="shortcuttambahdata">Tombol Aksi</label>
                                      <div class="btn-group">
                                          <button class="btn btn-primary" type="button" id="add_variant"><i class="fa fa-plus"></i></button>
                                          <button class="btn btn-success change-modal" type="button" data-type="VRT" data-bs-toggle="modal" data-bs-target="#SubKategoriItem"><i class="fa fa-list-alt"></i></button>
                                      </div>
                                  </div> -->
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- End Form Tambah Cabang-->
          </div>
        <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->