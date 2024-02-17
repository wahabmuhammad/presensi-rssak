<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Logo_RSSA.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="__manifest.json">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<!-- App Bottom Menu -->
<div class="appBottomMenu">
    <a href="{{route('dashboard')}}" class="item {{request()->is('dashboard') ? 'active' :''}}">
        <div class="col">
            <ion-icon name="home-outline"></ion-icon>
            <strong style="font-size: 15px">Home</strong>
        </div>
    </a>
    <a href="#" class="item">
        <div class="col">
            <ion-icon name="calendar-outline" role="img" class="md hydrated"
                aria-label="calendar outline"></ion-icon>
            <strong style="font-size: 15px">Jadwal</strong>
        </div>
    </a>
    <a href="" class="item">
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
            <strong style="font-size: 15px">Rekap</strong>
        </div>
    </a>
    <a href="{{route('logout')}}" class="item">
        <div class="col">
            <ion-icon name="log-out-outline" role="img" class="md hydrated" aria-label="to-login"></ion-icon>
            <strong style="font-size: 15px">Logout</strong>
        </div>
    </a>
</div>
<!-- * App Bottom Menu -->