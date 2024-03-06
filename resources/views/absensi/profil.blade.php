@extends('layouts.presensi')

@section('content')
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

        <div class="section mt-1" id="presence-section">
            <div class="presencetab mt-2" style="margin-bottom: 80px">
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <form method="POST" action="{{ route('updateprofil', $id->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h5 class="card-title">Edit Profil</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="datagrid">
                                                <div class="avatar text-center">
                                                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar"
                                                        class="imaged boxed">
                                                </div>
                                                <div class="datagrid-title text-center">
                                                    <h4 class="strong">Update Foto Profile</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg">
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="nama">
                                                            <span class="strong">Nama</span>
                                                        </label>
                                                        <input type="text" id="nama" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            value="{{ $id->name }}" />
                                                        <span class="text-danger">
                                                            @error('nama')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="Password">
                                                            <span class="strong">Password</span>
                                                        </label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control form-control @error('password') is-invalid @enderror"
                                                            value="" />
                                                        <span class="text-danger">
                                                            @error('password')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="Jabatan">
                                                            <span class="strong">Confirm Password</span>
                                                        </label>
                                                        <input id="password-confirm" type="password"
                                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                                            name="password_confirmation" autocomplete="new-password"
                                                            value="">
                                                        <span class="text-danger">
                                                            @error('password_confirmation')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div> <br>
                                        </div>
                                        <div class="col-lg">
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="nip">
                                                            <span class="strong">NIP</span>
                                                        </label>
                                                        <input type="text" id="nip" name="nip"
                                                            class="form-control form-control" value="{{ $id->nip }}"
                                                            @disabled(true) />
                                                    </div>
                                                </div>
                                            </div> <br>
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="Jabatan">
                                                            <span class="strong">Jabatan</span>
                                                        </label>
                                                        <input type="text" id="jabatan" name="jabatan"
                                                            class="form-control @error('jabatan') is-invalid @enderror"
                                                            value="{{ $id->jabatan }}" />
                                                        <span class="text-danger">
                                                            @error('jabatan')
                                                                {{ $message }}
                                                            @enderror
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="datagrid">
                                                <div class="datagrid-item">
                                                    <div class="form-outline mt-5">
                                                        <input id="editprofil" name="Edit Profil"
                                                            class="btn btn-primary btn-lg" type="submit"
                                                            value="Edit Profile" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div id="menu-section" class="section" style="margin-top: 50pt">
    </div>
@endsection

@include('layouts.bottomNav')
