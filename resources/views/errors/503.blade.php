@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Server dinonaktifkan. Silakan gunakan link presensi baru.'))
@section('extra')
    <div style="margin-top: 20px; text-align:center;">
        <a href="https://presensi.rssarkiesaisyiyahkudus.co.id/"
            style="background:#3490dc; color:#fff; padding:10px 20px; border-radius:5px; text-decoration:none;">
            Link Presensi Baru
        </a>
    </div>
@endsection
