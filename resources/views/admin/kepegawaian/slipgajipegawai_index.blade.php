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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39" />
                                </svg>
                                Edit Komponen Gaji
                            </button>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-csv">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                    <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" />
                                    <path
                                        d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                                    <path d="M16 15l2 6l2 -6" />
                                </svg>
                                Tambah Komponen Gaji
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
                    <div class="d-flex">
                        <div class="text-secondary">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm" value="8" size="3"
                                    aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-secondary">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="search" value="" class="form-control" placeholder="Search…"
                                        name="search" aria-label="Search in website" id="search">
                                    <button class="btn btn-primary" type="submit">
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
                                <th rowspan="3">Tarif Kinerja</th>
                                <th rowspan="3">Hari Masuk</th>
                                <th rowspan="3">Total Tunjangan Kinerja</th>
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
                                <th> BPJS KS-RSSA</th>
                                <th> BPJS KS-Pegawai</th>
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
            function loadData(page = 1) {
                $.ajax({
                    url: '{{ url('/slip-gaji-get-data?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading").show();
                    },
                    success: function(response) {
                        console.log(response);
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
                            html += '<td>' + item.nama_jabatan + '</td>';
                            html += '<td>' + item.tmt_formatted + '</td>';
                            html += '<td>' + (item.status_kerja ?? '-') + '</td>';
                            html += '<td>' + (item.gol_mk ?? '-') + '</td>';
                            html += '<td>' + (item.sk_pt_formatted ?? '-') + '</td>';
                            html += '<td>' + (item.jenis_kelamin_text ?? '-') + '</td>';
                            html += '<td>' + (item.statuskawin ?? '-') + '</td>';
                            html += '<td>' + (item.kode_fungsional ?? '-') + '</td>';
                            html += '<td>' + (item.masakerja ?? '-') + '</td>';
                            html += '<td>' + (item.pgpns ?? '-') + '</td>';
                            html += '<td>' + (item.pgpns ?? '-') + '</td>';
                            html += '<td>' + (item.gaji_pokok ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_pasangan ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_anak ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_pangan ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_fungsional ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_jabatan ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_kinerja ?? '-') + '</td>';
                            html += '<td><input type="number" class="form-control tunjangan" value=""></td>';
                            html += '<td><input type="number" class="form-control tunjangan" value="" id="totalTunjanganKinerja" readonly></td>';
                            html += '<td>' + (item.bpjs_kesehatan ?? '-') + '</td>';
                            html += '<td>' + (item.bpjs_ketenagakerjaan ?? '-') + '</td>';
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
            loadData();
        });
    </script>
@endsection
