<div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                <div class="row">
                    <div class="col-6">
                    <h4>List Katalog Produk</h4>
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
                        <li class="breadcrumb-item">General</li>
                        <li class="breadcrumb-item">Katalog</li>
                        <li class="breadcrumb-item active">List Katalog Produk</li>
                    </ol>
                    </div>
                </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <!-- Mulai Data Produk Katalog -->
                <div class="row"> 
                    <div class="col-12"> 
                        <div class="card height-equal"> 
                            <div class="card-header pb-0 card-no-border d-flex justify-content-between align-items-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="<?=base_url()?>katalog/buat-baru" class="btn btn-primary">
                                            <i class="fa fa-plus"></i> Buat Katalog Baru
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="table-katalog">
                                        <thead> 
                                            <tr>
                                                <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">KATALOG</span></th>
                                                <!-- <th scope="col" style="min-width: 120px;"><span class="f-light f-w-600">DETAIL KATALOG</span></th> -->
                                                <th scope="col" style="min-width: 100px;"><span class="f-light f-w-600">TOTAL HPP BAHAN</span></th>
                                                <th scope="col" style="min-width: 100px;"><span class="f-light f-w-600">HARGA JUAL</span></th>
                                                <th scope="col" style="min-width: 20px;"><span class="f-light f-w-600">AKSI</span></th>
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
            <!-- Detail Katalog -->
            <div class="modal fade" id="DetailKatalog" tabindex="-1" role="dialog" aria-labelledby="DetailKatalog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start" style="border-radius:5%; max-height: 90vh; overflow-y: auto;">
                        <div class="modal-toggle-wrapper">
                        <div class="modal-header mb-4">
                            <h3>Detail Info Katalog</h3>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <ul class="list-group">
                                <!-- Gambar Katalog -->
                                <div class="text-center mb-3">
                                <img src="<?=base_url()?>assets/images/katalog/bonneta.jpg" alt="Katalog Image" style="width: 300px; height: 300px;">
                                </div>
                                <!-- Barcode Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Barcode Katalog</span>
                                    <strong>
                                        <div style="font-size:0;position:relative;width:90px;height:35px;">
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:0px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:3px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:6px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:11px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:4px;height:35px;position:absolute;left:13px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:19px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:22px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:27px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:30px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:33px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:4px;height:35px;position:absolute;left:35px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:41px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:44px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:49px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:52px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:55px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:57px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:63px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:66px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:70px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:75px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:77px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:3px;height:35px;position:absolute;left:82px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:1px;height:35px;position:absolute;left:86px;top:0">&nbsp;</div>
                                            <div style="background-color:black;width:2px;height:35px;position:absolute;left:88px;top:0">&nbsp;</div>
                                        </div>
                                    </strong>
                                </li>
                                <!-- SKU KATALOG -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>NOMOR SKU</span>
                                    <strong>02145YK796</strong>
                                </li>
                                <!-- Nama Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Nama Katalog</span>
                                    <strong>BONNETA</strong>
                                </li>
                                <!-- Kategori Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Kategori Katalog</span>
                                <strong>Katalog Metro</strong>
                                </li>
                                <!-- Brand Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Brand Katalog</span>
                                    <strong>LVA Brands</strong>
                                </li>
                                <!-- Size Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Size Katalog</span>
                                    <strong>L</strong>
                                </li>
                                <!-- Ukuran -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Lingkar Dada</span>
                                <strong>2,5 M</strong>
                                </li>
                                <!-- Ukuran -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Panjang Baju</span>
                                <strong>7 M</strong>
                                </li>
                                <!-- Ukuran -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Ukuran Katalog</span>
                                <strong>9 Meter</strong>
                                </li>
                                <!-- Warna Katalog -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Warna Katalog</span>
                                    <strong>Midnight Red Maroon</strong>
                                </li>
                                <!-- Total COGS -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Total COGS</span>
                                    <strong class="text-success">Rp1.835.000</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
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
                            <button class="btn btn-primary" id="editmod" data-bs-dismiss="modal" type="button">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Bahan -->
            <div class="modal fade bd-example-modal-xl" id="AddMaterial" tabindex="-1" role="dialog" aria-labelledby="AddMaterial" aria-hidden="true">
              <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content dark-sign-up">
                  <div class="modal-header social-profile text-start">
                    <h3><span id="modtl"></span> | <span id="skudtl"></span></h3>
                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body social-profile text-start">
                    <form class="row g-3" id="form-cdm" method="post">
                        <div class="col-md-12 position-relative">
                            <div class="table-responsive">
                                <table class="display" id="table-addmaterial">
                                <thead>
                                    <tr>
                                        <th scope="col" style="min-width: 140px;"><span class="f-light f-w-600">MATERIAL</span></th>
                                        <th scope="col" style="min-width: 20px;"><span class="f-light f-w-600">QTY</span></th>
                                        <th scope="col" style="min-width: 100px;"><span class="f-light f-w-600">HARGA SATUAN</span></th>
                                        <th scope="col" style="min-width: 100px;"><span class="f-light f-w-600">TOTAL HARGA</span></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                </table>
                            </div>
                        </div>                      
                    </form>
                  </div>
                </div>
              </div>
            </div>                       
            <!-- Container-fluid Ends-->
        </div>