@extends('admin.layout.masterLayout')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    @if ($errors->any())
                        <div class="alert alert-outline-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Administrator
                        </div>
                        <h2 class="page-title">
                            Data Slip Gaji Pegawai
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block" id="editKomponenGaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-printer"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><path d="M7 15a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2l0 -4" /></svg>
                                Cetak Slip Gaji
                            </button>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-send"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 14l11 -11" /><path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                                Kirim Slip Gaji
                            </button>
                            {{-- <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji" aria-label="Buat User Baru">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Daftar Pegawai</h3>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="row d-flex">
                        <div class="col text-secondary">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm" value="8" size="3"
                                    aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="col-md-2 text-secondary">
                            <label class="form-label" for="date_to">Status Pegawai</label>
                            <div class="input-group">
                                <select id="status_pegawaifk" name="status_pegawaifk" class="form-select">
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 text-secondary">
                            <label class="form-label" for="date_to">Periode Gaji</label>
                            <div class="input-group">
                                <input type="month" id="periodegaji" value=""
                                    class="form-control" placeholder="" name="periodegaji" aria-label="Search in website">
                                <span class="input-group-text" id="basic-addon1">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-calendar-filled" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M16 2a1 1 0 0 1 .993 .883l.007 .117v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 1.993 -.117l.007 .117v1h6v-1a1 1 0 0 1 1 -1zm3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16v-9.625z"
                                            stroke-width="0" fill="currentColor"></path>
                                        <path
                                            d="M12 12a1 1 0 0 1 .993 .883l.007 .117v3a1 1 0 0 1 -1.993 .117l-.007 -.117v-2a1 1 0 0 1 -.117 -1.993l.117 -.007h1z"
                                            stroke-width="0" fill="currentColor"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-2 text-secondary">
                            <label class="form-label" for="search">Search</label>
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="search" value="" class="form-control" placeholder="Search…"
                                        name="search" aria-label="Search in website" id="search">
                                    <button class="btn btn-primary" type="button" id="button-search">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
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
                                <th rowspan="3">Tunjangan Pasangan</th>
                                <th rowspan="3">Tunjangan Anak</th>
                                <th rowspan="3">Tunjangan Pangan</th>
                                <th rowspan="3">Tunjangan Fungsional</th>
                                <th rowspan="3">Tunjangan Jabatan</th>
                                <th rowspan="3">Tunjangan Kinerja</th>
                                <th colspan="1">BPJS KS</th>
                                <th colspan="1">BPJS TK</th>
                                <th rowspan="3">Jumlah</th>
                                <th colspan="2">Lembur Biasa</th>
                                <th colspan="2">Lembur Hari Raya</th>
                                <th rowspan="3">Jumlah Lembur</th>
                                <th rowspan="3">Jumlah Gaji</th>
                                <th rowspan="3">Jumlah Gaji yang Dipotong Lazismu</th>
                                <th colspan="15">Potongan</th>
                                <th rowspan="3">Jumlah Potongan</th>
                                <th colspan="2">Sisa Gaji</th>
                                <th rowspan="3">Penerimaan Rekening</th>
                            </tr>
                            <tr>
                                <th rowspan="2">TMT</th>
                                <th rowspan="2">Gol & Masa Kerja</th>
                                <th rowspan="2">TMT</th>
                                <th rowspan="2">ST</th>
                                <th rowspan="2">FS</th>
                                <th rowspan="2">MK Ke</th>
                                <th rowspan="2">100%</th>
                                <th rowspan="2">4%</th>
                                <th rowspan="2">6,24%</th>
                                <th rowspan="2">Jam</th>
                                <th rowspan="2">Tarif</th>
                                <th rowspan="2">Jam</th>
                                <th rowspan="2">Tarif</th>
                                <th colspan="1">Lazismu</th>
                                <th rowspan="2">Obat dan Periksa</th>
                                <th rowspan="2">Koperasi</th>
                                <th rowspan="2">Aisyiyah</th>
                                <th rowspan="2">PAY</th>
                                <th rowspan="2">Kas Unit</th>
                                <th rowspan="2">PPNI</th>
                                <th rowspan="2">IBI</th>
                                <th rowspan="2">Lain-Lain</th>
                                <th colspan="2">BPJS KS</th>
                                <th colspan="2">BPJS TK</th>
                                <th rowspan="2">PPH 21</th>
                                <th rowspan="2">Kretab</th>
                                <th rowspan="2">Sisa Gaji</th>
                                <th rowspan="2">Pembulatan</th>
                            </tr>
                            <tr>
                                <th rowspan="3">TMP</th>
                                <th> BPJS KS-RSSA</th>
                                <th> BPJS KS-Pegawai</th>
                                <th> BPJS TK-RSSA</th>
                                <th> BPJS TK-Pegawai</th>
                            </tr>
                        </thead>
                        <tbody id="tablePegawai">
                            {{-- diisi dengan ajax --}}
                        </tbody>
                    </table>
                    <div id="loading" style="display:none;">
                        <div class="container container-slim py-4">
                            <div class="text-center">
                                {{-- <div class="mb-3">
                                    <a href="." class="navbar-brand navbar-brand-autodark"><img
                                            src="./static/logo-small.svg" height="36" alt=""></a>
                                </div> --}}
                                <div class="text-secondary mb-3">Memuat Data</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-indeterminate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pagination-links" id="pagination-links">
                        {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function inputNumber(className, value, readonly = false) {
                return '<td class="col-angka">' +
                    '<input type="text" name="' + className + '" class="form-control ' + className +
                    '" value="' + (value ?? 0) + '" ' + (readonly ? 'readonly' : '') + '>' +
                    '</td>';
            }
            function formatRupiah(value) {
                if (value === null || value === undefined || value === '-') return '-';
                return parseInt(value).toLocaleString('id-ID');
            }

            if ($('#periodegaji').val() === '') {

                let now = new Date();
                let year = now.getFullYear();
                let month = ("0" + (now.getMonth() + 1)).slice(-2);

                let currentMonth = year + '-' + month;

                $('#periodegaji').val(currentMonth);
            }

            function loadData(page = 1) {
                $.ajax({
                    url: '{{ url('/slip-gaji-get-data?page=') }}' + page,
                    method: 'GET',
                    data: {
                        keyword: $('#search').val(),
                        periodegaji: $('#periodegaji').val(),
                        status_pegawaifk: $('#status_pegawaifk').val(),
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            10;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id_komponengaji +
                                '">';

                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.nip + '</td>';
                            html += '<td>' + item.nama_lengkap + '</td>';
                            html += '<td>' + item.namajabatan + '</td>';
                            html += '<td>' + item.tmt + '</td>';
                            html += '<td>' + (item.status_kerja ?? '-') + '</td>';
                            html += '<td>' + (item.gol_mk ?? '-') + '</td>';
                            html += '<td>' + (item.sk_pt ?? '-') + '</td>';
                            html += '<td>' + (item.jenis_kelamin ?? '-') + '</td>';
                            html += '<td>' + (item.statuskawin ?? '-') + '</td>';
                            html += '<td>' + (item.kode_fungsional ?? '-') + '</td>';
                            html += '<td>' + (item.masakerja ?? '-') + '</td>';
                            html += '<td> Rp ' + (item.pgpns ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.pgpns ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.gaji_pokok ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_pasangan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_anak ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_pangan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_fungsional ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_jabatan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.tunjangan_kinerja ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_kesehatan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_ketenagakerjaan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.total_gaji_tunjangan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> ' + (item.jam_lembur_biasa ?? '-') + '</td>';
                            html += '<td> Rp ' + (item.tarif_lembur_biasa ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> '+ (item.jam_lembur_raya ?? '-') + '</td>';
                            html += '<td> Rp ' + (item.tarif_lembur_raya ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.jumlah_lembur ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.jumlah_gaji ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.jumlahgajiyangdipotong_lazis ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_lazis?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.obat_periksa ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.kopkar ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_aisyiyah ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_pay ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_kasunit ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_ppni ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_ibi ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_lain ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_ks_rssa ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_ks_pegawai ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_tk_rssa ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.bpjs_tk_pegawai ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.potongan_pph21 ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.kretab ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.jumlah_potongan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.sisa_gaji ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> Rp ' + (item.pembulatan ?? '-').toLocaleString('id-ID') + '</td>';
                            html += '<td> ' + (item.penerimaan_rekening ?? '-') + '</td>';

                            // GAJI POKOK
                            // html += inputNumber('pgpns', item.pgpns, true);
                            // html += inputNumber('pgpns', item.pgpns, true);
                            // html += inputNumber('gaji_pokok', item.gaji_pokok);

                            // // TUNJANGAN LAIN
                            // html += inputNumber('tunjangan_pasangan', item.tunjangan_pasangan);
                            // html += inputNumber('tunjangan_anak', item.tunjangan_anak);
                            // html += inputNumber('tunjangan_pangan', item.tunjangan_pangan);
                            // html += inputNumber('tunjangan_fungsional', item
                            //     .tunjangan_fungsional);
                            // html += inputNumber('tunjangan_jabatan', item.tunjangan_jabatan);

                            // // TARIF TUKIN (dari backend, readonly)
                            // html += inputNumber('tarif_tukin', item.tunjangan_kinerja,
                            //     true);

                            // INPUT HARI
                            // html += inputNumber('hari_tukin', 0);

                            // // HASIL TUKIN
                            // html += inputNumber('tunjangan_kinerja', 0, true);

                            // // BPJS
                            // html += inputNumber('bpjs_kesehatan', item.bpjs_kesehatan);
                            // html += inputNumber('bpjs_ketenagakerjaan', item
                            //     .bpjs_ketenagakerjaan);

                            // // TOTAL GAJI
                            // html += inputNumber('total_gaji', 0, true);
                            // // Lembur
                            // html += inputNumber('jam_lembur_biasa', 0);
                            // html += inputNumber('tarif_lembur_biasa', 0, true);
                            // html += inputNumber('jam_lembur_raya', 0);
                            // html += inputNumber('tarif_lembur_raya', 0, true);

                            html += '</tr>';
                        });
                        $('#tablePegawai').html(html);
                        $('#pagination-links').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading").hide();
                    }
                });
            }

            function searchData(status_pegawaifk, keyword, page = 1) {
                let periode = $('#periodegaji').val();
                console.log(periode); // debug
                $.ajax({

                    url: '{{ url('/slip-gaji-get-data?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        status_pegawaifk: status_pegawaifk,
                        keyword: keyword,
                        periodegaji: $('#periodegaji').val(),
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(response) {
                        let html = '';
                        let startIndex = (page - 1) * 10;

                        response.datas.forEach(function(item, index) {
                            let rowNumber = startIndex + index + 1;

                            html += `
                                <tr>
                                    <td>${rowNumber}</td>
                                    <td>${item.nip ?? '-'}</td>
                                    <td>${item.nama_lengkap ?? '-'}</td>
                                    <td>${item.namajabatan ?? '-'}</td>
                                    <td>${item.tmt ?? '-'}</td>
                                    <td>${item.status_kerja ?? '-'}</td>
                                    <td>${item.gol_mk ?? '-'}</td>
                                    <td>${item.sk_pt ?? '-'}</td>
                                    <td>${item.jenis_kelamin ?? '-'}</td>
                                    <td>${item.statuskawin ?? '-'}</td>
                                    <td>${item.kode_fungsional ?? '-'}</td>
                                    <td>${item.masakerja ?? '-'}</td>
                                    <td>Rp ${item.pgpns?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.pgpns?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.gaji_pokok?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_pasangan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_anak?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_pangan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_fungsional?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_jabatan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.tunjangan_kinerja?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_kesehatan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_ketenagakerjaan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.total_gaji_tunjangan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>${item.jam_lembur_biasa ?? '-'}</td>
                                    <td>Rp ${item.tarif_lembur_biasa?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>${item.jam_lembur_raya ?? '-'}</td>
                                    <td>Rp ${item.tarif_lembur_raya?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.jumlah_lembur?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.jumlah_gaji?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.jumlahgajiyangdipotong_lazis?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_lazis?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.obat_periksa?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.kopkar?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_aisyiyah?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_pay?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_kasunit?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_ppni?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_ibi?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_lain?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_ks_rssa?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_ks_pegawai?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_tk_rssa?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.bpjs_tk_pegawai?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.potongan_pph21?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.kretab?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.jumlah_potongan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.sisa_gaji?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>Rp ${item.pembulatan?.toLocaleString('id-ID') ?? '-'}</td>
                                    <td>${item.penerimaan_rekening ?? '-'}</td>
                                </tr>
                            `;
                        });

                        $('#tablePegawai').html(html);
                        $('#pagination-links').html(response.pagination);
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    },
                    complete: function() {
                        $("#loading").hide();
                    }
                });
            }

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();

                let url = $(this).attr('href');
                let page = new URL(url).searchParams.get('page');

                let keyword = $('#search').val();
                let status = $('#status_pegawaifk').val();

                searchData(status, keyword, page);
            });

            // Klik tombol filter
            $('#button-search').on('click', function() {
                let keyword = $('#search').val();
                let status = $('#status_pegawaifk').val();

                searchData(status, keyword, 1);
            });

            // Enter di keyword
            $('#search').on('keyup', function(e) {
                if (e.key === 'Enter') {
                    let keyword = $(this).val();
                    let status = $('#status_pegawaifk').val();

                    searchData(status, keyword, 1);
                }
            });

            // loadData();
            function loadPegawaiOptions(callback = null) {
                $.get('pegawai/options', function(res) {
                    let htmlStatus = '<option value="">-- Semua --</option>';
                htmlStatus += res.statusPegawai.map(e =>
                    `<option value="${e.id}">${e.status_kerja}</option>`
                ).join('');

                $('select[name=status_pegawaifk]').html(htmlStatus);
                    if (callback) callback();
                });
            }
            loadPegawaiOptions();
            loadData();
        });
        // Trigger jika ada perubahan input dalam table
        // $(document).on('input',
        //     '.hari_tukin, .gaji_pokok, .tunjangan_pasangan, .tunjangan_anak, .tunjangan_pangan, .tunjangan_fungsional, .tunjangan_jabatan, .bpjs_kesehatan, .bpjs_ketenagakerjaan, .jam_lembur_biasa, .jam_lembur_raya',
        //     function() {

        //         let row = $(this).closest('tr');

        //         // ======================
        //         // HITUNG TUNJANGAN KINERJA
        //         // ======================
        //         let hari = parseFloat(row.find('.hari_tukin').val()) || 0;
        //         let tarif = parseFloat(row.find('.tarif_tukin').val()) || 0;

        //         let totalTukin = hari * tarif;

        //         row.find('.tunjangan_kinerja').val(totalTukin);

        //         // ======================
        //         // HITUNG TOTAL GAJI
        //         // ======================

        //         let gajiPokok = parseFloat(row.find('.gaji_pokok').val()) || 0;
        //         let pasangan = parseFloat(row.find('.tunjangan_pasangan').val()) || 0;
        //         let anak = parseFloat(row.find('.tunjangan_anak').val()) || 0;
        //         let pangan = parseFloat(row.find('.tunjangan_pangan').val()) || 0;
        //         let fungsional = parseFloat(row.find('.tunjangan_fungsional').val()) || 0;
        //         let jabatan = parseFloat(row.find('.tunjangan_jabatan').val()) || 0;

        //         let bpjsKes = parseFloat(row.find('.bpjs_kesehatan').val()) || 0;
        //         let bpjsKet = parseFloat(row.find('.bpjs_ketenagakerjaan').val()) || 0;

        //         let jamlemburbiasa = parseFloat(row.find('.jam_lembur_biasa').val()) || 0;
        //         let tariflemburBiasa = jamlemburbiasa * 2 * 1 / 173 * gajiPokok;
        //         parseFloat(row.find('.tarif_lembur_biasa').val(tariflemburBiasa)) || 0;


        //         let totalGaji =
        //             gajiPokok +
        //             pasangan +
        //             anak +
        //             pangan +
        //             fungsional +
        //             jabatan +
        //             totalTukin +
        //             bpjsKes +
        //             bpjsKet;

        //         row.find('.total_gaji').val(totalGaji);
        //     });
    </script>
@endsection
