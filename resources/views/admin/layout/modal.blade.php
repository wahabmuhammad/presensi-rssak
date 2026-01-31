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
                            <label class="form-label">Pengakuan Pendidikan</label>
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

{{-- Modal Edit Pegawai --}}
<div class="modal modal-blur fade" id="modal-edit-pegawai" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="PUT" id="form-editpegawai">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        {{-- Identitas --}}
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="number" name="nik" class="form-control" required>
                            <input type="hidden" name="id_pegawai" id="id_pegawai">
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
                            <input type="text" id="editgelar_depan" name="gelar_depan" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="text" id="editnama_pegawai" name="nama_pegawai" class="form-control">
                        </div>

                        <div class="col-lg-4 mb-3">
                            <label class="form-label">Gelar Belakang</label>
                            <input type="text" id="editgelar_belakang" name="gelar_belakang"
                                class="form-control">
                        </div>

                        <div class="col-lg-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" id="editnama_lengkap" name="nama_lengkap" class="form-control"
                                readonly>
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
                            <label class="form-label">Pengakuan Pendidikan</label>
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

{{-- Modal input komponen gaji --}}
<div class="modal modal-blur fade" id="modal-komponen-gaji" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Komponen Gaji Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="form-inputgajipegawai">
                @csrf
                <div class="modal-body" id="modalBodyTop">
                    <div class="row">

                        {{-- Identitas --}}
                        {{-- <div class="col-lg-3 mb-3">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="hidden" name="idpegawai" id="idpegawai">
                            <input type="number" name="namapegawai" class="form-control" required>
                        </div> --}}
                        <div class="col-lg-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" name="namapegawai" id="namapegawai"
                                    class="form-control @error('namapegawai') is-invalid @enderror"
                                    placeholder="Nama Pegawai">
                                <input type="hidden" name="pegawai_fk" id="idpegawai">
                                <!-- Suggestions will appear here -->
                                <div class="card">
                                    <ul id="suggestionsList" class="list-group" style="display: none;"></ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">PGPNS</label>
                            <input type="text" name="pgpns" class="form-control">
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Tahun PGPNS</label>
                            <input type="text" name="tahunpgpns" class="form-control">
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Dasar Iur BPJS Kesehatan</label>
                            <input type="text" name="dasarbpjsks" class="form-control">
                        </div>

                        {{-- Nama --}}
                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Dasar Iur BPJS TenagaKejra</label>
                            <input type="text" id="dasarbpjstk" name="dasarbpjstk" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="modalBodyBottom">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-gaji-pokok-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-selected="true" role="tab">Gaji Pegawai</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-bpjsrsa-1" class="nav-link" data-bs-toggle="tab"
                                            aria-selected="false" tabindex="-1" role="tab">BPJS yang ditanggung
                                            RS</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-bpjspegawai-1" class="nav-link" data-bs-toggle="tab"
                                            aria-selected="false" tabindex="-1" role="tab">BPJS yang ditanggung
                                            Pegawai</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-gaji-pokok-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">Jabatan</th>
                                                            <th colspan="1">Awal Masuk Kerja</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th colspan="2">SK Terakhir</th>
                                                            <th rowspan="3">Jenis Kelamin</th>
                                                            <th colspan="3">Status & Jabatan</th>
                                                            <th rowspan="3">PGPNS</th>
                                                            <th colspan="1">PGPNS 2024</th>
                                                            <th rowspan="3">Gaji Pokok</th>
                                                        </tr>
                                                        <tr>
                                                            <th>TMT</th>
                                                            <th>Gol & Masa Kerja</th>
                                                            <th>TMT</th>
                                                            <th>ST</th>
                                                            <th>FS</th>
                                                            <th>MK Ke</th>
                                                            <th>100%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablegajiPegawai">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-bpjsrsa-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">GOL / MK</th>
                                                            <th colspan="1">Awal Masuk RSA</th>
                                                            {{-- <th rowspan="3">TMT</th> --}}
                                                            <th rowspan="3">SK PT</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                KS</th>

                                                            <th colspan="1">BPJS KS</th>

                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                TK</th>

                                                            <th colspan="5">BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="2">TMT</th>
                                                            <th rowspan="2">4%</th>
                                                            <th>JHT</th>
                                                            <th>JKK</th>
                                                            <th>JKM</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th>3,7%</th>
                                                            <th>0,24%</th>
                                                            <th>0,3%</th>
                                                            <th>2%</th>
                                                            <th>6,24%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablebpjsRSA">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-bpjspegawai-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">GOL / MK</th>
                                                            <th colspan="1">Awal Masuk RSA</th>
                                                            {{-- <th rowspan="3">TMT</th> --}}
                                                            <th rowspan="3">SK PT</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                KS</th>
                                                            <th colspan="4">BPJS KS</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                TK</th>
                                                            <th colspan="3">BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="2">TMT</th>
                                                            <th>Pegawai</th>
                                                            <th>Anak Ke-4</th>
                                                            <th>Ortu / Mertua</th>
                                                            <th>BPJS KS</th>
                                                            <th>JHT</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th>1%</th>
                                                            <th>1%</th>
                                                            <th>1%%</th>
                                                            <th>....</th>
                                                            <th>2%</th>
                                                            <th>1%</th>
                                                            <th>3%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablebpjsPegawai">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane" id="tabs-settings-1" role="tabpanel">
                                        <h4>Settings tab</h4>
                                        <div>
                                            Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet,
                                            facilisi sit mauris accumsan nibh habitant senectus
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
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

