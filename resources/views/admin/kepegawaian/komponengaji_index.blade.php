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
                                        <div class="font-weight-medium">132 Sales</div>
                                        <div class="text-secondary">12 waiting payments</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card card-sm">
                            <div class="card-header">
                                <a class="card-title">Tunjangan Fungsional APT(PT)</a>
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
                                        <div class="font-weight-medium">132 Sales</div>
                                        <div class="text-secondary">12 waiting payments</div>
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
                                        placeholder="Search…" name="search" aria-label="Search in website">
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
                                <th>No</th>
                                <th>Kode</th>
                                <th>Status</th>
                                <th>Tunjangan Suami / Istri</th>
                                <th>Tunjangan Anak</th>
                                <th>Tunjangan Pangan</th>
                                <th>PTKP</th>
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
                                        placeholder="Search…" name="search" aria-label="Search in website">
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
                                <th rowspan="3">Pembulatan</th>
                                <th colspan="1">A</th>
                                <th colspan="1">B</th>
                                <th colspan="1">C</th>
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
                        <tbody id="tablePegawai">
                            {{-- Data akan dimuat di sini melalui AJAX --}}
                        </tbody>
                    </table>
                    {{-- {{ $userTable->withQueryString()->links() }} --}}
                    {{-- Loading Animate --}}
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
                                    <input type="text" class="form-control form-control-sm" value="8" size="3"
                                        aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-secondary">
    
                                <form action="{{ url('user') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                            placeholder="Search…" name="search" aria-label="Search in website">
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
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nominal Tunjangan</th>
                                    <th>PO</th>
                                    <th>CP</th>
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
                                    <input type="text" class="form-control form-control-sm" value="8" size="3"
                                        aria-label="Invoices count">
                                </div>
                                entries
                            </div>
                            <div class="ms-auto text-secondary">
    
                                <form action="{{ url('user') }}" method="GET">
                                    <div class="input-group">
                                        <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                            placeholder="Search…" name="search" aria-label="Search in website">
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
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Jabatan</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nominal Tunjangan</th>
                                    <th>PO</th>
                                    <th>CP</th>
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
    </div>
    {{-- Modal --}}
    @include('admin.layout.modal')
@endsection
