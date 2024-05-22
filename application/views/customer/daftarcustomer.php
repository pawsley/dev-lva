        <div class="page-body">
            <div class="container-fluid">
              <div class="page-title">
                <div class="row">
                  <div class="col-6">
                    <h4>Daftar Customer</h4>
                  </div>
                  <div class="col-6">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                          <svg class="stroke-icon">
                            <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-user"></use>
                          </svg></a></li>
                      <li class="breadcrumb-item"> Home</li>
                      <li class="breadcrumb-item"> Customer</li>
                      <li class="breadcrumb-item active"> Daftar Customer</li>
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
                            <h4>Database Customer</h4>
                            <div class="d-flex align-items-center">
                                <a href="buatbarucustomer.html" target="_blank" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> Buat Baru
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="display" id="export-button">
                                <thead>
                                <tr>
                                    <th><span class="f-light f-w-600">ID</span></th>
                                    <th style="min-width: 200px;"><span class="f-light f-w-600">NAMA CUSTOMER</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">KATEGORI</span></th>
                                    <th><span class="f-light f-w-600">KELAMIN</span></th>
                                    <th><span class="f-light f-w-600">EMAIL</span></th>
                                    <th><span class="f-light f-w-600">WHATSAPP</span></th>
                                    <th style="min-width: 100px;"><span class="f-light f-w-600">SALDO AKTIF</span></th>
                                    <th><span class="f-light f-w-600"></span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- Data 1 -->
                                <tr class="odd" role="row">
                                    <td>
                                        <p class="f-light">ELVC-0001</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Ilham Ramadhan Taufiq</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Agen</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Pria</p>
                                    </td>
                                    <td>
                                        <p class="f-light">hellomasdhan@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="f-light">6281220812206</p>
                                    </td>
                                    <td>
                                        <p class="f-light f-w-600 text-success">Rp68.000.000</p>
                                    </td>
                                    <td> 
                                        <ul class="action">
                                            <li class="edit">
                                                <a data-bs-toggle="modal" data-bs-target="#EditMasterCustomer">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </li>
                                            <li class="info">
                                                <a href="detailcustomer.html" target="_blank">
                                                    <i class="fa fa-external-link-square"></i>
                                                </a>
                                            </li>
                                            <li class="delete">
                                                <a data-bs-toggle="modal" data-bs-target="#">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- Data 2 -->
                                <tr class="odd" role="row">
                                    <td>
                                        <p class="f-light">ELVC-0002</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Figo Vio Hidayat</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Member</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Pria</p>
                                    </td>
                                    <td>
                                        <p class="f-light">figohidayat@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="f-light">6281235757586</p>
                                    </td>
                                    <td>
                                        <p class="f-light f-w-600">(null)</p>
                                    </td>
                                    <td> 
                                        <ul class="action">
                                            <li class="edit">
                                                <a data-bs-toggle="modal" data-bs-target="#EditMasterCustomer">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </li>
                                            <li class="info">
                                                <a href="detailcustomer.html" target="_blank">
                                                    <i class="fa fa-external-link-square"></i>
                                                </a>
                                            </li>
                                            <li class="delete">
                                                <a data-bs-toggle="modal" data-bs-target="#">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- Data 3 -->
                                <tr class="odd" role="row">
                                    <td>
                                        <p class="f-light">ELVC-0003</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Nizam Alfian</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Reseller</p>
                                    </td>
                                    <td>
                                        <p class="f-light">Pria</p>
                                    </td>
                                    <td>
                                        <p class="f-light">nizamae@gmail.com</p>
                                    </td>
                                    <td>
                                        <p class="f-light">6282231575758</p>
                                    </td>
                                    <td>
                                        <p class="f-light f-w-600 text-success">Rp18.850.000</p>
                                    </td>
                                    <td> 
                                        <ul class="action">
                                            <li class="edit">
                                                <a data-bs-toggle="modal" data-bs-target="#EditMasterCustomer">
                                                    <i class="icon-pencil"></i>
                                                </a>
                                            </li>
                                            <li class="info">
                                                <a href="detailcustomer.html" target="_blank">
                                                    <i class="fa fa-external-link-square"></i>
                                                </a>
                                            </li>
                                            <li class="delete">
                                                <a data-bs-toggle="modal" data-bs-target="#">
                                                    <i class="icon-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
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
            <!-- End Data Customer -->
            <!-- Modal Edit Customer -->
            <div class="modal fade bd-example-modal-xl" id="EditMasterCustomer" tabindex="-1" role="dialog" aria-labelledby="EditMasterCustomer" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                    <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                        <div class="modal-header mb-4">
                            <h3>Edit Master Data Customer</h3>
                            <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="row g-3">
                        <!-- Nama Customer -->
                        <div class="col-4 position-relative">
                            <label class="form-label" for="NamaCustomer">NAMA CUSTOMER</label>
                            <input class="form-control" id="NamaCustomer" type="text" placeholder="Silahkan Masukkan Nama Customer" required>
                        </div>
                        <!-- Tipe Customer -->
                        <div class="col-3 position-relative">
                            <label class="form-label" for="KategoriCustomer">TIPE CUSTOMER</label>
                            <select class="form-select" id="KategoriCustomer" required="">
                                <option selected="" disabled="" value="">Pilih Kategori Customer</option>
                                <option value="">Agen</option>
                                <option value="">Reseller</option>
                                <option value="">Member</option>
                            </select>
                        </div>
                        <!-- Button Tambah -->
                        <div class="col-2 position-relative">
                            <label class="form-label" for="shortcuttambahdata">TOMBOL AKSI</label>
                            <div class="text-center">
                                <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#TambahSubKategoriItem"><i class="fa fa-plus"></i></a>
                                <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                            </div>
                        </div>
                        <!-- ID Customer -->
                        <div class="col-3 position-relative"> 
                            <label class="form-label" for="IDCustomer">ID CUSTOMER</label>
                            <input class="form-control" id="IDCustomer" type="text" placeholder="ID Terisi Otomatis" aria-label="IDCustomer" readonly>
                        </div>
                        <!-- Email Customer -->
                        <div class="col-4 position-relative"> 
                            <label class="form-label" for="">EMAIL CUSTOMER</label>
                            <input class="form-control" id="" type="email" placeholder="alamat@email.com" aria-label="">
                        </div>
                        <!-- Nomor Whatsaap -->
                        <div class="col-4 position-relative">
                            <label class="form-label" for="whatsappNumber">NOMOR WHATSAPP</label>
                            <div class="input-group has-validation"><span class="input-group-text" id="">+62</span>
                                <input class="form-control" id="whatsappNumber" type="text" aria-describedby="whatsappHelp" placeholder="format : 81 xxx" required>
                                <div class="invalid-tooltip">Pastikan Nomor Whatsapp Aktif.</div>
                            </div>
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="col-4 position-relative">
                            <label class="form-label" for="">JENIS KELAMIN</label>
                            <select class="form-select" id="" required="">
                                <option selected="" disabled="" value="">Pilih Jenis Kelamin</option>
                                <option value="">Pria</option>
                                <option value="">Wanita</option>
                            </select>
                        </div>
                        <div class="card-header">
                            <h4>Informasi Lanjutan</h4>
                            <p class="f-m-light mt-1">
                                <code>Berikut adalah formulir detail informasi alamat CUSTOMER ( OPSIONAL ).</code>
                            </p>
                        </div>
                        <!-- Provinsi -->
                        <div class="col-md-6 position-relative">
                        <label class="form-label" for="FormProvinsi">PROVINSI</label>
                        <select class="form-select" id="FormProvinsi" required="">
                            <option selected="" disabled="" value="">Pilih Provinsi ...</option>
                            <option>Jawa Timur</option>
                            <option>Jawa Tengah</option>
                            <option>Jawa Barat</option>
                        </select>
                        <div class="invalid-tooltip">Sialhkan Pilih Provinsi.</div>
                        </div>
                        <!-- Kabupaten / Kota -->
                        <div class="col-md-6 position-relative">
                        <label class="form-label" for="FormKotaKab">KOTA / KAB</label>
                        <select class="form-select" id="FormKotaKab" required="">
                            <option selected="" disabled="" value="">Pilih Kota / Kab ...</option>
                            <option>Kota Surabaya</option>
                            <option>Kabupaten Sidoarjo</option>
                            <option>Kabupaten Malang</option>
                        </select>
                        <div class="invalid-tooltip">Sialhkan Pilih Kota / Kab.</div>
                        </div>
                        <!-- Kecamatan -->
                        <div class="col-md-6 position-relative">
                        <label class="form-label" for="FormKecamatan">KECAMATAN</label>
                        <select class="form-select" id="FormKecamatan" required="">
                            <option selected="" disabled="" value="">Pilih Kecamatan ...</option>
                            <option>Jagir</option>
                            <option>Wonokromo</option>
                            <option>Kedung Asri</option>
                        </select>
                        <div class="invalid-tooltip">Sialhkan Pilih Kecamatan.</div>
                        </div>
                        <!-- Kelurahaan -->
                        <div class="col-md-6 position-relative">
                        <label class="form-label" for="FormKelurahaan">KELURAHAN</label>
                        <select class="form-select" id="FormKelurahaan" required="">
                            <option selected="" disabled="" value="">Pilih Kelurahaan ...</option>
                            <option>Sawunggaling</option>
                            <option>Kesatrian</option>
                            <option>Gedangan</option>
                        </select>
                        <div class="invalid-tooltip">Sialhkan Pilih Kelurahaan.</div>
                        </div>
                        <!-- Detai Alamat -->
                        <div class="col-md-12 position-relative">
                            <label class="form-label" for="FormDetailAlamat">DETAIL ALAMAT</label>
                            <input class="form-control" id="FormDetailAlamat" type="text" placeholder="contoh: Jl. Tamtama No 19" required="">
                            <div class="valid-tooltip">Looks good!</div>
                        </div>

                            <!-- Status Customer -->
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="">Status Customer</label>
                                <select class="form-select" id="" required="">
                                    <option selected="" disabled="" value="Aktif">Aktif</option>
                                    <option>Tidak Aktif</option>
                                </select>
                            </div>
                            <!-- Button Simpan -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Simpan Perubahan</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Modal Tambah Sub Kategori Baru -->
            <div class="modal fade" id="TambahSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="SubKategoriItem" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                        <div class="modal-toggle-wrapper">
                            <div class="modal-header mb-4">
                                <h3>Tambah Data Baru</h3>
                                <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="row g-3">
                            <!-- Nama Supplier -->
                            <div class="col-md-12 position-relative">
                                <label class="form-label" for="SubKategoriItem">Sub Kategori Data</label>
                                <input class="form-control" id="SubKategoriItem" type="text" placeholder="Masukkan Data Baru">
                            </div>
                            <!-- Button Simpan -->
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit" data-bs-dismiss="modal">Tambah Baru</button>
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
                    <h1 class="modal-title fs-5" id="category-pill-modalLabel">List Data</h1>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body custom-input">
                    <form>
                    <div class="row g-3">
                        <!-- Kategori 1 -->
                        <div class="col-9">
                        <input class="form-control" id="merek" name="merek" type="text" placeholder="Merek">
                        </div>
                        <!-- Hapus -->
                        <div class="col-3">
                        <div class="btn-group">
                            <button class="btn btn-danger add_merk" type="button" id="add_merk"><i class="fa fa-trash"></i></button>
                        </div>
                        </div>
                        <!-- Kategori 1 -->
                        <div class="col-9">
                        <input class="form-control" id="merek" name="merek" type="text" placeholder="Merek">
                        </div>
                        <!-- Hapus -->
                        <div class="col-3">
                        <div class="btn-group">
                            <button class="btn btn-danger add_merk" type="button" id="add_merk"><i class="fa fa-trash"></i></button>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="button">Simpan</button>
                </div>
                </div>
            </div>
            </div>
        </div>