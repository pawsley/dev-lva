        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Condiments</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url()?>">                                       
                            <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-gallery"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item">Katalog</li>
                    <li class="breadcrumb-item active">Condiments Katalog</li>
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
                    <h4>Daftar Katalog</h4>
                    <div class="d-flex align-items-center">
                        <a href="<?=base_url()?>katalog/buat-baru/" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Buat Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="basic-1">
                            <thead> 
                                <tr>
                                    <th style="min-width: 30px;"><span class="f-light f-w-600">#</span></th>
                                    <th><span class="f-light f-w-600">IMG</span></th>
                                    <th style="min-width: 150px;"><span class="f-light f-w-600">NAMA PRODUK</span></th>
                                    <th><span class="f-light f-w-600">NO. SKU</span></th>
                                    <th style="min-width: 120px;"><span class="f-light f-w-600">KATEGORI</span></th>
                                    <th style="min-width: 120px;"><span class="f-light f-w-600">BRANDS</span></th>
                                    <th style="min-width: 150px;"><span class="f-light f-w-600">VARIANT WARNA</span></th>
                                    <th><span class="f-light f-w-600">SIZE</span></th>
                                    <th style="min-width: 200px;"><span class="f-light f-w-600">COGS KATALOG </span> <i class="fa fa-money"></i></th>
                                    <th style="min-width: 200px;"><span class="f-light f-w-600">HARGA JUAL KATALOG </span> <i class="fa fa-money"></i></th>
                                    <th><span class="f-light f-w-600"></span></th>
                                </tr>
                            </thead>
                            <tbody> 
                            <!-- Data Produk 1 -->
                                <tr class="odd" role="row">
                                    <td>
                                        <input style="padding: 5px 12px; width:auto; height: 28px;" class="checkbox-class" type="checkbox" id="checkbox-27" data-id="27" data-input-id="checkbox-27-hpp" data-input-pub="checkbox-27-pub" data-input-mar="checkbox-27-mar" data-input-cb="checkbox-27-cb">
                                    </td>
                                    <td> 
                                        <div class="light-product-box">
                                            <img class="img-h-60 img-60" src="../assets/images/katalog/bonneta.jpg" alt="gambar-lva">
                                        </div>
                                    </td>
                                    <td>
                                        <p>BONNETA</p>
                                    </td>
                                    <td> 
                                    <p class="f-light">02145YK796</p>
                                    </td>
                                    <td> 
                                    <p class="f-light">Katalog Metro</p>
                                    </td>
                                    <td> 
                                        <p class="f-light">LVA Brands</p>
                                    </td>
                                    <td> 
                                      <p class="f-light">Midnight Red Maroon</p>
                                     </td>
                                    <td> 
                                        <p class="f-light">L</p>
                                    </td>
                                    <td> 
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">Rp</span>
                                            <input class="form-control input-hpp" id="checkbox-34-hpp" value="Rp1.750.000" type="text" onkeyup="formatRupiah(this);" readonly>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" style="padding-left: 10px;border-left-width: 1px;border-left-style: solid;padding-right: 10px;padding-top: 1px;padding-bottom: 1px;">Rp</span>
                                            <input class="form-control input-hpp" id="checkbox-34-hpp" value="0" type="text" onkeyup="formatRupiah(this);">
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-success dropdown-toggle" id="btnGroupVerticalDrop1" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AKSI</button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                                <a class="dropdown-item" href="javascript(0);" data-bs-toggle="modal" data-bs-target="#DetailKatalog">Detail Katalog</a>
                                                <a class="dropdown-item" href="#">Edit Katalog</a>
                                                <a class="dropdown-item" href="#">Hapus Katalog</a>
                                                <a class="dropdown-item" href="#">Bahan & Produk</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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
          <!-- Container-fluid Ends-->
        </div>