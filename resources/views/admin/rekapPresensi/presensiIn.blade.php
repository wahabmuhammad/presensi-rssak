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
                            $i = $userTable->firstItem()
                        @endphp
                        @foreach ($userTable as $u)
                        <tr>
                            <td class="text-secondary strong" data-label="NO">
                                {{$i}}
                            </td>
                            <td class="text-secondary strong" data-label="NIP">
                                {{$u->nip}}
                            </td>
                            <td data-label="Name">
                                <div class="d-flex py-1 align-items-center">
                                    <div class="flex-fill">
                                        <div class="font-weight-medium strong">{{$u->name}}</div>
                                        <div class="text-secondary"><a href="#"
                                                class="text-reset">{{$u->email}}</a></div>
                                    </div>
                                </div>
                            </td>
                            <td data-label="Title">
                                <div class="strong">{{$u->jabatan}}</div>
                                <div class="text-secondary">{{$u->role}}</div>
                            </td>
                            <td>
                                <div class="btn-list flex-nowrap">
                                    <a href="#" class="btn">
                                        Edit
                                    </a>
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
                {{$userTable->links()}}
            </div>
        </div>
    </div>
</div>
@endsection