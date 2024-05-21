        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Formulir Barang Masuk</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a>
                    </li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Applications</li>
                    <li class="breadcrumb-item"> Data Barang</li>
                    <li class="breadcrumb-item active"> Masuk</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- Motifikasi -->
            <!-- Card Form Data Masuk Bekas Baru -->
            <div class="row">
                <!-- Form Barang -->
                <div class="col-xl-12">
                  <div class="card height-equal">
                      <div class="card-body custom-input col-xl-12">
                        <!-- Menu Tab Barang Baru & Bekas -->
                        <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                          <li class="nav-item"><a class="nav-link active txt-primary" id="barang-baru-tab" data-bs-toggle="tab" href="#barang-baru" role="tab" aria-controls="barang-baru" aria-selected="true"><i class="icofont icofont-archive"></i>Barang Baru</a></li>
                          <li class="nav-item"><a class="nav-link txt-primary" id="barang-bekas-tab" data-bs-toggle="tab" href="#barang-bekas" role="tab" aria-controls="barang-bekas" aria-selected="false"><i class="icofont icofont-archive"></i>Barang Bekas</a></li>
                        </ul>
                        <!-- Isi Form Konten-->
                        <div class="tab-content" id="icon-tabContent">
                          <!-- Tambah Data Barang Baru -->
                          <div class="tab-pane fade show active" id="barang-baru" role="tabpanel" aria-labelledby="barang-baru-tab">
                              <div class="pt-3 mb-0">
                                <form class="row g-3">
                                  <!-- Tanggal Catatan -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="tanggalwaktubarang">Tanggal Waktu</label>
                                    <input class="form-control digits" id="tglbaru" name="tglbaru" type="datetime-local" readonly>
                                  </div>

                                  <!-- Supplier -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="FormIDSupplier">Supplier</label>
                                    <select class="form-select" id="suppbaru" name="suppbaru" required="">
                                        <option selected="" disabled="" value="0">Pilih Supplier</option>
                                    </select>
                                  </div>

                                  <!-- Faktur Barang -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="fakturbarang">No Faktur Barang</label>
                                    <input class="form-control" id="fakturbarang" name="nofakbaru" type="text" placeholder="Masukkan Nomor Faktur Barang" aria-label="fakturbarang" required="">
                                  </div>

                                  <!-- Nama Produk -->
                                  <div class="col-8 position-relative">
                                      <label class="form-label" for="NamaProduk">Nama Produk</label>
                                      <select class="form-select" id="prodbaru" name="prodbaru" required="">
                                        <option selected="" disabled="" value="0">Pilih Produk</option>
                                    </select>
                                  </div>

                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="SNProduk">SN Produk</label>
                                    <input class="form-control" id="snbaru" type="text" name="snbaru" placeholder="Masukkan Nomor SN Produk" aria-label="SNProduk" required="">
                                  </div>

                                  <div class="col-md-12 position-relative"> 
                                      <label class="form-label" for="exampleFormControlTextarea1">Spesifikasi Lengkap</label>
                                      <textarea class="form-control" style="resize: none;" name="spekbaru" id="spekbaru" rows="3"></textarea>
                                  </div>
                                  <!-- Submit Barang -->
                                  <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="button" id="tambahbaru">Tambah Produk</button>
                                  </div>
                                </form>
                              </div>
                          </div>
                          <!-- Tambah Data Barang Bekas -->
                          <div class="tab-pane fade" id="barang-bekas" role="tabpanel" aria-labelledby="barang-bekas-tab">
                            <div class="pt-3 mb-0">
                                <form class="row g-3">
                                  <!-- Tanggal Catatan -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="tanggalwaktubarang">Tanggal Waktu</label>
                                    <input class="form-control digits" id="tglbekas" name="tglbekas" type="datetime-local" readonly>
                                  </div>
                                  
                                  <!-- Supplier -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="FormIDSupplier">Supplier</label>
                                    <select class="form-select" id="suppbekas" name="suppbekas" required="">
                                        <option selected="" disabled="" value="">Pilih Supplier</option>
                                    </select>
                                  </div>

                                  <!-- Faktur Barang -->
                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="fakturbarang">No Faktur Barang</label>
                                    <input class="form-control" id="nofakbekas" name="nofakbekas" type="text" placeholder="Masukkan Nomor Faktur Barang" aria-label="fakturbarang" required="">
                                  </div>

                                  <!-- Nama Produk -->
                                  <div class="col-8 position-relative">
                                      <label class="form-label" for="NamaProduk">Nama Produk</label>
                                      <select class="form-select" id="prodbekas" name="prodbekas" required="">
                                        <option selected="" disabled="" value="">Pilih Produk</option>
                                    </select>
                                  </div>

                                  <div class="col-4 position-relative"> 
                                    <label class="form-label" for="SNProduk">SN Produk</label>
                                    <input class="form-control" id="snbekas" name="snbekas" type="text" placeholder="Masukkan Nomor SN Produk" aria-label="SNProduk" required="">
                                  </div>

                                  <div class="col-md-12 position-relative"> 
                                      <label class="form-label" for="exampleFormControlTextarea1">Spesifikasi Lengkap</label>
                                      <textarea class="form-control" style="resize: none;" name="spekbekas" id="spekbekas" rows="3"></textarea>
                                  </div>
                                  <!-- Submit Barang -->
                                  <div class="col-12 mt-3">
                                    <button class="btn btn-primary" type="button" id="tambahbekas">Tambah Produk</button>
                                  </div>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
            <!-- Listing Inventori -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header pb-0 card-no-border">
                        <h4>History Barang Masuk</h4>
                      </div>
                      <div class="card-body">
                        <div class="dt-ext table-responsive">
                          <table class="display" id="table-bm">
                            <thead>
                              <tr>
                                <th>TANGGAL</th>
                                <th>NO FAKTUR</th>
                                <th>SUPPLIER</th>
                                <th>SN PRODUK</th>
                                <th>NAMA PRODUK</th>
                                <th>SPESIFIKASI</th>
                                <th>KONDISI PRODUK</th>
                                <th>BARCODE</th>
                                <th>AKSI</th>
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
            <!-- End Listing Inventori-->
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->