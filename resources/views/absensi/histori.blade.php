@extends('layouts.presensi')

@section('content')
    <div class="appCapsule">
        <div class="section" id="user-section">
            <div id="user-detail">
                <div class="avatar">
                    <img src="{{ asset('assets/img/sample/avatar/avatar1.jpg') }}" alt="avatar" class="imaged w64 rounded">
                </div>
                <div id="user-info">
                    <h2 id="user-name">{{ Auth::user()->name }}</h2>
                    <span id="user-role" style="font-size: medium"> {{ Auth::user()->jabatan }}</span>
                </div>
            </div>
        </div>

        <div class="section mt-1" id="presence-section">
            <div class="presencetab mt-2" style="margin-bottom: 80px">
                <div class="page-body">
                    <div class="container-xxl">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Rekap Presensi</h5>
                            </div>
                            <div class="card-body border-bottom py-3">
                                <form action="{{route('historiPresensi', $presensiIn->id)}}" method="GET">
                                    <div class="row d-flex">
                                        <div class="col ms-auto text-secondary">
                                            <label class="form-label" for="date_start">Tanggal Awal</label>
                                        </div>
                                        <div class="col ms-auto text-secondary">
                                            <label class="form-label" for="date_to">Tanggal Akhir</label>
                                        </div>
                                        <div class="col ms-auto text-secondary">
                                            <label class="form-label" for="search">Cari</label>
                                        </div>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col ms-auto text-secondary">
                                            <div class="input-group">
                                                <input type="date" value="{{ Request::get('date_start') }}"
                                                    class="form-control" placeholder="" name="date_start"
                                                    aria-label="Search in website">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-calendar-filled" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
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
                                        <div class="col ms-auto text-secondary">
                                            <div class="input-group">
                                                <input type="date" value="{{ Request::get('date_to') }}"
                                                    class="form-control" placeholder="" name="date_to"
                                                    aria-label="Search in website">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-calendar-filled" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
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
                                        <div class="col ms-auto text-secondary">
                                            <div class="input-group">
                                                {{-- <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                                    placeholder="Search…" name="search" aria-label="Search in website"> --}}
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
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                                <ul class="nav nav-tabs style1" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            Rekap Masuk
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                            Rekap Pulang
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" style="margin-bottom: 80px">
                                <div class="tab-pane fade show active" id="home" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-mobile-md card-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto Berangkat</th>
                                                    <th>Tanggal Masuk</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Lokasi</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    // $i = $rekapMasuk->firstItem();
                                                @endphp
                                                @foreach ($dataIn as $data)
                                                    @php
                                                        $pathIn = Storage::url(
                                                            'public/upload/presensi-masuk/' . $data->foto_in,
                                                        );
                                                    @endphp
                                                    <tr>
                                                        <td class="text-secondary strong" data-label="No">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Foto Berangkat">
                                                            <img src="{{ url($pathIn) }}" alt="image" height="42"
                                                                width="62" class="imaged boxed center">
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Jam Masuk">
                                                            {{ $data->tgl_presensi }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Jam Masuk">
                                                            {{ $data->jam_in }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Lokasi Masuk">
                                                            {{ $data->location_in }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $dataIn->withQueryString()->links() }}
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-mobile-md card-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto Pulang</th>
                                                    <th>Tanggal Pulang</th>
                                                    <th>Jam Pulang</th>
                                                    <th>Lokasi Pulang</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    // $i = $userTable->firstItem();
                                                @endphp
                                                @foreach ($dataOut as $d)
                                                    @php
                                                        $pathIn = Storage::url(
                                                            'public/upload/presensi-pulang/' . $d->foto_out,
                                                        );
                                                    @endphp
                                                    <tr>
                                                        <td class="text-secondary strong" data-label="No">
                                                            {{ $loop->iteration }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Foto Pulang">
                                                            <img src="{{ url($pathIn) }}" alt="image" height="42"
                                                                width="62" class="imaged boxed center">
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Tanggal Pulang">
                                                            {{ $d->tgl_presensi_out }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Jam Pulang">
                                                            {{ $d->jam_out }}
                                                        </td>
                                                        <td class="text-secondary strong" data-label="Lokasi Pulang">
                                                            {{ $d->location_out }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $dataOut->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@include('layouts.bottomNav')
