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
                        Data Gaji Pegawai
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                            data-bs-target="#modal-report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-csv"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" /><path d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" /><path d="M16 15l2 6l2 -6" /></svg>
                            Import gaji 
                        </a>
                        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                            data-bs-target="#modal-report" aria-label="Buat User Baru">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-auto ms-auto mb-1 mt-3">
        <form action="{{ url('user') }}" method="GET">
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
    </div> --}}
    <div class="col-12", style="margin-top: 30px">
        <div class="card">
            <div class="card-header">
                <h3 class="card-tittle">Daftar User</h3>
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
                        <form action="{{ url('user') }}" method="GET">
                            <div class="input-group">
                                <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                    placeholder="Search…" name="search" aria-label="Search in website">
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
                <table class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th class="w-1"></th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @php
                            $i = $userTable->firstItem();
                        @endphp
                        @foreach ($userTable as $u)
                            <tr>
                                <td class="text-secondary strong" data-label="NO">
                                    {{ $i }}
                                </td>
                                <td class="text-secondary strong" data-label="NIP">
                                    {{ $u->nip }}
                                </td>
                                <td data-label="Name">
                                    <div class="d-flex py-1 align-items-center">
                                        <div class="flex-fill">
                                            <div class="font-weight-medium strong">{{ $u->name }}</div>
                                            <div class="text-secondary"><a href="#"
                                                    class="text-reset">{{ $u->email }}</a></div>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="Title">
                                    <div class="strong">{{ $u->jabatan }}</div>
                                    <div class="text-secondary">{{ $u->role }}</div>
                                </td>
                                <td>
                                    <div class="btn-list flex-nowrap">
                                        <a href="{{route('user.edit', $u->id)}}" class="btn btn-orange d-none d-sm-inline-block">
                                            Edit User
                                        </a>
                                        <form action="{{ route('user.delete', $u->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Yakin menghapus data user ini?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody> --}}
                </table>
                {{-- {{ $userTable->withQueryString()->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
