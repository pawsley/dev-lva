        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Master Agen</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Data Master</li>
                      <li class="breadcrumb-item active"> Master Agen</li>
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
                                <h4>List Agen</h4>
                                <div class="d-flex align-items-center">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#TambahAgen" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Buat Baru
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="display" id="table-customer" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 20%;"><span class="f-light f-w-600">ID AGEN</span></th>
                                                <th style="width: 30%;"><span class="f-light f-w-600">NAMA AGEN</span></th>
                                                <th style="width: 5%;"><span class="f-light f-w-600">TIPE</span></th>
                                                <th style="width: 5%;"><span class="f-light f-w-600">EMAIL</span></th>
                                                <th style="width: 5%;"><span class="f-light f-w-600">WHATSAPP</span></th>
                                                <th style="width: 5"><span class="f-light f-w-600">DEPOSIT</span></th>
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
            <!-- Modal Edit Customer -->
            <div class="modal fade bd-example-modal-xl" id="EditMasterCustomer" tabindex="-1" role="dialog" aria-labelledby="EditMasterCustomer" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start">
                            <div class="modal-toggle-wrapper">
                                <div class="modal-header mb-4">
                                    <h3>Edit Agen</h3>
                                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" id="form-ecst" method="post">
                                    <!-- Nama Customer -->
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="enmc">NAMA AGEN</label>
                                        <input class="form-control" id="enmc" name="enmc" type="text" placeholder="Silahkan Masukkan Nama Customer" required>
                                    </div>
                                    <!-- Tipe Customer -->
                                    <div class="col-md-4 position-relative">
                                        <label class="form-label" for="etpc">TIPE AGEN</label>
                                        <select class="form-select" id="etpc" name="etpc" required>
                                            <option disabled="" value="0">Pilih Tipe Agen ...</option>
                                        </select>
                                        <input type="text" id="eidtpc" name="eidtpc">
                                    </div>
                                    <!-- ID Customer -->
                                    <div class="col-md-4 position-relative"> 
                                        <label class="form-label" for="eidc">ID AGEN</label>
                                        <input class="form-control" id="eidc" name="eidc" type="text" placeholder="ID Terisi Otomatis" aria-label="IDCustomer" readonly>
                                    </div>
                                    <!-- Email Customer -->
                                    <div class="col-md-6 position-relative"> 
                                        <label class="form-label" for="emc">EMAIL AGEN</label>
                                        <input class="form-control" id="emc" name="emc" type="email" placeholder="alamat@email.com">
                                    </div>
                                    <!-- Nomor Whatsaap -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="ewac">NOMOR WHATSAPP</label>
                                        <div class="input-group has-validation"><span class="input-group-text" id="">+62</span>
                                            <input class="form-control" id="ewac" name="ewac" type="text" oninput="formatPhoneNumber(this)" placeholder="contoh: +6281220812206" required>
                                            <div class="invalid-tooltip">Pastikan Nomor Whatsapp Aktif.</div>
                                        </div>
                                    </div>
                                    <!-- Provinsi -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="eprov_name">Provinsi </label>
                                        <input class="form-control" type="text" name="eprov_name" id="eprov_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Provinsi.</div>
                                    </div>
                                    <!-- Kabupaten / Kota -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="ekab_name">Kota / Kabupaten</label>
                                        <input class="form-control" type="text" name="ekab_name" id="ekab_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kota / Kab.</div>
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="ekec_name">Kecamatan</label>
                                        <input class="form-control" type="text" name="ekec_name" id="ekec_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kecamatan.</div>
                                    </div>
                                    <!-- Kode Pos -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="ekode_pos">Kode Pos </label>
                                        <input class="form-control" id="ekode_pos" name="ekode_pos" type="number" placeholder="contoh: 60293" required>
                                    </div>
                                    <!-- Detai Alamat -->
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label" for="ealamat">DETAIL ALAMAT</label>
                                        <input class="form-control" id="ealamat" name="ealamat" type="text" placeholder="contoh: Jl. Tamtama No 19" required="">
                                        <div class="valid-tooltip">Looks good!</div>
                                    </div>

                                    <!-- Status Customer -->
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label" for="estatus">STATUS AGEN</label>
                                        <select class="form-select" id="estatus" name="estatus" required>
                                            <option value="1">Aktif</option>
                                            <option value="2">Tidak Aktif</option>
                                        </select>
                                    </div>
                                    <!-- Button Simpan -->
                                    <div class="col-md-12">
                                        <!-- <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Simpan Perubahan</button> -->
                                        <button type="submit" id="esubcst" class="btn btn-primary" data-bs-dismiss="modal">
                                            <span id="spinner_ecst" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                            <span id="tx_esubcst">Simpan Perubahan</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Customer -->
            <div class="modal fade bd-example-modal-xl" id="TambahAgen" tabindex="-1" role="dialog" aria-labelledby="TambahAgen" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                        <div class="modal-body social-profile text-start">
                            <div class="modal-toggle-wrapper">
                                <div class="modal-header mb-4">
                                    <h3>Tambah Agen</h3>
                                    <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form class="row g-3" id="form-cst" method="post">
                                    <!-- Nama Customer -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="nmc">NAMA AGEN</label>
                                        <input class="form-control" id="nmc" name="nmc" type="text" placeholder="Silahkan Masukkan Nama Customer" required>
                                    </div>
                                    <!-- Tipe Customer -->
                                    <div class="col-4 position-relative">
                                        <label class="form-label" for="tpc">TIPE AGEN</label>
                                        <select class="form-control" id="tpc" name="tpc" required>
                                            <option disabled="" value="0">Pilih Tipe Agen</option>
                                        </select>
                                        <input type="hidden" id="idtpc" name="idtpc">
                                    </div>
                                    <!-- ID Customer -->
                                    <div class="col-4 position-relative"> 
                                        <label class="form-label" for="idc">ID AGEN</label>
                                        <input class="form-control" id="idc" name="idc" type="text" placeholder="ID Terisi Otomatis" aria-label="IDCustomer" readonly>
                                    </div>
                                    <!-- Email Customer -->
                                    <div class="col-6 position-relative"> 
                                        <label class="form-label" for="emc">EMAIL AGEN</label>
                                        <input class="form-control" id="emc" name="emc" type="email" placeholder="alamat@email.com" aria-label="" required>
                                    </div>
                                    <!-- Nomor Whatsaap -->
                                    <div class="col-6 position-relative">
                                        <label class="form-label" for="wac">NOMOR WHATSAPP</label>
                                        <div class="input-group has-validation"><span class="input-group-text" id="">+62</span>
                                            <input class="form-control" id="wac" name="wac" type="text" oninput="formatPhoneNumber(this)" placeholder="contoh: +6281220812206" required>
                                            <div class="invalid-tooltip">Pastikan Nomor Whatsapp Aktif.</div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                                        <h4>Informasi Lanjutan</h4>
                                        <p class="f-m-light mt-1">
                                         <code>Berikut adalah formulir detail informasi alamat CUSTOMER ( OPSIONAL ).</code>
                                        </p>
                                    </div>
                                    <!-- Provinsi -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="province">Provinsi </label>
                                        <select class="form-select" id="province" name="prov" required>
                                            <option selected="" disabled="" value="0">Pilih Provinsi ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="prov_name" id="prov_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Provinsi.</div>
                                    </div>
                                    <!-- Kabupaten / Kota -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kabupaten">Kota / Kabupaten</label>
                                        <select class="form-select" id="kabupaten" name="kab" required>
                                            <option selected="" disabled="" value="0">Pilih Kota / Kab ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="kab_name" id="kab_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kota / Kab.</div>
                                    </div>
                                    <!-- Kecamatan -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kecamatan">Kecamatan</label>
                                        <select class="form-select" id="kecamatan" name="kec" required>
                                            <option selected="" disabled="" value="0">Pilih Kecamatan ...</option>
                                        </select>
                                        <input class="form-control" type="hidden" name="kec_name" id="kec_name">
                                        <div class="invalid-tooltip">Silahkan Pilih Kecamatan.</div>
                                    </div>
                                    <!-- Kode Pos -->
                                    <div class="col-md-6 position-relative">
                                        <label class="form-label" for="kode_pos">Kode Pos </label>
                                        <input class="form-control" id="kode_pos" name="kode_pos" type="number" placeholder="contoh: 60293" required>
                                    </div>
                                    <!-- Detai Alamat -->
                                    <div class="col-md-12 position-relative">
                                        <label class="form-label" for="alamat">Detail Alamat</label>
                                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="contoh: Jl. Tamtama No 19" required>
                                    </div>
                                    <!-- Submit Customer -->
                                    <div class="col-12">
                                        <!-- <button class="btn btn-primary" type="submit">BUAT BARU</button> -->
                                        <button type="submit" id="subcst" class="btn btn-primary">
                                            <span id="spinner_cst" class="spinner-border spinner-border-sm text-light d-none" role="status" aria-hidden="true"></span>
                                            <span id="tx_subcst">Tambah Agen</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>