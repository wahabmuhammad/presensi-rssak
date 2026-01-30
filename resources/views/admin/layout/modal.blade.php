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
                                    {{-- <li class="nav-item ms-auto" role="presentation">
                                        <a href="#tabs-settings-1" class="nav-link" title="Settings"
                                            data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                                            role="tab"><!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                                </path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            </svg></a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-gaji-pokok-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Jabatan</th>
                                                            <th rowspan="3">Ijazah</th>
                                                            <th rowspan="3">Awal Masuk Kerja</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th colspan="2">SK Terakhir</th>
                                                            <th rowspan="3">Jenis Kelamin</th>
                                                            <th rowspan="3">Status & Jabatan</th>
                                                            <th rowspan="3">Status Perkawinan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
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
                                                            <th>TMT</th>
                                                            <th>4%</th>
                                                            <th>JHT</th>
                                                            <th>JKK</th>
                                                            <th>JKM</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th>3,7%</th>
                                                            <th>0,24%</th>
                                                            <th>0,3%</th>
                                                            <th>2%</th>
                                                            <th>6,24%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
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
                                                            <th>TMT</th>
                                                            <th>Pegawai</th>
                                                            <th>Anak Ke-4</th>
                                                            <th>Ortu / Mertua</th>
                                                            <th>BPJS KS</th>
                                                            <th>JHT</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>1%</th>
                                                            <th>1%</th>
                                                            <th>1%%</th>
                                                            <th>....</th>
                                                            <th>2%</th>
                                                            <th>1%</th>
                                                            <th>3%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
<div class="modal modal-blur fade" id="modal-aturan-gaji" tabindex="-1" aria-hidden="true">
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
                                    {{-- <li class="nav-item ms-auto" role="presentation">
                                        <a href="#tabs-settings-1" class="nav-link" title="Settings"
                                            data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                                            role="tab"><!-- Download SVG icon from http://tabler.io/icons/icon/settings -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-1">
                                                <path
                                                    d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                                </path>
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            </svg></a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tabs-gaji-pokok-1" role="tabpanel">
                                        <div class="card">
                                            <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                                                <table
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
                                                    <thead>
                                                        <tr>
                                                            <th rowspan="3">No</th>
                                                            <th rowspan="3">NIP</th>
                                                            <th rowspan="3">Jabatan</th>
                                                            <th rowspan="3">Ijazah</th>
                                                            <th rowspan="3">Awal Masuk Kerja</th>
                                                            <th rowspan="3">Nama Lengkap</th>
                                                            <th rowspan="3">Status Pegawai</th>
                                                            <th colspan="2">SK Terakhir</th>
                                                            <th rowspan="3">Jenis Kelamin</th>
                                                            <th rowspan="3">Status & Jabatan</th>
                                                            <th rowspan="3">Status Perkawinan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
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
                                                            <th>TMT</th>
                                                            <th>4%</th>
                                                            <th>JHT</th>
                                                            <th>JKK</th>
                                                            <th>JKM</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th>3,7%</th>
                                                            <th>0,24%</th>
                                                            <th>0,3%</th>
                                                            <th>2%</th>
                                                            <th>6,24%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
                                                    class="table table-selectable card-table table-vcenter text-nowrap datatable">
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
                                                            <th>TMT</th>
                                                            <th>Pegawai</th>
                                                            <th>Anak Ke-4</th>
                                                            <th>Ortu / Mertua</th>
                                                            <th>BPJS KS</th>
                                                            <th>JHT</th>
                                                            <th>JP</th>
                                                            <th>BPJS TK</th>
                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th>1%</th>
                                                            <th>1%</th>
                                                            <th>1%%</th>
                                                            <th>....</th>
                                                            <th>2%</th>
                                                            <th>1%</th>
                                                            <th>3%</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tablePegawai">
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
