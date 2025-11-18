@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <div class="appHeader bg-danger text-light">
        <div class="left">
            <a href="{{ route('dashboard') }}" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Presensi Pulang</div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
    <style>
        .webcam-capture,
        .webcam-capture video {
            -webkit-transform: scaleX(-1);
            ransform: scaleX(-1);
            display: inline-block;
            width: 100% !important;
            margin: auto;
            height: auto !important;
            border-radius: 15px;
        }

        #map {
            height: 180px;
        }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="row" style="margin-top: 70px">
        <div class="col">
            <input type="hidden" id="lokasi">
            {{-- <div class="webcam-capture" style="-webkit-transform: scaleX(1);"></div> --}}
            <div class="webcam-capture"
                style="position:relative; display:inline-block; width:100%; max-width:100%; -webkit-transform: scaleX(1);">

                <video id="video" autoplay muted playsinline
                    style="width:100%; height:auto; border-radius:10px;"></video>

                <canvas id="overlay" style="position:absolute; top:0; left:0; width:100%; height:100%;"></canvas>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div id="datetime" class='text-center'>
                <h2 id="time"></h2>
                <h4 id="date">{{ $hari }},{{ $cekPulang->tgl_presensi }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="card-body text-center pb-1">
                {{-- <button id="takepresensi" class="btn btn-success btn-block">
                    <ion-icon name="camera-outline"></ion-icon>
                    Presensi Masuk
                </button> --}}
                <input type="text" id="shift" name="shift" class="form-control" style="text-align: center"
                    value="{{ $cekPulang->shift }}" disabled>
                <h4 id="jamkerja"></h4>
                <div id="my-ip-jq">Ip Anda:</div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <button id="takepresensi" class="btn btn-danger btn-block">
            <ion-icon name="camera-outline"></ion-icon>
            Presensi Pulang</button>
    </div> --}}


    <div class="row mt-2">
        <div class="col">
            <div id="map"></div>
        </div>
    </div>

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="{{ route('dashboard') }}" class="item {{ request()->is('dashboard') ? 'active' : '' }}">
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
                <div class="action-button large  bg-danger" id="camera">
                    <ion-icon name="camera" id="camera" role="img" class="md hydrated"
                        aria-label="add outline"></ion-icon>
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
        <a href="{{ route('logout') }}" class="item">
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
        function updateDateTime() {
            const now = new Date();

            // Nama hari dalam bahasa Indonesia
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const dayName = days[now.getDay()];

            // Mendapatkan tanggal
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0'); // Bulan di JavaScript dimulai dari 0
            const year = now.getFullYear();
            const dateString = `${dayName}, ${day}-${month}-${year}`;

            // Mendapatkan waktu
            const hours = now.getHours();
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${String(hours).padStart(2, '0')}:${minutes}:${seconds}`;
            // console.log(timeString);

            // // Menentukan ucapan berdasarkan jam
            // let greeting;
            // if (hours < 12) {
            //     greeting = 'Selamat Pagi, ';
            // } else if (hours < 15) {
            //     greeting = 'Selamat Siang, ';
            // } else if (hours < 18) {
            //     greeting = 'Selamat Sore, ';
            // } else {
            //     greeting = 'Selamat Malam, ';
            // }


            // // Memperbarui elemen HTML
            // document.getElementById('greeting').textContent = greeting;
            // document.getElementById('date').textContent = dateString;
            document.getElementById('time').textContent = timeString;
        }

        // Memperbarui jam dan tanggal setiap detik
        setInterval(updateDateTime, 1000);

        // Memanggil fungsi pertama kali untuk langsung menampilkan jam dan tanggal saat halaman dimuat
        updateDateTime();

        let faceDetected = false;
        let image = "";
        let userIp = "";

        // 1️⃣ Ambil IP Public
        $.ajax({
            url: 'https://api.ipify.org?format=json',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                userIp = data.ip;
                $('#my-ip-jq').text(userIp);
            },
            error: function() {
                userIp = "error";
                $('#my-ip-jq').text('error');
            }
        });

        // 2️⃣ Load model face-api
        document.addEventListener("DOMContentLoaded", async () => {
            await faceapi.nets.tinyFaceDetector.loadFromUri('models');
            console.log("Face detection model loaded!");

            const video = document.getElementById('video');
            navigator.mediaDevices.getUserMedia({
                    video: {}
                })
                .then(stream => {
                    video.srcObject = stream
                })
                .catch(err => console.error("Webcam error:", err));

            video.addEventListener('play', () => {
                const canvas = document.getElementById('overlay');
                const context = canvas.getContext('2d');

                // Samakan ukuran canvas dengan video
                const setCanvasSize = () => {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                };

                setCanvasSize();

                setInterval(async () => {
                    setCanvasSize();
                    const displaySize = {
                        width: video.videoWidth,
                        height: video.videoHeight
                    };
                    faceapi.matchDimensions(canvas, displaySize);

                    const detections = await faceapi.detectAllFaces(
                        video,
                        new faceapi.TinyFaceDetectorOptions()
                    );
                    const resizedDetections = faceapi.resizeResults(detections,
                        displaySize);

                    context.clearRect(0, 0, canvas.width, canvas.height);
                    faceapi.draw.drawDetections(canvas, resizedDetections);

                    faceDetected = detections.length > 0;
                }, 500);
            });
        });

        // 3️⃣ Button Presensi dengan validasi wajah + IP
        $("#camera").click(function(e) {
            e.preventDefault();

            // 🔒 Validasi IP
            const allowedIps = ["182.253.39.138", "202.51.208.2"];
            if (!allowedIps.includes(userIp)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Anda di luar Jaringan Rumah Sakit!',
                    text: `Anda terdeteksi menggunakan IP: ${userIp}. Mohon sambungkan wifi handphone atau komputer anda dengan jaringan Rumah Sakit untuk melakukan presensi.`
                });
                return;
            }

            // 🔒 Validasi Wajah
            if (!faceDetected) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Wajah tidak terdeteksi!',
                    text: 'Mohon pastikan wajah terlihat jelas di kamera sebelum presensi.'
                });
                return;
            }

            $(this).prop('disabled', true);

            const lokasi = $("#lokasi").val();
            const shift = $('#shift').val();
            const ip = $('#my-ip-jq').text();

            // ambil snapshot
            const video = document.getElementById('video');
            const canvasSnap = document.createElement('canvas');
            canvasSnap.width = video.videoWidth;
            canvasSnap.height = video.videoHeight;
            canvasSnap.getContext('2d').drawImage(video, 0, 0, canvasSnap.width, canvasSnap.height);
            image = canvasSnap.toDataURL("image/jpeg", 0.8);

            $.ajax({
                type: 'POST',
                url: 'presensi/public/pulang',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi,
                    shift: shift.toLowerCase(),
                    ip: ip
                },
                cache: false,
                success: function(respond) {
                    var status = respond.split("|");
                    if (status[0] == "success" || status[0] == "info") {
                        Swal.fire({
                            icon: status[0],
                            title: "Presensi Berhasil",
                            html: `<strong><h2>${status[1]}</h2></strong>`
                        });
                        setTimeout("location.href='dashboard'", 3000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: status[1],
                        });
                        setTimeout("location.href='dashboard'", 3000);
                    }
                }
            });
        });
    </script>
    {{-- <script>
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpeg',
            jpeg_quality: 80,
        });

        Webcam.attach('.webcam-capture');

        // var lokasi = document.getElementById('lokasi');
        // if (navigator.geolocation) {
        //     navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        // }

        // function successCallback(posisi) {
        //     lokasi.value = posisi.coords.latitude + "," + posisi.coords.longitude;
        //     var map = L.map('map').setView([posisi.coords.latitude, posisi.coords.longitude], 13);
        //     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //         maxZoom: 19,
        //         attribution: '© OpenStreetMap'
        //     }).addTo(map);
        //     var marker = L.marker([posisi.coords.latitude, posisi.coords.longitude]).addTo(map);
        //     var circle = L.circle([posisi.coords.latitude, posisi.coords.longitude], {
        //         color: 'red',
        //         fillColor: '#f03',
        //         fillOpacity: 0.5,
        //         radius: 100
        //     }).addTo(map);
        // }

        function errorCallback() {

        }

        // $.ajaxSetup({
        //     headers: {
        //         ‘X-CSRF-TOKEN’: $(‘meta[name=”csrf-token”]’).attr(‘content’)
        //     }
        // });


        $("#camera").click(function(e) {
            e.preventDefault();
            $(this).prop('disabled', true);
            var lokasi = $("#lokasi").val().trim(); // Get and trim the value of 'lokasi' input field
            // Check if 'lokasi' value is empty
            // if (!lokasi) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Lokasi Anda Kosong',
            //         text: 'Mohon izinkan atau aktifkan lokasi anda terlebih dahulu. Jika belum bisa harap hubungi IT',
            //     });
            //     return; // Exit function if 'lokasi' is empty
            // }
            Webcam.snap(function(uri) {
                image = uri;
            });
            var lokasi = $("#lokasi").val();

            $.ajax({
                type: 'POST',
                url: 'presensi/public/pulang',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi,
                },
                cache: false,
                success: function(respond) {
                    var status = respond.split("|");
                    if (status[0] == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Presensi Pulang berhasil',
                            text: status[1],
                        })
                        setTimeout("location.href='dashboard'", 3000);
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Gagal',
                            text: status[1],
                        })
                        setTimeout("location.href='dashboard'", 3000);
                    }
                    
                }
            });
        });
    </script> --}}
@endpush
