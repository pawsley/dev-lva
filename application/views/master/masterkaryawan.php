        <!-- Begin Content -->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>Data Master Karyawan</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item"> Home</li>
                    <li class="breadcrumb-item"> Data Master</li>
                    <li class="breadcrumb-item active"> Master Karyawan</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <!-- Form Tambah Karyawan -->
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <form id="formkar" class="row g-3 needs-validation custom-input" novalidate="">
                      <!-- ID Karyawan -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="id">ID Karyawan</label>
                        <input class="form-control" id="id" value="<?= $newID ?>" name="id" type="text" placeholder="ID KARYAWAN TERISI OTOMATIS" readonly>
                        <div class="valid-tooltip">Looks good!</div>
                      </div>
                      <!-- Nama Karyawan -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="nl">Nama Karyawan</label>
                        <input class="form-control" id="nl" name="nl" type="text" placeholder="Masukkan Nama Karyawan" required>
                        <div class="invalid-tooltip">Form nama tidak boleh kosong</div>
                      </div>
                      <!-- Tanggal Lahir -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="tl">Tanggal Lahir</label>
                        <input class="form-control digits" id="tl" name="tl" type="date" required>
                        <div class="invalid-tooltip">Tanggal lahir tidak valid</div>
                      </div>
                      <!-- Jenis Kelamin -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="jk">Jenis Kelamin</label>
                        <select class="form-select" id="jk" name="jk" required>
                            <option selected="" disabled="" value="">Pilih Jenis Kelamin ...</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-tooltip">Silahkan Pilih Jenis Kelamin</div>
                      </div>
                      <!-- Alamat Email Karyawan -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="email">Alamat Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="contoh : karyawan@email.com" required>
                        <div class="invalid-tooltip">Form email tidak boleh kosong</div>
                      </div>
                      <!-- Alamat Password Karyawan -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="password">Password Akses</label>
                        <div class="form-input position-relative">
                            <input class="form-control" style="padding-right: 1rem;" id="password" name="password" type="password" placeholder="Buat Password Karyawan" required>
                            <div class="input-group-append" style="position: absolute; right: 0.75rem;top: 50%; transform: translateY(-50%); cursor: pointer;">
                                <i class="fa fa-eye" id="togglePassword"></i>
                            </div>
                            <div class="invalid-tooltip">Form password tidak boleh kosong</div>
                        </div>
                        <div class="invalid-tooltip">Form password tidak boleh kosong</div>
                      </div>
                      <div class="card-header">
                        <h4>Informasi Alamat</h4>
                        <p class="f-m-light mt-1">
                          <code>Berikut adalah formulir detail informasi alamat karyawan.</code>
                        </p>
                      </div>
                      <!-- Provinsi -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="province">Provinsi </label>
                        <select class="form-select" id="province" name="prov">
                            <option selected="" disabled="" value="">Pilih Provinsi ...</option>
                        </select>
                        <input class="form-control" type="hidden" name="prov_name" id="prov_name">
                        <div class="invalid-tooltip">Silahkan Pilih Provinsi.</div>
                      </div>
                      <!-- Kabupaten / Kota -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="kabupaten">Kota / Kabupaten</label>
                        <select class="form-select" id="kabupaten" name="kab">
                            <option selected="" disabled="" value="">Pilih Kota / Kab ...</option>
                        </select>
                        <input class="form-control" type="hidden" name="kab_name" id="kab_name">
                        <div class="invalid-tooltip">Silahkan Pilih Kota / Kab.</div>
                      </div>
                      <!-- Kecamatan -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="kecamatan">Kecamatan</label>
                        <select class="form-select" id="kecamatan" name="kec">
                            <option selected="" disabled="" value="">Pilih Kecamatan ...</option>
                        </select>
                        <input class="form-control" type="hidden" name="kec_name" id="kec_name">
                        <div class="invalid-tooltip">Silahkan Pilih Kecamatan.</div>
                      </div>
                      <!-- Kode Pos -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="kode_pos">Kode Pos </label>
                        <input class="form-control" id="kode_pos" name="kode_pos" type="number" placeholder="contoh: 60293">
                      </div>
                      <!-- Detai Alamat -->
                      <div class="col-md-12 position-relative">
                        <label class="form-label" for="alamat">Detail Alamat</label>
                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="contoh: Jl. Tamtama No 19">
                      </div>
                      <div class="card-header">
                        <h4>Informasi Lanjutan</h4>
                        <p class="f-m-light mt-1">
                        <code>Berikut adalah formulir detail informasi lanjutan karyawan.</code>
                        </p>
                      </div>
                      <!-- Nomor Telpone -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="wa">Nomor Whatsapp</label>
                        <div class="input-group has-validation">
                            <input class="form-control" id="wa" name="wa" type="text" oninput="formatPhoneNumber(this)" placeholder="contoh: +6281220812206">
                        </div>
                      </div>
                      <!-- Upload CV -->
                      <div class="col-md-6 position-relative"> 
                        <label class="form-label" for="file">Upload Curiculum Vitae</label>
                        <input class="form-control" id="file" type="file" name="cv" accept=".pdf">
                      </div>
                      <!-- Pilih Role -->
                      <div class="col-md-4 position-relative">
                        <label class="form-label" for="role">Role Karyawan</label>
                        <select class="form-select" id="role" name="role" required>
                          <option selected="" disabled="" value="">Pilih Role Karyawan ...</option>
                        </select>
                        <div class="invalid-tooltip">Silahkan Pilih Role Karyawan.</div>
                      </div>
                      <!-- Button Tambah -->
                      <div class="col-2">
                        <label class="form-label">Add New</label>
                        <div class="button">
                            <a class="btn badge-light-primary f-w-500" type="button" data-bs-toggle="modal" data-bs-target="#TambahRoleBaru" onclick="changeInputName('SubKategoriItem', 'newrole')"><i class="fa fa-plus"></i></a>
                            <a class="btn badge-light-primary" href="#!" data-bs-toggle="modal" data-bs-target="#DaftarSubKategoriItem"><i class="fa fa-bars"></i></a>
                        </div>
                      </div>
                      <!-- Pilih Jenis Gaji -->
                      <div class="col-md-6 position-relative">
                        <label class="form-label" for="tg">Jenis Gaji</label>
                        <select class="form-select" id="tg" name="tg">
                          <option selected="" disabled="" value="">Pilih Jenis Gaji Karyawan ...</option>
                          <option value="BULANAN">BULANAN (Gaji Dibayar Dalam Tempo Bulanan)</option>
                          <option value="BORONGAN">BORONGAN (Gaji Dibayar Per Project Selesai)</option>
                        </select>
                      </div>
                      <!-- BANK AKUN -->
                      <div class="col-4 position-relative"> 
                          <label class="form-label" for="bank">Akun Bank</label>
                          <select class="form-select" id="bank" name="bank">
                              <option selected="" disabled="" value="">Pilih Bank Akun</option>
                          </select>
                      </div>
                      <!-- NOMOR REKENING -->
                      <div class="col-4 position-relative"> 
                          <label class="form-label" for="norek">Nomor Rekening</label>
                          <input class="form-control" id="norek" name="norek" type="number" placeholder="Input Nomor Rekening" aria-label="NomorRekening">
                      </div>
                      <!-- Masukkan Gaji Karyawan -->
                      <div class="col-md-4 position-relative">
                        <label class="form-label" for="gaji">Gaji Karyawan</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control" id="gaji" name="gaji" type="text" placeholder="Input Gaji Karyawan" onkeyup="formatRupiah(this)">
                        </div>
                      </div>
                      <!-- Button Tambah Karyawan Baru -->
                      <div class="col-12 position-relative mt-4">
                      <button class="btn btn-primary" type="button" id="addkar">Tambah Karyawan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Form Tambah Karyawan-->
            <!-- Listing Karyawn -->
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h4>List Data Karyawan</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="table-karyawan">
                        <thead>
                          <tr>
                            <th style="min-width: 120px;"><span class="f-light f-w-600">ID KARYAWAN</span></th>
                            <th style="min-width: 180px;"><span class="f-light f-w-600">NAMA KARYAWAN</span></th>
                            <th style="min-width: 120px;"><span class="f-light f-w-600">ROLE</span></th>
                            <th><span class="f-light f-w-600">E-MAIL</span></th>
                            <th><span class="f-light f-w-600">PASSWORD</span></th>
                            <th><span class="f-light f-w-600">STATUS</span></th>
                            <th style="text-align: center;"><span class="f-light f-w-600">AKSI</span></th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Listing Karyawan -->
            <!-- Modal Daftar Kategori -->
            <div class="modal fade" id="DaftarSubKategoriItem" tabindex="-1" role="dialog" aria-labelledby="#DaftarSubKategoriItem" aria-hidden="true">
              <div class="modal-dialog modal-dialog-lg modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="category-pill-modalLabel">Daftar Kategori</h1>
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
          <!-- Container-fluid Ends-->
        </div>
        <!-- End Content -->