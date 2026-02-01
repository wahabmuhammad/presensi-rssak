@extends('admin.layout.masterLayout')
@section('content')
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-12">
                <div class="row row-cards">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-header">
                                <a class="card-title">Indeks Tunjangan Fungsional</a>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span
                                            class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler.io/icons/icon/currency-dollar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                                <path
                                                    d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2">
                                                </path>
                                                <path d="M12 3v3m0 12v3"></path>
                                            </svg></span>
                                    </div>
                                    <div class="col">
                                        <div class="font-weight-medium">Tarif: 10.000</div>
                                        <div class="text-secondary">Indeks: 50</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            Data Pegawai
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-aturan-gaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                </svg>
                                Tambah Komponen Tunjangan Gaji
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Status dan Tunjangan Pangan --}}
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header py-0">
                    <h3 class="card-tittle">Status dan Tunjangan Pangan</h3>
                </div>
                <div class="card-body border-bottom py-2">
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
                            <form action="{{ url('user') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                        placeholder="Search…" name="search" aria-label="Search in website"
                                        id="searchStatusTunjanganPangan">
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
                <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                    <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Tunjangan Suami / Istri</th>
                                <th>Tunjangan Anak</th>
                                <th>Tunjangan Pangan</th>
                                <th>PTKP</th>
                            </tr>
                        </thead>
                        <tbody id="tableTunjanganPangan">
                            {{-- Data akan dimuat di sini melalui AJAX --}}
                        </tbody>
                    </table>
                    {{-- {{ $userTable->withQueryString()->links() }} --}}
                    {{-- Loading Animate --}}
                    <div id="loading-tunjangan-pangan" style="display:none;">
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
                    <div class="pagination-links" id="pagination-links-tunjangan-pangan">
                        {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- Tunjangan Fungsional --}}
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header py-0">
                    <h3 class="card-tittle">Tunjangan Fungsional</h3>
                </div>
                <div class="card-body border-bottom py-2">
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
                            <form action="{{ url('user') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                        placeholder="Search…" name="search" aria-label="Search in website"
                                        id="searchStatusTunjanganFungsional">
                                    <button class="btn btn-primary" type="submit">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                    <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                        <thead>
                            <tr>
                                <th rowspan="3">No</th>
                                <th rowspan="3">Kode</th>
                                <th rowspan="3">Nama Tunjangan</th>
                                <th colspan="3">Tunjangan</th>
                                {{-- <th rowspan="3">Pembulatan</th> --}}
                                <th colspan="1">A</th>
                                <th colspan="1">B</th>
                                <th colspan="1">C</th>
                                <th rowspan="3">Khusus Pegawai Tetap</th>
                                <th rowspan="3">Keterangan</th>
                            </tr>
                            <tr>
                                <th rowspan="2">%</th>
                                <th rowspan="2">Indeks</th>
                                <th rowspan="2">Nilai</th>
                                <th rowspan="2">(MK &lt; 5)</th>
                                <th rowspan="2">(5 &le; MK &lt; 10)</th>
                                <th rowspan="2">(10 &le; MK)</th>
                            </tr>
                        </thead>
                        <tbody id="tableTunjanganFungsional">
                            {{-- Data akan dimuat di sini melalui AJAX --}}
                        </tbody>
                    </table>
                    {{-- {{ $userTable->withQueryString()->links() }} --}}
                    {{-- Loading Animate --}}
                    <div id="loading-tunjangan-fungsional" style="display:none;">
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
                    <div class="pagination-links" id="pagination-links-tunjangan-fungsional">
                        {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Tunjangan Jabatan --}}
            <div class="col-6", style="margin-top: 30px">
                <div class="card">
                    <div class="card-header py-0">
                        <h3 class="card-tittle">Tunjangan Jabatan</h3>
                    </div>
                    <div class="card-body border-bottom py-2">
                        <div class="d-flex">
                            <div class="text-secondary">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" value="8"
                                        size="3" aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-secondary">

                                <form action="{{ url('user') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                            placeholder="Search…" name="search" aria-label="Search in website"
                                            id="searchStatusTunjanganJabatan">
                                        <button class="btn btn-primary" type="submit">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                    <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                        <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nominal Tunjangan</th>
                                    <th>PO</th>
                                    <th>CP</th>
                                </tr>
                            </thead>
                            <tbody id="tableTunjanganJabatan">
                                {{-- Data akan dimuat di sini melalui AJAX --}}
                            </tbody>
                        </table>
                        {{-- {{ $userTable->withQueryString()->links() }} --}}
                        {{-- Loading Animate --}}
                        <div id="loading-tunjangan-jabatan" style="display:none;">
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
                        <div class="pagination-links" id="pagination-links-tunjangan-jabatan">
                            {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tunjangan Kinerja --}}
            <div class="col-6", style="margin-top: 30px">
                <div class="card">
                    <div class="card-header py-0">
                        <h3 class="card-tittle">Tunjangan Kinerja</h3>
                    </div>
                    <div class="card-body border-bottom py-2">
                        <div class="d-flex">
                            <div class="text-secondary">
                                Show
                                <div class="mx-2 d-inline-block">
                                    <input type="text" class="form-control form-control-sm" value="8"
                                        size="3" aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-secondary">

                                <form action="{{ url('user') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                            placeholder="Search…" name="search" aria-label="Search in website"
                                            id="searchStatusTunjanganKinerja">
                                        <button class="btn btn-primary" type="submit">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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
                    <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                        <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nominal Tunjangan</th>
                                    <th>PO</th>
                                    <th>CP</th>
                                </tr>
                            </thead>
                            <tbody id="tableTunjanganKinerja">
                                {{-- Data akan dimuat di sini melalui AJAX --}}
                            </tbody>
                        </table>
                        {{-- {{ $userTable->withQueryString()->links() }} --}}
                        {{-- Loading Animate --}}
                        <div id="loading-tunjangan-kinerja" style="display:none;">
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
                        <div class="pagination-links" id="pagination-links-tunjangan-kinerja">
                            {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    @include('admin.layout.modal')

    <script>
        $(document).ready(function() {
            //function show suggestions tunjangan pangan
            function showSuggestionsTunjanganPangan() {
                $('#suggestionsListTunjanganPangan').show();
                $('#modalBodyBottom').addClass('with-suggestion');
            }

            function hideSuggestionsTunjanganPangan() {
                $('#suggestionsListTunjanganPangan').hide();
                $('#modalBodyBottom').removeClass('with-suggestion');
            }

            function loadDataStatusTunjanganPangan(page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-pangan?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading-tunjangan-pangan").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            5;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_status_kawin + '</td>';
                            html += '<td>' + item.status_kawin + '</td>';
                            html += '<td>' + (item.tunjangan_pasangan ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_anak ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_pangan ?? '-') + '</td>';
                            html += '<td>' + (item.ptkp ?? '-') + '</td>';
                            html += '</tr>';
                        });
                        $('#tableTunjanganPangan').html(html);
                        $('#pagination-links-tunjangan-pangan').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading-tunjangan-pangan").hide();
                    }
                });
            }
            loadDataStatusTunjanganPangan();
            //function search data Status Tunjangan Pangan
            function searchDataStatusTunjanganPangan(keyword, page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-pangan') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading-tunjangan-pangan").show();
                    },
                    success: function(response) {
                        var html = '';
                        var startIndex = (page - 1) * 5;

                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_status_kawin + '</td>';
                            html += '<td>' + item.status_kawin + '</td>';
                            html += '<td>' + (item.tunjangan_pasangan ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_anak ?? '-') + '</td>';
                            html += '<td>' + (item.tunjangan_pangan ?? '-') + '</td>';
                            html += '<td>' + (item.ptkp ?? '-') + '</td>';
                            html += '</tr>';
                        });

                        $('#tableTunjanganPangan').html(html);
                        $('#pagination-links-tunjangan-pangan').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error searching data');
                    },
                    complete: function() {
                        $("#loading-tunjangan-pangan").hide();
                    }
                });
            }
            // Event listener for pagination links tunjangan pangan
            $(document).on('click', '#pagination-links-tunjangan-pangan a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadDataStatusTunjanganPangan(page);
            });
            //search data tunjangan pangan
            $('#searchStatusTunjanganPangan').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchDataStatusTunjanganPangan(keyword);
                } else {
                    loadDataStatusTunjanganPangan(); // balik ke data awal
                }
            });

            // Event listener for input field status tunjangan pangan
            $('#kode_statustunjpangan').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) { // Start searching after 1 characters
                    $.ajax({
                        url: '{{ url('/komponen-gaji/get-kode-tunjangan-pangan') }}', // Adjust URL if needed
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // Show the suggestions
                            let suggestionsList = $('#suggestionsListTunjanganPangan');
                            suggestionsList.empty(); // Clear previous suggestions
                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    suggestionsList.append(
                                        '<li class="list-group-item" data-id="' +
                                        item.id + '" data-kode="' + item.kode +
                                        '">' + item.kode + ' - ' + item
                                        .status_kawin + '</li>'
                                    );
                                });
                                showSuggestionsTunjanganPangan();
                            } else {
                                hideSuggestionsTunjanganPangan();
                            }
                            // console.log(response);
                        },
                        error: function() {
                            // Handle error (optional)
                        }
                    });
                } else {
                    hideSuggestionsTunjanganPangan(); // Hide suggestions if input is too short
                }
            });

            // Select a suggestion Tunjangan Pangan
            $(document).on('click', '#suggestionsListTunjanganPangan li', function() {
                let selectedText = $(this).text();
                let selectedId = $(this).data('id');
                let selectedKode = $(this).data('kode');
                $('#status_kawin').val(selectedText);
                $('#id_tunjanganpangan').val(selectedId);
                $('#kode_statustunjpangan').val(selectedKode);
                hideSuggestionsTunjanganPangan();
            });
            //ketika diklik di luar suggestionsList, maka suggestionsList hilang
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#namstatus_kawinapegawai, #suggestionsListTunjanganPangan')
                    .length) {
                    hideSuggestionsTunjanganPangan();
                }
            });
            //function save data Status Tunjangan Pangan
            function saveDataStatusTunjanganPangan(formData) {
                $.ajax({
                    url: 'komponen-gaji/save-status-tunjangan-pangan', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // console.log(response);
                            // If successful, fetch updated data
                            // $('#modal-report').modal('hide');
                            loadDataStatusTunjanganPangan();
                            // Optionally, you can reset the form here
                            // $('#form-inputgajipegawai')[0]
                            //     .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal menyimpan data pegawai!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal menyimpan data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }

            $('#formStatusPangan').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveDataStatusTunjanganPangan(formData); // Call the saveDataStatusTunjanganPangan function
            });

            //script untuk tunjangan fungsional 

            //function show suggestions tunjangan fungsional
            function showSuggestionsTunjanganFungsional() {
                $('#suggestionsListTunjanganFungsional').show();
                $('#modalBodyBottom').addClass('with-suggestion');
            }

            function hideSuggestionsTunjanganFungsional() {
                $('#suggestionsListTunjanganFungsional').hide();
                $('#modalBodyBottom').removeClass('with-suggestion');
            }

            //load data tunjangan fungsional
            function loadDataStatusTunjanganFungsional(page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-fungsional?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading-tunjangan-fungsional").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            10;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan_fungsional + '</td>';
                            html += '<td>' + item.jabatan_fungsional + '</td>';
                            html += '<td>' + (item.persentase_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.indeks_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.nilai_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.mkkurang5 ?? '-') + '</td>';
                            html += '<td>' + (item.mkkurang10 ?? '-') + '</td>';
                            html += '<td>' + (item.mklebih10 ?? '-') + '</td>';
                            html += '<td>' + (item.ifpegawaitetap ?? '-') + '</td>';
                            html += '<td>' + (item.keterangan ?? '-') + '</td>';
                            html += '</tr>';
                        });
                        $('#tableTunjanganFungsional').html(html);
                        $('#pagination-links-tunjangan-fungsional').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading-tunjangan-fungsional").hide();
                    }
                });
            }
            loadDataStatusTunjanganFungsional();
            //function search data Status Tunjangan Fungsional
            function searchDataStatusTunjanganFungsional(keyword, page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-fungsional') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading-tunjangan-fungsional").show();
                    },
                    success: function(response) {
                        var html = '';
                        var startIndex = (page - 1) * 10;

                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan_fungsional + '</td>';
                            html += '<td>' + item.jabatan_fungsional + '</td>';
                            html += '<td>' + (item.persentase_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.indeks_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.nilai_tunjangan ?? '-') + '</td>';
                            html += '<td>' + (item.mkkurang5 ?? '-') + '</td>';
                            html += '<td>' + (item.mkkurang10 ?? '-') + '</td>';
                            html += '<td>' + (item.mklebih10 ?? '-') + '</td>';
                            html += '<td>' + (item.ifpegawaitetap ?? '-') + '</td>';
                            html += '<td>' + (item.keterangan ?? '-') + '</td>';
                            html += '</tr>';
                        });

                        $('#tableTunjanganFungsional').html(html);
                        $('#pagination-links-tunjangan-fungsional').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error searching data');
                    },
                    complete: function() {
                        $("#loading-tunjangan-fungsional").hide();
                    }
                });
            }
            // Event listener for pagination links tunjangan fungsional
            $(document).on('click', '#pagination-links-tunjangan-fungsional a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadDataStatusTunjanganFungsional(page);
            });
            //search data tunjangan fungsional
            $('#searchStatusTunjanganFungsional').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchDataStatusTunjanganFungsional(keyword);
                } else {
                    loadDataStatusTunjanganFungsional(); // balik ke data awal
                }
            });

            //function get kode atau nama tunjangan fungsional
            $('#kode_tunjanganfungsional').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) { // Start searching after 1 characters
                    $.ajax({
                        url: '{{ url('/komponen-gaji/get-kode-tunjangan-fungsional') }}', // Adjust URL if needed
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // Show the suggestions
                            let suggestionsList = $('#suggestionsListTunjanganFungsional');
                            suggestionsList.empty(); // Clear previous suggestions
                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    suggestionsList.append(
                                        '<li class="list-group-item" data-id="' +
                                        item.id + '" data-kode="' + item
                                        .kode_fungsional +
                                        '">' + item.kode_fungsional + ' - ' + item
                                        .jabatan_fungsional + '</li>'
                                    );
                                });
                                showSuggestionsTunjanganFungsional();
                            } else {
                                hideSuggestionsTunjanganFungsional();
                            }
                            // console.log(response);
                        },
                        error: function() {
                            // Handle error (optional)
                        }
                    });
                } else {
                    hideSuggestionsTunjanganFungsional(); // Hide suggestions if input is too short
                }
            });

            // Select a suggestion Tunjangan Fungsional
            $(document).on('click', '#suggestionsListTunjanganFungsional li', function() {
                let selectedText = $(this).text();
                let selectedId = $(this).data('id');
                let selectedKode = $(this).data('kode');
                $('#jabatan_fungsional').val(selectedText);
                $('#id_jabatanfungsional').val(selectedId);
                $('#kode_tunjanganfungsional').val(selectedKode);
                hideSuggestionsTunjanganFungsional();
            });
            //ketika diklik di luar suggestionsList, maka suggestionsList hilang
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#jabatan_fungsional, #suggestionsListTunjanganFungsional')
                    .length) {
                    hideSuggestionsTunjanganFungsional();
                }
            });

            function hitungTunjanganFungsional() {
                let tarif = parseFloat($('#tarif_tunjanganfungsional').val()) || 0;
                let indeksFungsional = parseFloat($('#indeks_tunjanganfungsional').val()) || 0;
                let persen = parseFloat($('#persentase_tunjangan').val()) || 0;

                // Persentase ke desimal
                let persenDesimal = persen / 100;

                // Hitung indeks
                let indeksTunjangan = indeksFungsional * persenDesimal;
                $('#indeks_tunjangan').val(Math.round(indeksTunjangan));

                // Hitung nilai
                let nilaiTunjangan = indeksTunjangan * tarif;
                $('#nilai_tunjangan').val(Math.round(nilaiTunjangan));

                // Hitung MK
                $('#mkkurang5').val(Math.round(nilaiTunjangan * 0.5));
                $('#mkkurang10').val(Math.round(nilaiTunjangan * 0.75));
                $('#mklebih10').val(Math.round(nilaiTunjangan * 1));
            }

            $('#persentase_tunjangan').on('keyup change', function() {
                hitungTunjanganFungsional();
            });

            function saveDataStatusTunjanganFungsional(formData) {
                $.ajax({
                    url: 'komponen-gaji/save-status-tunjangan-fungsional', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // console.log(response);
                            // If successful, fetch updated data
                            // $('#modal-report').modal('hide');
                            loadDataStatusTunjanganFungsional();
                            // Optionally, you can reset the form here
                            // $('#form-inputgajipegawai')[0]
                            //     .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal menyimpan data pegawai!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal menyimpan data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }

            $('#formFungsional').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveDataStatusTunjanganFungsional(
                    formData); // Call the saveDataStatusTunjanganFungsional function
            });

            // script untuk tunjangan jabatan

            //function show suggestions tunjangan fungsional
            function showSuggestionsTunjanganJabatan() {
                $('#suggestionsListTunjanganJabatan').show();
                $('#modalBodyBottom').addClass('with-suggestion');
            }

            function hideSuggestionsTunjanganJabatan() {
                $('#suggestionsListTunjanganJabatan').hide();
                $('#modalBodyBottom').removeClass('with-suggestion');
            }
            //load data tunjangan jabatan
            function loadDataStatusTunjanganJabatan(page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-jabatan?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading-tunjangan-jabatan").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            5;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan + '</td>';
                            html += '<td>' + item.nama_jabatan + '</td>';
                            html += '<td>' + (item.nominal ?? '-') + '</td>';
                            html += '<td>' + (item.nominalpo ?? '-') + '</td>';
                            html += '<td>' + (item.nominalcp ?? '-') + '</td>';
                            html += '</tr>';
                        });
                        $('#tableTunjanganJabatan').html(html);
                        $('#pagination-links-tunjangan-jabatan').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading-tunjangan-jabatan").hide();
                    }
                });
            }
            loadDataStatusTunjanganJabatan();
            //function search data Status Tunjangan Jabatan
            function searchDataStatusTunjanganJabatan(keyword, page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-jabatan') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading-tunjangan-jabatan").show();
                    },
                    success: function(response) {
                        var html = '';
                        var startIndex = (page - 1) * 5;

                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan + '</td>';
                            html += '<td>' + item.nama_jabatan + '</td>';
                            html += '<td>' + (item.nominal ?? '-') + '</td>';
                            html += '<td>' + (item.nominalpo ?? '-') + '</td>';
                            html += '<td>' + (item.nominalcp ?? '-') + '</td>';
                            html += '</tr>';
                        });

                        $('#tableTunjanganJabatan').html(html);
                        $('#pagination-links-tunjangan-jabatan').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error searching data');
                    },
                    complete: function() {
                        $("#loading-tunjangan-jabatan").hide();
                    }
                });
            }
            // Event listener for pagination links tunjangan jabatan
            $(document).on('click', '#pagination-links-tunjangan-jabatan a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadDataStatusTunjanganJabatan(page);
            });
            //search data tunjangan jabatan
            $('#searchStatusTunjanganJabatan').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchDataStatusTunjanganJabatan(keyword);
                } else {
                    loadDataStatusTunjanganJabatan(); // balik ke data awal
                }
            });

            //Route get kode atau nama tunjangan jabatan
            $('#kode_tunjangan_jabatan').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) { // Start searching after 1 characters
                    $.ajax({
                        url: '{{ url('/komponen-gaji/get-kode-tunjangan-jabatan') }}', // Adjust URL if needed
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // Show the suggestions
                            let suggestionsList = $('#suggestionsListTunjanganJabatan');
                            suggestionsList.empty(); // Clear previous suggestions
                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    suggestionsList.append(
                                        '<li class="list-group-item" data-id="' +
                                        item.id + '" data-kode="' + item
                                        .kode_jabatan +
                                        '">' + item.kode_jabatan + ' - ' + item
                                        .namajabatan + '</li>'
                                    );
                                });
                                showSuggestionsTunjanganJabatan();
                            } else {
                                hideSuggestionsTunjanganJabatan();
                            }
                            // console.log(response);
                        },
                        error: function() {
                            // Handle error (optional)
                        }
                    });
                } else {
                    hideSuggestionsTunjanganJabatan(); // Hide suggestions if input is too short
                }
            });

            // Select a suggestion Tunjangan Jabatan
            $(document).on('click', '#suggestionsListTunjanganJabatan li', function() {
                let selectedText = $(this).text();
                let selectedId = $(this).data('id');
                let selectedKode = $(this).data('kode');
                $('#nama_jabatan').val(selectedText);
                $('#jabatan_id').val(selectedId);
                $('#kode_tunjangan_jabatan').val(selectedKode);
                hideSuggestionsTunjanganJabatan();
            });
            //ketika diklik di luar suggestionsList, maka suggestionsList hilang
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#jabatan_fungsional, #suggestionsListTunjanganJabatan')
                    .length) {
                    hideSuggestionsTunjanganJabatan();
                }
            });

            //form save komponen gaji tunjangan jabatan
            function saveDataStatusTunjanganJabatan(formData) {
                $.ajax({
                    url: 'komponen-gaji/save-status-tunjangan-jabatan', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // console.log(response);
                            // If successful, fetch updated data
                            // $('#modal-report').modal('hide');
                            loadDataStatusTunjanganJabatan();
                            // Optionally, you can reset the form here
                            // $('#form-inputgajipegawai')[0]
                            //     .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal menyimpan data pegawai!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal menyimpan data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }

            $('#formJabatan').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveDataStatusTunjanganJabatan(
                    formData); // Call the saveDataStatusTunjanganJabatan function
            });

            // function tunjangan kinerja

            // function show suggestions tunjangan kinerja
            function showSuggestionsTunjanganKinerja() {
                $('#suggestionsListTunjanganKinerja').show();
                $('#modalBodyBottom').addClass('with-suggestion');
            }

            function hideSuggestionsTunjanganKinerja() {
                $('#suggestionsListTunjanganKinerja').hide();
                $('#modalBodyBottom').removeClass('with-suggestion');
            }
            //load data tunjangan kinerja
            function loadDataStatusTunjanganKinerja(page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-kinerja?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading-tunjangan-kinerja").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            5;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan + '</td>';
                            html += '<td>' + item.nama_jabatan + '</td>';
                            html += '<td>' + (item.nominal ?? '-') + '</td>';
                            html += '<td>' + (item.nominalpo ?? '-') + '</td>';
                            html += '<td>' + (item.nominalcp ?? '-') + '</td>';
                            html += '</tr>';
                        });
                        $('#tableTunjanganKinerja').html(html);
                        $('#pagination-links-tunjangan-kinerja').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading-tunjangan-kinerja").hide();
                    }
                });
            }
            loadDataStatusTunjanganKinerja();
            //function search data Status Tunjangan Kinerja
            function searchDataStatusTunjanganKinerja(keyword, page = 1) {
                $.ajax({
                    url: '{{ url('/komponen-gaji/get-data-tunjangan-kinerja') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading-tunjangan-kinerja").show();
                    },
                    success: function(response) {
                        var html = '';
                        var startIndex = (page - 1) * 5;

                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.kode_jabatan + '</td>';
                            html += '<td>' + item.nama_jabatan + '</td>';
                            html += '<td>' + (item.nominal ?? '-') + '</td>';
                            html += '<td>' + (item.nominalpo ?? '-') + '</td>';
                            html += '<td>' + (item.nominalcp ?? '-') + '</td>';
                            html += '</tr>';
                        });

                        $('#tableTunjanganKinerja').html(html);
                        $('#pagination-links-tunjangan-kinerja').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error searching data');
                    },
                    complete: function() {
                        $("#loading-tunjangan-kinerja").hide();
                    }
                });
            }
            // Event listener for pagination links tunjangan kinerja
            $(document).on('click', '#pagination-links-tunjangan-kinerja a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadDataStatusTunjanganKinerja(page);
            });
            //search data tunjangan kinerja
            $('#searchStatusTunjanganKinerja').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchDataStatusTunjanganKinerja(keyword);
                } else {
                    loadDataStatusTunjanganKinerja(); // balik ke data awal
                }
            });

            //function get kode atau nama tunjangan kinerja
            $('#kode_tunjangan_kinerja').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) { // Start searching after 1 characters
                    $.ajax({
                        url: '{{ url('/komponen-gaji/get-kode-tunjangan-jabatan') }}', // Adjust URL if needed
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // Show the suggestions
                            let suggestionsList = $('#suggestionsListTunjanganKinerja');
                            suggestionsList.empty(); // Clear previous suggestions
                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    suggestionsList.append(
                                        '<li class="list-group-item" data-id="' +
                                        item.id + '" data-kode="' + item
                                        .kode_jabatan +
                                        '">' + item.kode_jabatan + ' - ' + item
                                        .namajabatan + '</li>'
                                    );
                                });
                                showSuggestionsTunjanganKinerja();
                            } else {
                                hideSuggestionsTunjanganKinerja();
                            }
                            // console.log(response);
                        },
                        error: function() {
                            // Handle error (optional)
                        }
                    });
                } else {
                    hideSuggestionsTunjanganKinerja(); // Hide suggestions if input is too short
                }
            });

            // Select a suggestion Tunjangan Kinerja
            $(document).on('click', '#suggestionsListTunjanganKinerja li', function() {
                let selectedText = $(this).text();
                let selectedId = $(this).data('id');
                let selectedKode = $(this).data('kode');
                $('#nama_jabatan_kinerja').val(selectedText);
                $('#kinerja_id').val(selectedId);
                $('#kode_tunjangan_kinerja').val(selectedKode);
                hideSuggestionsTunjanganKinerja();
            });
            //ketika diklik di luar suggestionsList, maka suggestionsList hilang
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#nama_jabatan_kinerja, #suggestionsListTunjanganKinerja')
                    .length) {
                    hideSuggestionsTunjanganKinerja();
                }
            });

            //form save komponen gaji tunjangan kinerja
            function saveDataStatusTunjanganKinerja(formData) {
                $.ajax({
                    url: 'komponen-gaji/save-status-tunjangan-kinerja', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // console.log(response);
                            // If successful, fetch updated data
                            // $('#modal-report').modal('hide');
                            loadDataStatusTunjanganKinerja();
                            // Optionally, you can reset the form here
                            // $('#form-inputgajipegawai')[0]
                            //     .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal menyimpan data pegawai!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal menyimpan data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }

            $('#formKinerja').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveDataStatusTunjanganKinerja(
                    formData); // Call the saveDataStatusTunjanganKinerja function
            });
        });
    </script>

@endsection
