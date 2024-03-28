@extends('layouts.presensi')

@section('content')
    <div class="appCapsule">
        <div class="section" id="user-section">
            <div id="user-detail">
                <div class="avatar">
                    <img src="{{asset('assets/img/sample/avatar/avatar1.jpg')}}" alt="avatar" class="imaged w64 rounded">
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
                                <h5 class="card-title">Slip Gaji </h5>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@include('layouts.bottomNav')