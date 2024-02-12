<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>E-Presensi RSSAK</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Logo_RSSA.png') }}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/icon/192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <style>
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #eye-icon {
            display: none;
        }
    </style>
    {{-- Script Copyright Otomatis --}}
    <script>
        window.onload = function() {
            const currentYear = new Date().getFullYear();
            const copyrightElement = document.getElementById("copyright");
            copyrightElement.textContent = "Copyright © " + currentYear;
        };
    </script>
    {{-- Script Copyright Otomatis --}}

    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="assets/img/logo_rssak.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h1>E-PRESENSI</h1>
                <h4>Silahkan Login</h4>
            </div>
            <div class="section mt-1 mb-5">
                @if ($errors->any())
                    <div class="alert alert-outline-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('proseslogin') }}" method="POST">
                    @csrf
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="text" name="nip" class="form-control" id="nip"
                                placeholder="Nomor Induk Pegawai">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="password" oninput="toggleeye()">
                            {{-- <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i> --}}
                            <span class="toggle-password" onclick="togglePassword()">
                                <img id="eye-icon" src="{{ asset('assets/img/eye-closed.png') }}" alt="Toggle Password"
                                    width="20">
                            </span>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            <a href="{{ route('register') }}">Daftar</a>
                        </div>
                        <div><a href="{{ route('resetPassword') }}" class="text-muted">Lupa Password?</a></div>
                    </div>
                    <footer>
                        <div class="text-center mt-5">
                            <p class="foter-down" id="copyright"></p>
                            <p class="foter-down">Version 1.0.0</p>
                            <p class="foter-down">
                                <i>Development by Muhammad Abdul Wahab</i>
                            </p>
                        </div>
                    </footer>
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->

    <script>
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        function toggleeye() {
            // Remove the toggle element if the input is empty
            if (passwordInput.value.trim() !== '') {
                eyeIcon.style.display = 'block';
            } else {
                eyeIcon.style.display = 'none';
            }
        }

        function togglePassword() {
            // Open toggle 
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.src = 'assets/img/eye.png'; // Ganti dengan path gambar mata tertutup
            } else {
                passwordInput.type = 'password';
                eyeIcon.src = 'assets/img/eye-closed.png'; // Ganti dengan path gambar mata terbuka
            }
        }
    </script>

    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{ asset('assets/js/lib/jquery-3.4.1.min.js') }}"></script>
    <!-- Bootstrap-->
    <script src="{{ asset('assets/js/lib/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/lib/bootstrap.min.js') }}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/js/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{ asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js') }}"></script>
    <!-- Base Js File -->
    <script src="{{ asset('assets/js/base.js') }}"></script>


</body>

</html>
