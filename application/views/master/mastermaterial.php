        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Data Master Material</h4>
                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                                <svg class="stroke-icon">
                                    <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                            <li class="breadcrumb-item"> Home</li>
                            <li class="breadcrumb-item"> Data Master</li>
                            <li class="breadcrumb-item active"> Master Material</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <!-- Form Material -->
                <div class="row">
                    <!-- Form MATERIAL -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Formulir Input Material</h4>
                            </div>
                            <div class="card-body custom-input">
                                <form class="row g-3" id="form-crem">
                                    <!-- ID Material -->
                                    <div class="col-3 position-relative"> 
                                        <label class="form-label" for="idm">ID MATERIAL</label>
                                        <input class="form-control" id="idm" type="text" placeholder="ID Otomatis" aria-label="idm" readonly>
                                    </div>
                                    <!-- Nama Material -->
                                    <div class="col-9 position-relative">
                                        <label class="form-label" for="nmm">NAMA MATERIAL</label>
                                        <input class="form-control" id="nmm" type="text" placeholder="Silahkan Masukkan Nama Material" required>
                                    </div>
                                    <!-- Kategori Material -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="katm">KATEGORI MATERIAL</label>
                                        <select class="form-select" id="katm" data-id="KAT" required="">
                                            <option selected="" disabled="" value="0">Pilih Kategori Material</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="KAT" data-title="Tambah Kategori Baru" data-label="Nama Kategori Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="KAT" data-title="Daftar Kategori" data-label="Nama Kategori"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Brand Product -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="mrkm">MEREK MATERIAL</label>
                                        <select class="form-select" id="mrkm" required="">
                                            <option selected="" disabled="" value="0">Pilih Merek</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="MRK" data-title="Tambah Merk Baru" data-label="Nama Merk Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="MRK" data-title="Daftar Merk" data-label="Nama Merk"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Variant Warna -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="wrnm">WARNA MATERIAL</label>
                                        <select class="form-select" id="wrnm" required="">
                                            <option selected="" disabled="" value="0">Pilih Variant Warna</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="WRN" data-title="Tambah Warna Baru" data-label="Nama Warna Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="WRN" data-title="Daftar Warna" data-label="Nama Warna"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Satuan MAterial -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="satm">SATUAN MATERIAL</label>
                                        <select class="form-select" id="satm" required="">
                                            <option selected="" disabled="" value="0">Pilih Satuan Material</option>
                                        </select>
                                    </div>
                                    <!-- Button Tambah -->
                                    <div class="col-2 position-relative">
                                        <label class="form-label">TOMBOL AKSI</label>
                                        <div class="text-center">
                                            <a class="btn badge-light-primary shownewmod" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem" data-id="SAT" data-title="Tambah Satuan Baru" data-label="Nama Satuan Baru"><i class="fa fa-plus"></i></a>
                                            <a class="btn badge-light-primary showdafmod" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem" data-id="SAT" data-title="Daftar Satuan" data-label="Nama Satuan"><i class="fa fa-bars"></i></a>
                                        </div>
                                    </div>
                                    <!-- Upload Gambar -->
                                    <div class="col-12 position-relative">
                                        <input class="form-control" id="imgm" name="imgm" type="file" accept=".png, .jpg, .jpeg" required style="display: none;">
                                        <div id="upload-btn" class="upload-btn"></div>
                                    </div>
                                    <!-- Submit Barang -->
                                    <div class="col-12 position-relative mb-3">
                                        <button class="btn btn-primary" type="button" id="addm">Tambah Material</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Form Material -->
                <!-- Data Listing Material -->
                
                <div class="row">
                    <div class="col-12">
                        <div class="card height-equal">
                        <div class="card-header">
                            <h4>List Data Material</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="display" id="table-material">
                                <thead>
                                <tr>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">ID MATERIAL</span></th>
                                    <th style="text-align:center; min-width: 150px;"><span class="f-light f-w-600">NAMA MATERIAL</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">KATEGORI</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">MEREK</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">WARNA</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">SATUAN</span></th>
                                    <th style="text-align:center;"><span class="f-light f-w-600">AKSI</span></th>
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
            <!-- End Listing Supplier -->
            <!-- Modal Tambah Sub Kategori Baru -->
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
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="item" id="labmod"></label>
                                <input class="form-control" id="item" name="item" type="text" placeholder="Masukkan Item Baru">
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
                            <button class="btn btn-primary" id="editmod" data-bs-dismiss="modal" type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade bd-example-modal-xl" id="EditMasterMaterial" tabindex="-1" role="dialog" aria-labelledby="EditMasterMaterial" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-header social-profile text-start">
                            <h3>Edit Master Data Material</h3>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body social-profile text-start">
                            <form class="row g-3" id="form-uptm"  enctype="multipart/form-data">
                                <!-- ID Material -->
                                <div class="col-3 position-relative"> 
                                    <label class="form-label" for="eidm">ID MATERIAL</label>
                                    <input class="form-control" id="eidm" name="eidm" type="text" placeholder="ID Otomatis" readonly>
                                </div>
                                <!-- Nama Material -->
                                <div class="col-9 position-relative">
                                    <label class="form-label" for="enmm">NAMA MATERIAL</label>
                                    <input class="form-control" id="enmm" name="enmm" type="text" placeholder="Silahkan Masukkan Nama Material" required>
                                </div>
                                <!-- Kategori Material -->
                                <div class="col-3 position-relative"> 
                                    <label class="form-label" for="ekatm">KATEGORI MATERIAL</label>
                                    <select class="form-select" id="ekatm" name="ekatm" required="">
                                        <option selected="" disabled="" value="">Pilih Kategori Material</option>
                                    </select>
                                </div>
                                <!-- Brand Product -->
                                <div class="col-3 position-relative"> 
                                    <label class="form-label" for="emrkm">MEREK MATERIAL</label>
                                    <select class="form-select" id="emrkm" name="emrkm" required="">
                                        <option selected="" disabled="" value="">Pilih Merek</option>
                                    </select>
                                </div>
                                <!-- Variant Warna -->
                                <div class="col-3 position-relative"> 
                                    <label class="form-label" for="ewrnm">WARNA MATERIAL</label>
                                    <select class="form-select" id="ewrnm" name="ewrnm" required="">
                                        <option selected="" disabled="" value="">Pilih Variant Warna</option>
                                    </select>
                                </div>
                                <!-- Satuan MAterial -->
                                <div class="col-3 position-relative"> 
                                    <label class="form-label" for="esatm">SATUAN MATERIAL</label>
                                    <select class="form-select" id="esatm" name="esatm" required="">
                                        <option selected="" disabled="" value="">Pilih Satuan Material</option>
                                    </select>
                                </div>
                                <!-- Upload Gambar -->
                                <div class="col-12 position-relative">
                                    <input type="hidden" id="oldimg" name="oldimg">
                                    <input class="form-control" id="eimgm" name="eimgm" type="file" accept=".png, .jpg, .jpeg" required style="display:none;">
                                    <div id="eupload-btn" class="upload-btn"></div>
                                </div>
                                <!-- Submit Barang -->
                                <div class="col-12 position-relative mb-3">
                                    <button class="btn btn-primary" type="button" id="edmtr">Simpan Perubahan</button>
                                </div>
                            </form>                                
                        </div>
                    </div>
                </div>
            </div>
          </div>