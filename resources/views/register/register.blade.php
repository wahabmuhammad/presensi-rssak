<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>E-Presensi RSSAK</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/icon/192x192.png')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="manifest" href="__manifest.json">
</head>
<body>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 col-lg-9 col-xl-7">
                        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                            <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                                <form action="{{route('storedata')}}" method="POST">
                                    @csrf
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-outline-danger">
                                            <ul>
                                                @foreach ($errors->all() as $item)
                                                    <li>{{$item}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Nama Lengkap dan Gelar</label>
                                        <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{old ('name')}}"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">NIP</label>
                                        <input type="text" id="nip" name="nip" class="form-control form-control-lg @error('nip') is-invalid @enderror" value="{{old ('nip')}}"/>
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="form-outline">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" value="{{old ('email')}}" />
                                        </div>
                                </div>

                                <div class="row">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">password</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                    </div>
                                </div>

                                <div class="row">
                                        <div class="form-outline">
                                            <label class="form-label" for="jabatan">jabatan</label>
                                            <input type="text" id="jabatan" name="jabatan" class="form-control form-control-lg @error('jabatan') is-invalid @enderror" value="{{old ('jabatan')}}" />
                                        </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input id="register" name="register" class="btn btn-primary btn-lg" type="submit" value="Submit" />
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @push('myscript')
    <script>
        $('#register').click(function(e){
            success:function(respond){
                if(respond == 0){
                    Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data anda berhasil disimpan',
                    })
                    setTimeout("location.href='dashboard'",3000);
                }else{
                    Swal.fire({
                    icon: 'warning',
                    title: 'Maaf',
                    text: 'Gagal menyimpan data, Hubungi IT',
                    })
                    setTimeout("location.href='login'",3000);
                }
            }
            });
    </script>
    @endpush

        <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="{{asset('assets/js/lib/jquery-3.4.1.min.js')}}"></script>
    <!-- Bootstrap-->
    <script src="{{asset('assets/js/lib/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/bootstrap.min.js')}}"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="{{asset('assets/js/plugins/owl-carousel/owl.carousel.min.js')}}"></script>
    <!-- jQuery Circle Progress -->
    <script src="{{asset('assets/js/plugins/jquery-circle-progress/circle-progress.min.js')}}"></script>
    <!-- Base Js File -->
    <script src="{{asset('assets/js/base.js')}}"></script>
</body>
</html>
