@extends('admin.layout.masterlayout')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Administrator
                        </div>
                        <h2 class="page-title">
                            Rekap Presensi Pulang
                        </h2>
                    </div>
                    <!-- Page title actions -->
                </div>
            </div>
        </div>
        <div class="col-auto ms-auto mt-3">
            <form action="{{ url('rekap_Presensi_out') }}" method="GET">
                <div class="input-group">
                    <input type="search" value="{{ Request::get('search') }}" class="form-control" placeholder="Search…"
                        name="search" aria-label="Search in website">
                    <button class="btn btn-primary" type="submit">
                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M21 21l-6 -6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto Pulang</th>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Tanggal Pulang</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $rekapPulang->firstItem();
                            @endphp
                            @foreach ($rekapPulang as $u)
                                @php
                                    $pathIn = Storage::url('public/upload/presensi-pulang/' . $u->foto_out);
                                @endphp
                                <tr>
                                    <td class="text-secondary strong" data-label="NO">
                                        {{ $i }}
                                    </td>
                                    <td class="text-secondary strong" data-label="Foto Masuk">
                                        <div class="icon-box">
                                            <img src="{{ url($pathIn) }}" alt="image" height="42" width="62"
                                                class="imaged rounded center">
                                        </div>
                                    </td>
                                    <td class="text-secondary strong" data-label="NIP">
                                        {{ $u->nip }}
                                    </td>
                                    <td data-label="Name">
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-medium strong">{{ $u->name }}</div>
                                                <div class="text-secondary"><a href="#"
                                                        class="text-reset">{{ $u->location_out }}</a></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Tanggal Masuk">
                                        <div class="strong">{{ $u->tgl_presensi_out }}</div>
                                        <div class="text-secondary">{{ $u->jam_out }}</div>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-toggle="dropdown">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">
                                                        Action
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        Another action
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $rekapPulang->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
