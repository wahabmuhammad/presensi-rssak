@extends('layouts.presensi')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                <h4>Lupa password</h4><hr>
                <form action="{{ route('reset') }}" method="post" autocomplete="off">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{session()->get('status')}}
                    </div>
                    @endif
                    @csrf
                    <p>
                        Masukkan Email Anda dan Silahkan cek email anda untuk link reset Password.
                    </p>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary">Kirim Link Reset Password</button>
                        </div>
                        <br>
                </form>
                <a href="{{ route('login') }}">Login</a>
        </div>
    </div>
</div>
@endsection