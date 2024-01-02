@extends('admin.layout.masterLayout')

@section('content')
    <div class="container-fluid">
        <div class="row g-2 align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Administrator
                </div>
                <h2 class="page-title">
                    Daftar Peserta Recruitment
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-white d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" /></svg>
                        Export Excell
                    </a>
                    <a href="#" class="btn btn-white d-sm-none btn-icon" data-bs-toggle="modal"
                        data-bs-target="#modal-report" aria-label="Buat User Baru">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-export" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v5m-5 6h7m-3 -3l3 3l-3 3" /></svg>
                    </a>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-cyan d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-import"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                        </svg>
                        Import Excell
                    </a>
                    <a href="#" class="btn btn-cyan d-sm-none btn-icon" data-bs-toggle="modal"
                        data-bs-target="#modal-report" aria-label="Buat User Baru">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-import"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                            <path d="M5 13v-8a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-5.5m-9.5 -2h7m-3 -3l3 3l-3 3" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                        data-bs-target="#modal-report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Tambah Peserta Baru
                    </a>
                    <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                        data-bs-target="#modal-report" aria-label="Buat User Baru">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12" style="margin-top: 30px">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Daftar Peserta</h3>
                </div>
                <div class="card-body border-bottom py-2">
                    <div class="d-flex">
                        <div class="ms-auto text-secondary">
                            <form action="{{ route('recruitment') }}" method="GET">
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
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Formasi</th>
                                <th>Pendidikan</th>
                                <th>Universitas/Sekolah</th>
                                <th>STR</th>
                                <th>Rekomendasi</th>
                                <th>Sertifikat</th>
                                <th>Sesi</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $datapeserta->firstItem();
                            @endphp
                            @foreach ($datapeserta as $u)
                                <tr>
                                    <td class="text-secondary strong" data-label="NO">
                                        {{ $i }}
                                    </td>
                                    <td data-label="Name">
                                        <div class="d-flex py-1 align-items-center">
                                            <div class="flex-fill">
                                                <div class="font-weight-medium strong">{{ $u->Nama }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="font-weight-medium strong" data-label="NIK">
                                        {{ $u->NIK }}
                                    </td>
                                    <td data-label="No HP">
                                        <div class="font-weight-medium strong">{{ $u->nohp }}</div>
                                    </td>
                                    <td data-label="Alamat">
                                        <div class="font-weight-medium strong">{{ $u->Alamat }}</div>
                                    </td>
                                    <td data-label="Formasi">
                                        <div class="font-weight-medium strong">{{ $u->Formasi }}</div>
                                    </td>
                                    <td data-label="Pendidikan">
                                        <div class="font-weight-medium strong">{{ $u->Pendidikan }}</div>
                                    </td>
                                    <td data-label="Universitas/Sekolah">
                                        <div class="font-weight-medium strong">{{ $u->Universitas }}</div>
                                    </td>
                                    <td data-label="STR">
                                        <div class="font-weight-medium strong">{{ $u->str != null ? $u->str : '-' }}
                                        </div>
                                    </td>
                                    <td data-label="Rekomendasi">
                                        <div class="font-weight-medium strong">
                                            {{ $u->Rekomendasi != null ? $u->Rekomendasi : '-' }}</div>
                                    </td>
                                    <td data-label="Sertifikat">
                                        <div class="font-weight-medium strong">
                                            {{ $u->Sertifikat != null ? $u->Sertifikat : '-' }}</div>
                                    </td>
                                    <td data-label="Sesi">
                                        <div class="font-weight-medium strong">
                                            {{ $u->Kloter != null ? $u->Kloter : '-' }}</div>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('user.edit', $u->id) }}"
                                                class="btn btn-orange d-none d-sm-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-edit" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path
                                                        d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('sendwa', $u->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-success d-none d-sm-inline-block">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-brand-whatsapp" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                                    <path
                                                        d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                                </svg>
                                                </button>
                                            </form>
                                            {{-- <a href=""
                                                class="btn btn-success d-none d-sm-inline-block">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-brand-whatsapp" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M3 21l1.65 -3.8a9 9 0 1 1 3.4 2.9l-5.05 .9" />
                                                    <path
                                                        d="M9 10a.5 .5 0 0 0 1 0v-1a.5 .5 0 0 0 -1 0v1a5 5 0 0 0 5 5h1a.5 .5 0 0 0 0 -1h-1a.5 .5 0 0 0 0 1" />
                                                </svg>
                                            </a> --}}
                                            <form action="{{ route('user.delete', $u->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Yakin menghapus data user ini?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datapeserta->withQueryString()->links() }}
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
                        <h5 class="modal-title">Membuat Peserta Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label strong">Nama</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Lengkap dan Gelar">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">NIK</label>
                            <input type="password" class="form-control" name="text" id="password"
                                placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">No Hp</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="No HP">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">Alamat</label>
                            <input type="text" class="form-control" name="nip" id="nip"
                                placeholder="Alamat">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label strong">Universitas/Sekolah</label>
                                    <input type="text" class="form-control" name="nip" id="nip"
                                        placeholder="Universitas/Sekolah">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label strong">STR</label>
                                    <input type="text" class="form-control" name="nip" id="nip"
                                        placeholder="STR">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">Rekomendasi</label>
                            <input type="text" class="form-control" name="nip" id="nip"
                                placeholder="Rekomendasi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label strong">Sertifikat</label>
                            <input type="text" class="form-control" name="nip" id="nip"
                                placeholder="Sertifikat">
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="mb-3">
                                    <label class="form-label strong">Pendidikan</label>
                                    <div class="input-group input-group-flat">
                                        <input name="jabatan" id="jabatan" type="text" class="form-control"
                                            autocomplete="off" placeholder="Pendidikan">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label strong">Formasi</label>
                                    <select class="form-select" name="role" id="role">
                                        @foreach ($datapeserta as $data)
                                            <option value="{{ $data->Formasi }}">{{ $data->Formasi }}</option>
                                        @endforeach
                                        {{-- <option value="Perawat Bedah" selected>Perawat Bedah</option>
                                        <option value="Perawat ICU">Perawat ICU</option>
                                        <option value="Driver">Driver</option>
                                        <option value="Staff IPSRS">Staff IPSRS</option>
                                        <option value="Juru Masak">Juru Masak</option>
                                        <option value="Penatalaksana Laundry">Penatalaksana Laundry</option>
                                        <option value="Sanitasi">Sanitasi</option>
                                        <option value="SDI">SDI</option>
                                        <option value="Kasir">Kasir</option>
                                        <option value=""></option> --}}
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
