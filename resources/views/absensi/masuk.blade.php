@extends('layouts.presensi')
@section('header')
    <!-- App Header -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <div class="appHeader bg-success text-light">
        <div class="left">
            <a href="{{ route('dashboard') }}" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Presensi Masuk</div>
        <div class="right"></div>
    </div>
    {{-- {{dd($cekPulang->name)}} --}}
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
            <div class="webcam-capture" style="-webkit-transform: scaleX(1);"></div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div id="datetime" class='text-center'>
                <h2 id="time"></h2>
                <h4 id="date"></h4>
            </div>
        </div>
        <div class="row">
            <div class="card-body text-center pb-1">
                {{-- <button id="takepresensi" class="btn btn-success btn-block">
                    <ion-icon name="camera-outline"></ion-icon>
                    Presensi Masuk
                </button> --}}
                <input type="text" id="shift" name="shift" class="form-control" style="text-align: center"
                    disabled>
                <h4 id="jamkerja"></h4>
            </div>
        </div>
    </div>


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
                <div class="action-button large bg-success" id="camera">
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
            document.getElementById('date').textContent = dateString;
            document.getElementById('time').textContent = timeString;
        }

        // Memperbarui jam dan tanggal setiap detik
        setInterval(updateDateTime, 1000);

        // Memanggil fungsi pertama kali untuk langsung menampilkan jam dan tanggal saat halaman dimuat
        updateDateTime();

        function shiftPegawai() {
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

            let shift, jamkerja;
            if (timeString >= "03:00:00" && timeString <= "05:00:00") {
                shift = "Pagi 1";
                jamkerja = "04.00 - 12.00";
            } else if (timeString >= "06:00:00" && timeString <= "08:10:00") {
                shift = "Pagi 2";
                jamkerja = "07.00 - 14.00";
            } else if (timeString >= "08:30:00" && timeString <= "09:30:00") {
                shift = "Middle 1";
                jamkerja = "09.00 - 16.00";
            } else if (timeString >= "09:30:00" && timeString <= "10:30:00") {
                shift = "Middle 2";
                jamkerja = "10.00 - 17.00";
            } else if (timeString >= "11:30:00" && timeString <= "12:30:00") {
                shift = "Middle 3";
                jamkerja = "12.00 - 19.00";
            } else if (timeString >= "13:00:00" && timeString <= "15:00:00") {
                shift = "Siang";
                jamkerja = "14.00 - 21.00";
            } else if (timeString >= "20:00:00" && timeString <= "22:00:00") {
                shift = "Malam";
                jamkerja = "21.00 - 07.00";
            } else {
                shift = "Anda berada di luar jam kerja";
            }
            document.getElementById('shift').value = shift;
            document.getElementById('jamkerja').textContent = jamkerja;
        }
        shiftPegawai();
    </script>
@endsection

@push('myscript')
    <script>
        Webcam.set({
            height: 480,
            width: 640,
            image_format: 'jpeg',
            jpeg_quality: 80,
        });

        Webcam.attach('.webcam-capture');

        var lokasi = document.getElementById('lokasi');
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }


        function successCallback(posisi) {
            lokasi.value = posisi.coords.latitude + "," + posisi.coords.longitude;
            // Check if 'lokasi' value is empty
            // if (!lokasi.value.trim()) {
            //     alert('Warning: Lokasi is empty. Please enable location services or manually enter your location.');
            //     return; // Exit function if 'lokasi' is empty
            // }
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

        function errorCallback() {

        }

        // $.ajaxSetup({
        //     headers: {
        //         ‘X-CSRF-TOKEN’: $(‘meta[name=”csrf-token”]’).attr(‘content’)
        //     }
        // });


        $("#camera").click(function(e) {
            var lokasi = $("#lokasi").val().trim(); // Get and trim the value of 'lokasi' input field
            var shift = $("#shift").val();
            // console.log(shift);
            // Check if 'lokasi' value is empty
            if (!lokasi) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lokasi Anda Kosong',
                    text: 'Mohon izinkan atau aktifkan lokasi anda terlebih dahulu. Jika belum bisa harap hubungi IT',
                });
                return; // Exit function if 'lokasi' is empty
            }
            if (shift.toLowerCase() == "anda berada di luar jam kerja") {
                Swal.fire({
                    icon: 'error',
                    title: 'Anda berada di luar jam kerja',
                    text: 'Mohon mengisi presensi sesuai dengan jam kerja!!!',
                })
                setTimeout("location.href='dashboard'", 3000);
                return;
            }
            Webcam.snap(function(uri) {
                image = uri;
            });
            var lokasi = $("#lokasi").val();
            var shift = $('#shift').val();
            console.log(shift);

            $.ajax({
                type: 'POST',
                url: 'presensi/public/masuk',
                data: {
                    _token: "{{ csrf_token() }}",
                    image: image,
                    lokasi: lokasi,
                    shift: shift,
                },
                cache: false,
                success: function(respond) {
                    var status = respond.split("|");
                    if (status[0] == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
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
    </script>
@endpush