{{-- Modal Edit Komponen Gaji --}}
<div class="modal modal-blur fade" id="modal-editkomponen-gaji" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-full-width modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Komponen Gaji Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="" method="POST" id="form-editgajipegawai">
                @csrf
                <div class="modal-body" id="modalBodyTop">
                    <div class="row">

                        {{-- Identitas --}}
                        {{-- <div class="col-lg-3 mb-3">
                            <label class="form-label">Nama Pegawai</label>
                            <input type="hidden" name="idpegawai" id="idpegawai">
                            <input type="number" name="namapegawai" class="form-control" required>
                        </div> --}}
                        <div class="col-lg-3">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Nama Pegawai</label>
                                <input type="text" name="namapegawai" id="namapegawai"
                                    class="form-control @error('namapegawai') is-invalid @enderror"
                                    placeholder="Nama Pegawai" readonly>
                                <input type="hidden" name="pegawai_fk" id="idpegawai">
                                <input type="hidden" name="id_komponengaji" id="id_komponengaji">
                                {{-- <!-- Suggestions will appear here -->
                                <div class="card">
                                    <ul id="suggestionsList" class="list-group" style="display: none;"></ul>
                                </div> --}}
                            </div>
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">PGPNS</label>
                            <input type="text" name="pgpns" class="form-control">
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Tahun PGPNS</label>
                            <input type="text" name="tahunpgpns" class="form-control">
                        </div>

                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Dasar Iur BPJS Kesehatan</label>
                            <input type="text" name="dasarbpjsks" class="form-control">
                        </div>

                        {{-- Nama --}}
                        <div class="col-lg-2 mb-3">
                            <label class="form-label">Dasar Iur BPJS TenagaKejra</label>
                            <input type="text" id="dasarbpjstk" name="dasarbpjstk" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="modalBodyBottom">
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-gaji-pokok-1" class="nav-link active" data-bs-toggle="tab"
                                            aria-selected="true" role="tab">Gaji Pegawai</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-bpjsrsa-1" class="nav-link" data-bs-toggle="tab"
                                            aria-selected="false" tabindex="-1" role="tab">BPJS yang ditanggung
                                            RS</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a href="#tabs-bpjspegawai-1" class="nav-link" data-bs-toggle="tab"
                                            aria-selected="false" tabindex="-1" role="tab">BPJS yang ditanggung
                                            Pegawai</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-gaji-pokok-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">Jabatan</th>
                                                            <th colspan="1">Awal Masuk Kerja</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th colspan="2">SK Terakhir</th>
                                                            <th rowspan="3">Jenis Kelamin</th>
                                                            <th colspan="3">Status & Jabatan</th>
                                                            <th rowspan="3">PGPNS</th>
                                                            <th colspan="1">PGPNS 2024</th>
                                                            <th rowspan="3">Gaji Pokok</th>
                                                        </tr>
                                                        <tr>
                                                            <th>TMT</th>
                                                            <th>Gol & Masa Kerja</th>
                                                            <th>TMT</th>
                                                            <th>ST</th>
                                                            <th>FS</th>
                                                            <th>MK Ke</th>
                                                            <th>100%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablegajiPegawai">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-bpjsrsa-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">GOL / MK</th>
                                                            <th colspan="1">Awal Masuk RSA</th>
                                                            {{-- <th rowspan="3">TMT</th> --}}
                                                            <th rowspan="3">SK PT</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                KS</th>

                                                            <th colspan="1">BPJS KS</th>

                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                TK</th>

                                                            <th colspan="5">BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="2">TMT</th>
                                                            <th rowspan="2">4%</th>
                                                            <th>JHT</th>
                                                            <th>JKK</th>
                                                            <th>JKM</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th>3,7%</th>
                                                            <th>0,24%</th>
                                                            <th>0,3%</th>
                                                            <th>2%</th>
                                                            <th>6,24%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablebpjsRSA">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-bpjspegawai-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-bordered table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">GOL / MK</th>
                                                            <th colspan="1">Awal Masuk RSA</th>
                                                            {{-- <th rowspan="3">TMT</th> --}}
                                                            <th rowspan="3">SK PT</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                KS</th>
                                                            <th colspan="4">BPJS KS</th>
                                                            <th rowspan="3" class="vertical">Dasar Perhitungan BPJS
                                                                TK</th>
                                                            <th colspan="3">BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th rowspan="2">TMT</th>
                                                            <th>Pegawai</th>
                                                            <th>Anak Ke-4</th>
                                                            <th>Ortu / Mertua</th>
                                                            <th>BPJS KS</th>
                                                            <th>JHT</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th>1%</th>
                                                            <th>1%</th>
                                                            <th>1%%</th>
                                                            <th>....</th>
                                                            <th>2%</th>
                                                            <th>1%</th>
                                                            <th>3%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablebpjsPegawai">
                                                        {{-- Data akan dimuat di sini melalui AJAX --}}
                                                    </tbody>
                                                </table>
                                                {{-- {{ $userTable->withQueryString()->links() }} --}}
                                                {{-- Loading Animate --}}
                                                <div id="loading" style="display:none;">
                                                    <div class="container container-slim py-4">
                                                        <div class="text-center">
                                                            <div class="text-secondary mb-3">Memuat Data</div>
                                                            <div class="progress progress-sm">
                                                                <div class="progress-bar progress-bar-indeterminate">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane" id="tabs-settings-1" role="tabpanel">
                                        <h4>Settings tab</h4>
                                        <div>
                                            Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet,
                                            facilisi sit mauris accumsan nibh habitant senectus
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
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

