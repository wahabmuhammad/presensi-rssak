@extends('admin.layout.masterlayout')
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
                            Data Akun Pegawai
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            {{-- <div>
                                <form action="{{url('user')}}" method="GET">
                                    <div class="input-group">
                                        <input type="search" value="{{Request::get('search')}}" class="form-control" placeholder="Search…" name="search"
                                            aria-label="Search in website">
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
                            </div> --}}
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Buat User Baru
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
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                            <a href="#" class="btn btn-orange">
                                                Edit
                                            </a>
                                            <a href="#" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $userTable->links() }}
                </div>
            </div>
        </div>
    </div>
    {{-- modal list --}}
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('createUser') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Membuat User Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label strong">Nama</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Lengkap dan Gelar">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">NIP</label>
                            <input type="text" class="form-control" name="nip" id="nip"
                                placeholder="Nomor Induk Pegawai">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label strong">Jabatan</label>
                                    <div class="input-group input-group-flat">
                                        <input name="jabatan" id="jabatan" type="text" class="form-control"
                                            autocomplete="off" placeholder="Jabatan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label strong">Jenis Akun</label>
                                    <select class="form-select" name="role" id="role">
                                        <option value="Pegawai" selected>Pegawai</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                            Batal
                        </a>
                        <input class="btn btn-primary ms-auto" type="submit" name="create-user" id="create-user"
                            value="Buat Akun User">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
