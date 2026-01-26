{{-- Modal Input Pegawai --}}
<div class="modal modal-blur fade" id="modal-report" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="form-inputpegawai">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        {{-- Identitas --}}
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="number" name="nik" class="form-control" required>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">NIP</label>
                            <input type="text" name="nip" class="form-control">
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-select">
                                <option value="1">Laki-laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="nohp" class="form-control">
                        </div>

                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>

                        {{-- Nama --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Gelar Depan</label>
                            <input type="text" id="gelar_depan" name="gelar_depan" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Gelar Belakang</label>
                            <input type="text" id="gelar_belakang" name="gelar_belakang" class="form-control">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" readonly>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Nama Panggilan</label>
                            <input type="text" id="nama_panggilan" name="nama_panggilan" class="form-control">
                        </div>

                        {{-- Lahir --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Golongan / MK</label>
                            <input type="text" name="gol_mk" class="form-control">
                        </div>



                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- Kepegawaian --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Awal Masuk</label>
                            <input type="date" name="awal_masuk" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">TMT</label>
                            <input type="date" name="tmt" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">SK PT</label>
                            <input type="date" name="sk_pt" class="form-control">
                        </div>

                        {{-- Pendidikan --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Pendidikan Terakhir</label>
                            <select name="pendidikan_fk" class="form-select">
                                {{-- isi dari tabel pendidikan --}}
                            </select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Program Studi</label>
                            <input type="text" name="program_studi" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Alumni</label>
                            <input type="text" name="alumni" class="form-control">
                        </div>

                        {{-- Status --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Status Pegawai</label>
                            <select name="status_pegawaifk" class="form-select">
                                {{-- CP / PT / PK / PP --}}
                            </select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Status Jabatan Fungsional</label>
                            <select name="tunjangan_fungsional_fk" class="form-select">
                                {{-- tunjangan --}}
                            </select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Status Kawin</label>
                            <select name="status_kawinfk" class="form-select">
                                {{-- dari statuskawin_m --}}
                            </select>
                        </div>

                        {{-- Penempatan --}}
                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Unit Kerja</label>
                            <select name="unitkerja" class="form-select"></select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Formasi</label>
                            <select name="formasi_fk" class="form-select"></select>
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Jabatan</label>
                            <select name="jabatan_fk" class="form-select"></select>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Jenis Pegawai</label>
                            <select name="jenispegawai_fk" class="form-select"></select>
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>

                        <input type="hidden" name="statusenabled" value="true">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>
        </div>
    </div>
</div>
{{-- End Modal --}}
