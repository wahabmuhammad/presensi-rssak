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
                        Rekap Presensi Masuk
                    </h2>
                </div>
                <!-- Page title actions -->
            </div>
        </div>
    </div>
    <div class="col-12", style="margin-top: 30px">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto Masuk</th>
                            <th>NIP</th>
                            <th>Name</th>
                            <th>Tanggal Masuk</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = $rekapMasuk->firstItem()
                        @endphp
                        @foreach ($rekapMasuk as $u)
                        @php
                            $pathIn = Storage::url('public/upload/presensi-masuk/'.$u->foto_in);
                        @endphp
                        <tr>
                            <td class="text-secondary strong" data-label="NO">
                                {{$i}}
                            </td>
                            <td class="text-secondary strong" data-label="Foto Masuk">
                                <div class="icon-box">
                                    <img src="{{url($pathIn)}}" alt="image" height="42" width="62" class="imaged rounded center">
                                </div>
                            </td>
                            <td class="text-secondary strong" data-label="NIP">
                                {{$u->nip}}
                            </td>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium strong">{{$u->name}}</div>
                                        <div class="text-secondary"><a href="#"
                                                class="text-reset">{{$u->location_in}}</a></div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Tanggal Masuk">
                                <div class="strong">{{$u->tgl_presensi}}</div>
                                <div class="text-secondary">{{$u->jam_in}}</div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
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
                            $i++
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                {{$rekapMasuk->links()}}
            </div>
        </div>
    </div>
</div>
@endsection