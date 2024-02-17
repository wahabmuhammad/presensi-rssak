@extends('layouts.presensi')
@section('header')
<!-- App Header -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="{{route('dashboard')}}" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Presensi Masuk</div>
    <div class="right"></div>
</div>
<!-- * App Header -->
<style>
    .webcam-capture,
    .webcam-capture video{
        -webkit-transform: scaleX(-1);
        ransform: scaleX(-1);
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px;
    }

    #map {
        height: 180px; }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="row" style="margin-top: 70px">
        <div class="col">
            <input type="hidden" id="lokasi">
            <div class="webcam-capture" style="-webkit-transform: scaleX(1);"></div>
        </div>
    </div>

        <div class="row">
            <button id="takepresensi" class="btn btn-success btn-block">
                <ion-icon name="camera-outline"></ion-icon>
            Presensi Masuk</button>
        </div>


    <div class="row mt-2">
        <div class="col">
            <div id="map"></div>
        </div>
    </div>

    <!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{route('dashboard')}}" class="item {{request()->is('dashboard') ? 'active' :''}}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong>Dashboard</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong>Calendar</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <div class="action-button large" id="camera">
                <ion-icon name="camera" id="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
            </div>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="document-text-outline" role="img" class="md hydrated"
                aria-label="document text outline"></ion-icon>
            <strong>Docs</strong>
        </div>
    </a>
    <a href="{{route('logout')}}" class="item">
        <div class="col">
            <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="to-login"></ion-icon>
            <strong>Logout</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->
@endsection

@push('myscript')
<script>
    Webcam.set({
        height:480,
        width:640,
        image_format: 'jpeg',
        jpeg_quality: 80,
    });

    Webcam.attach('.webcam-capture');

    var lokasi = document.getElementById('lokasi');
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    }

    function successCallback(posisi){
        lokasi.value = posisi.coords.latitude+","+posisi.coords.longitude;
        var map = L.map('map').setView([posisi.coords.latitude, posisi.coords.longitude], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);
        var marker = L.marker([posisi.coords.latitude, posisi.coords.longitude]).addTo(map);
        var circle = L.circle([posisi.coords.latitude, posisi.coords.longitude], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 100
        }).addTo(map);
    }

    function errorCallback(){

    }
    
    // $.ajaxSetup({
    //     headers: {
    //         ‘X-CSRF-TOKEN’: $(‘meta[name=”csrf-token”]’).attr(‘content’)
    //     }
    // });


    $("#camera").click(function(e){
        Webcam.snap(function(uri){
            image = uri;
        });
        var lokasi = $("#lokasi").val();

        $.ajax({
            type:'POST',
            url:'presensi/public/masuk',
            data:{
                _token:"{{ csrf_token() }}",
                image:image,
                lokasi:lokasi,
            },
            cache:false,
            success:function(respond){
                var status = respond.split("|");
                if(status[0] == "success"){
                    Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: status[1],
                    })
                    setTimeout("location.href='home'",3000);
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Gagal',
                    text: status[1],
                    })
                    setTimeout("location.href='home'",3000);
                }
            }
        });
    });
</script>
@endpush