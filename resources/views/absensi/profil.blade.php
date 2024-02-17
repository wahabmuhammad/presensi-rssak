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
    </div>

    <div id="menu-section" class="section" style="margin-top: 15pt">
        <div class="card">
            <div class="card-body text-center">

            </div>
        </div>
    </div>
@endsection

@include('layouts.bottomNav')