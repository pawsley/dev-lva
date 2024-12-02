            <!-- Modal Tambah Posisi Baru -->
            <div class="modal fade" id="TambahJabatanBaru" tabindex="-1" role="dialog" aria-labelledby="TambahJabatanBaru" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                  <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                      <h3>Tambah Jabatan Baru</h3>
                      <form class="row g-3">
                        <!-- Role Baru -->
                        <div class="col-md-12 position-relative">
                            <label class="form-label" for="jabkar">Jabatan Karyawan</label>
                            <input class="form-control" id="jabkar" name="jabkar" type="text" placeholder="Input Jabatan Karyawan">
                        </div>
                        <!-- Button Simpan -->
                        <div class="col-12">
                          <button class="btn btn-primary" type="button" id="tambahjab">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal Tambah Role Baru -->
            <div class="modal fade" id="TambahRoleBaru" tabindex="-1" role="dialog" aria-labelledby="TambahRoleBaru" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content dark-sign-up">
                    <div class="modal-body social-profile text-start">
                      <div class="modal-toggle-wrapper">
                        <h3>Tambah Role Baru</h3>
                        <form class="row g-3">
                          <!-- Role Baru -->
                          <div class="col-md-12 position-relative">
                              <label class="form-label" for="rolekar">Role Karyawan</label>
                              <input class="form-control" id="rolekar" name="rolekar" type="text" placeholder="Input Role Karyawan">
                          </div>
                          <!-- Button Simpan -->
                          <div class="col-12">
                            <button class="btn btn-primary" type="button" id="tambahrole">Simpan Perubahan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- Modal Edit Karyawan -->
            <div class="modal fade bd-example-modal-xl" id="EditMasterKaryawan" tabindex="-1" role="dialog" aria-labelledby="EditMasterKaryawan" aria-hidden="true">
              <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content dark-sign-up">
                  <div class="modal-body social-profile text-start">
                    <div class="modal-toggle-wrapper">
                      <div class="modal-header mb-4">
                          <h3>Edit Master Data Karyawan</h3>
                          <button class="btn-close py-0" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form class="row g-3">
                        <!-- ID Karyawan -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_id">ID Karyawan</label>
                          <input class="form-control" id="e_id" name="e_id" type="text" placeholder="DHEMP-0001" required="" readonly>
                          <div class="valid-tooltip">Looks good!</div>
                        </div>
                        <!-- Nama Karyawan -->
                        <div class="col-md-6 position-relative">
                            <label class="form-label" for="e_nl">Nama Karyawan</label>
                            <input class="form-control" id="e_nl" name="e_nl" type="text" placeholder="Masukkan Nama Karyawan" required="">
                        </div>
                        <!-- Tanggal Lahir -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_tl">Tanggal Lahir</label>
                          <input class="form-control digits" id="e_tl" name="e_tl" type="date">
                        </div>
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_jk">Jenis Kelamin</label>
                            <select class="form-select" id="e_jk" name="e_jk" required="">
                                <option selected="" disabled="" value="">Pilih Jenis Kelamin ...</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!-- Alamat Email Karyawan -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_email">Alamat Email</label>
                          <input class="form-control" id="e_email" name="e_email" type="email" placeholder="ex : karyawan@email.com" required="">
                        </div>
                        <!-- Alamat Password Karyawan -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_password">Password Akses</label>
                          <input class="form-control" id="e_password" name="e_password" type="text" placeholder="Buat Password Karyawan" required="">
                        </div>
                        <!-- Provinsi -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="ex_prov">Provinsi </label>
                          <input class="form-control" id="ex_prov" name="ex_prov" type="text"required="">
                        </div>
                        <!-- Kabupaten / Kota -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="ex_kab">Kota / Kabupaten</label>
                          <input class="form-control" id="ex_kab" name="ex_kab" type="text"required="">
                        </div>
                        <!-- Kecamatan -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="ex_kec">Kecamatan</label>
                          <input class="form-control" id="ex_kec" name="ex_kec" type="text" required="">
                        </div>
                        <!-- Kode Pos -->
                        <div class="col-md-6 position-relative">
                            <label class="form-label" for="e_kode">Kode Pos </label>
                            <input class="form-control" id="e_kode" name="e_kode" type="number" placeholder="contoh: 60293">
                            <div class="invalid-tooltip">Isi Kode Pos</div>
                        </div>
                        <!-- Detai Alamat -->
                        <div class="col-md-12 position-relative">
                          <label class="form-label" for="e_alamat">Detail Alamat</label>
                          <input class="form-control" id="e_alamat" name="e_alamat" type="text" placeholder="contoh: Jl. Tamtama No 19"  required="">
                        </div>
                        <!-- Nomor Telpone -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_wa">Nomor Whatsapp</label>
                          <div class="input-group has-validation">
                              <input class="form-control" id="e_wa" name="e_wa" type="text" oninput="formatPhoneNumber(this)" placeholder="contoh: +6281220812206" required="">
                          </div>
                        </div>
                        <!-- Upload CV -->
                        <div class="col-md-6 position-relative"> 
                            <input class="form-control" type="hidden" id="oldfile" name="oldfile" readonly>
                            <label class="form-label" for="e_filecv">Upload Curiculum Vitae</label>
                            <input class="form-control" id="e_filecv" name="e_filecv" type="file" accept=".pdf">
                            <a id="filecv_filename" href="#" target="_blank">
                              <span id="filecv"></span>
                            </a>
                          <div class="valid-tooltip">Max ukuran 10Mb</div>
                        </div>
                        <!-- Pilih Role -->
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="e_role">Role Karyawan</label>
                          <select class="form-select" id="e_role" name="e_role" required="">
                            <option selected="" disabled="">Pilih Role Karyawan ...</option>
                          </select>
                        </div>
                        <div class="col-md-6 position-relative">
                          <label class="form-label" for="etg">Jenis Gaji</label>
                          <select class="form-select" id="etg" name="etg">
                            <option selected="" disabled="" value="">Pilih Jenis Gaji Karyawan ...</option>
                            <option value="BULANAN">BULANAN (Gaji Dibayar Dalam Tempo Bulanan)</option>
                            <option value="BORONGAN">BORONGAN (Gaji Dibayar Per Project Selesai)</option>
                          </select>
                        </div>
                        <!-- BANK AKUN -->
                        <div class="col-md-4 position-relative"> 
                            <label class="form-label" for="ebank">Akun Bank</label>
                            <select class="form-select" id="ebank" name="ebank">
                                <option selected="" disabled="" value="">Pilih Bank Akun</option>
                            </select>
                        </div>
                        <!-- NOMOR REKENING -->
                        <div class="col-md-4 position-relative"> 
                            <label class="form-label" for="enorek">Nomor Rekening</label>
                            <input class="form-control" id="enorek" name="enorek" type="number" placeholder="Input Nomor Rekening" aria-label="NomorRekening">
                        </div>                        
                        <!-- Masukkan Gaji Karyawan -->
                        <div class="col-md-4 position-relative">
                          <label class="form-label" for="e_gaji">Gaji Karyawan</label>
                          <div class="input-group has-validation">
                              <span class="input-group-text">Rp</span>
                              <input class="form-control" id="e_gaji" name="e_gaji" type="text" onkeyup="formatRupiah(this)" required="">
                          </div>
                        </div>
                        <!-- Status Karyawan -->
                        <div class="col-md-12 position-relative">
                            <label class="form-label" for="e_status">Status Karyawan</label>
                            <select class="form-select" id="e_status" name="e_status" required="">
                                <option value="1">Aktif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                        <!-- Button Simpan -->
                        <div class="col-12">
                          <button class="btn btn-primary" type="button" id="update" data-bs-dismiss="modal">Simpan Perubahan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>