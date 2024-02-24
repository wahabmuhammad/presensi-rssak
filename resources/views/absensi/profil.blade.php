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

        <div class="section mt-1" id="presence-section" >
            <div class="todaypresence">
                <div class="page-body">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">{{$id->name}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="datagrid">
                                            <div class="avatar text-center">
                                                <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged boxed">
                                            </div>
                                            <div class="datagrid-title text-center">
                                                <h4 class="strong">Update Foto Profile</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg">
                                        <div class="datagrid">
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Registrar</div>
                                                <div class="datagrid-content">Third Party</div>
                                            </div>
                                        </div> <br>
                                        <div class="datagrid">
                                            <div class="datagrid-item">
                                                <div class="datagrid-title">Registrar</div>
                                                <div class="datagrid-content">Third Party</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="menu-section" class="section" style="margin-top: 50pt">


        {{-- <div class="card">
            <div class="card-body text-center">
                
            </div>
        </div> --}}
    </div>
@endsection

@include('layouts.bottomNav')
