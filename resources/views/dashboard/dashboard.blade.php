@extends('layouts.presensi')

@section('content')
    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="section" id="user-section">
            <div id="user-detail">
                <div class="avatar">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
                </div>
                <div id="user-info">
                    <h2 id="user-name">{{ Auth::user()->name }}</h2>
                    <span id="user-role" style="font-size: medium"> {{ Auth::user()->jabatan }}</span>
                </div>
            </div>
        </div>

        <div class="section" id="menu-section" style="margin-top: 15pt">
            <div class="card">
                <div class="card-body text-center">
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="{{ route('slip-gaji', $profil->id) }}" class="green" style="font-size: 40px;">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Slip Gaji</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="danger" style="font-size: 40px;">
                                    <ion-icon name="calendar-number-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Cuti</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="primary" style="font-size: 40px;">
                                    <ion-icon name="time-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Lembur</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="warning" style="font-size: 40px;">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Histori</span>
                            </div>
                        </div>
                        {{-- <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="" class="orange" style="font-size: 40px;">
                                    <ion-icon name="location-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                Lokasi
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="section mt-2" id="presence-section" style="margin-top: 120%">
            <div class="todaypresence">
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('masuk') }}">
                            <div class="card gradasigreen">
                                <div class="card-body">
                                    <div class="presencecontent">
                                        <div class="iconpresence">
                                            <ion-icon name="camera"></ion-icon>
                                        </div>
                                        <div class="presencedetail">
                                            <h4 class="presencetitle">Masuk</h4>
                                            <h4 class="presencetitle">
                                                {{ $PresensiMasuk != null ? $PresensiMasuk->tgl_presensi : '' }}</h4>
                                            <span>{{ $PresensiMasuk != null ? $PresensiMasuk->jam_in : 'Belum Absen' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('pulang') }}">
                            <div class="card gradasired">
                                <div class="card-body">
                                    <div class="presencecontent">
                                        <div class="iconpresence">
                                            <ion-icon name="camera"></ion-icon>
                                        </div>
                                        <div class="presencedetail">
                                            <h4 class="presencetitle">Pulang</h4>
                                            <h4 class="presencetitle">
                                                {{ $PresensiPulang != null && $PresensiPulang->tgl_presensi_out != null ? $PresensiPulang->tgl_presensi_out : '' }}
                                            </h4>
                                            <span>{{ $PresensiPulang != null && $PresensiPulang->jam_out != null ? $PresensiPulang->jam_out : 'Belum Absen' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="presencetab mt-2">
                <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                Bulan Ini
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                Leaderboard
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-2" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach ($presensimasukBulanini as $d)
                                @php
                                    $path = Storage::url('upload/presensi-masuk/' . $d->foto_in);
                                @endphp
                                <li>
                                    <h4 style="color: green">History Presensi Masuk</h4>
                                    <div class="item">
                                        <div class="icon-box bg-primary">
                                            <img src="{{ url($path) }}" alt="" class="imaged w64">
                                        </div>
                                        <div class="in">
                                            <div>{{ date('d-m-Y', strtotime($d->tgl_presensi)) }}</div>
                                            <span class="badge badge-success">{{ $d->jam_in }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="listview image-listview">
                            @foreach ($presensipulangBulanini as $c)
                                @php
                                    $pathOut = Storage::url('upload/presensi-pulang/' . $c->foto_out);
                                @endphp
                                <li>
                                    <h4 style="color: red">History Presensi Pulang</h4>
                                    <div class="item">
                                        <div class="icon-box bg-primary">
                                            <img src="{{ url($pathOut) }}" alt="" class="imaged w64">
                                        </div>
                                        <div class="in">
                                            <div>{{ date('d-m-Y', strtotime($c->tgl_presensi_out)) }}</div>
                                            <span class="badge badge-danger">{{ $c->jam_out }}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach ($leaderboard as $l)
                                @php
                                    $pathIn = Storage::url('public/upload/presensi-masuk/' . $l->foto_in);
                                @endphp
                                <li>
                                    <div class="item">
                                        <div class="icon-box bg-primary">
                                            <img src="{{ url($pathIn) }}" alt="" class="imaged w64">
                                        </div>
                                        <div class="in">
                                            <div>
                                                <b>{{ $l->name }}</b> <br>
                                                <small>
                                                    {{ $l->jabatan }}
                                                </small>
                                            </div>
                                            <div>
                                                <h5>Masuk</h5>
                                                <span class="badge badge-primary">
                                                    {{ $l->jam_in }}
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- * App Capsule -->
@endsection

@include('layouts.bottomNav')