{{-- Modal Input Aturan Gaji Pegawai --}}
<div class="modal modal-blur fade" id="modal-aturan-gaji" tabindex="-1">
    <div class="modal-dialog modal-full-width modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Aturan Komponen Gaji Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                    <li class="nav-item">
                        <a href="#tab-status-pangan" class="nav-link active" data-bs-toggle="tab">
                            Status & Pangan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-fungsional" class="nav-link" data-bs-toggle="tab">
                            Tunjangan Fungsional
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-jabatan" class="nav-link" data-bs-toggle="tab">
                            Tunjangan Jabatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-kinerja" class="nav-link" data-bs-toggle="tab">
                            Tunjangan Kinerja
                        </a>
                    </li>
                </ul>

                <div class="tab-content mt-3">

                    {{-- TAB 1 Status Pangan --}}
                    <div class="tab-pane active show" id="tab-status-pangan">
                        <form id="formStatusPangan">
                            @csrf
                            <input type="hidden" name="id" id="pangan_id">

                            <div class="modal-body row">

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Kode</label>
                                    <input type="text" name="kode" class="form-control">
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Status</label>
                                    <input type="text" name="status" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tunj. Suami / Istri</label>
                                    <input type="number" name="tunj_suami" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tunj. Anak</label>
                                    <input type="number" name="tunj_anak" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Tunj. Pangan</label>
                                    <input type="number" name="tunj_pangan" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">PTKP</label>
                                    <input type="number" name="ptkp" class="form-control">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="saveStatusPangan()">Simpan</button>
                            </div>

                        </form>
                    </div>

                    {{-- TAB 2 Tunjangan Fungsional --}}
                    <div class="tab-pane" id="tab-fungsional">
                        <form id="formFungsional">
                            @csrf
                            <input type="hidden" name="id" id="fungsional_id">

                            <div class="modal-body row">

                                <div class="col-md-3 mb-3">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Nama Tunjangan</label>
                                    <input type="text" name="namatunjangan" class="form-control" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>%</label>
                                    <input type="number" step="0.01" name="persen" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Indeks</label>
                                    <input type="number" name="indeks" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Nilai</label>
                                    <input type="number" name="nilai" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>Pembulatan</label>
                                    <select name="pembulatan" class="form-select">
                                        <option value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>MK &lt; 5</label>
                                    <input type="number" name="mk_kurang_5" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>5 ≤ MK &lt; 10</label>
                                    <input type="number" name="mk_5_10" class="form-control">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label>MK ≥ 10</label>
                                    <input type="number" name="mk_10" class="form-control">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="saveFungsional()">Simpan</button>
                            </div>

                        </form>
                    </div>

                    {{-- TAB 3 --}}
                    <div class="tab-pane" id="tab-jabatan">
                        <form id="formJabatan">
                            @csrf
                            <input type="hidden" name="id" id="jabatan_id">

                            <div class="modal-body row">

                                <div class="col-md-4 mb-3">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control">
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label>Nama Jabatan</label>
                                    <input type="text" name="nama_jabatan" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Nominal Tunjangan</label>
                                    <input type="number" name="nominal" class="form-control">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="saveJabatan()">Simpan</button>
                            </div>

                        </form>
                    </div>

                    {{-- TAB 4 --}}
                    <div class="tab-pane" id="tab-kinerja">
                        <form id="formKinerja">
                            @csrf
                            <input type="hidden" name="id" id="kinerja_id">

                            <div class="modal-body row">

                                <div class="col-md-4 mb-3">
                                    <label>Kode</label>
                                    <input type="text" name="kode" class="form-control">
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label>Nama Jabatan</label>
                                    <input type="text" name="nama_jabatan" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Nominal Tunjangan</label>
                                    <input type="number" name="nominal" class="form-control">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-link" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="saveKinerja()">Simpan</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

{{-- End Modal --}}
