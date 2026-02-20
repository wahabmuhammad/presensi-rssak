@extends('layouts.presensi')

@section('content')
    <div class="appCapsule">
        <div class="section" id="user-section">
            <div id="user-detail">
                <div class="avatar">
                    <img src="{{ asset('assets/img/sample/avatar/avatar1.jpg') }}" alt="avatar" class="imaged w64 rounded">
                </div>
                <div id="user-info">
                    <h2 id="user-name">{{ Auth::user()->name }}</h2>
                    <span id="user-role" style="font-size: medium">
                        {{ Auth::user()->jabatan }}
                    </span>
                </div>
            </div>
        </div>

        <div class="section mt-1" id="presence-section">
            <div class="presencetab mt-2" style="margin-bottom: 80px">
                <div class="page-body">
                    <div class="container-xxl">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Slip Gaji</h5>
                            </div>

                            <div class="card-body">

                                {{-- FILTER BULAN & TAHUN --}}
                                <form method="GET" action="">
                                    <div class="row mb-3">
                                        <div class="col-md-4 p-1">
                                            <label>Bulan</label>
                                            <select name="bulan" class="form-control" required>
                                                @foreach (range(1, 12) as $b)
                                                    <option value="{{ $b }}"
                                                        {{ request('bulan') == $b ? 'selected' : '' }}>
                                                        {{ \Carbon\Carbon::create()->month($b)->translatedFormat('F') }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 p-1">
                                            <label>Tahun</label>
                                            <select name="tahun" class="form-control" required>
                                                @for ($t = date('Y'); $t >= 2023; $t--)
                                                    <option value="{{ $t }}"
                                                        {{ request('tahun') == $t ? 'selected' : '' }}>
                                                        {{ $t }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-4 d-flex align-items-end p-1">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Tampilkan
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <hr>

                                {{-- DATA SLIP GAJI --}}
                                @isset($slip)
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Gaji Pokok</th>
                                                <td>Rp {{ number_format($slip->gaji_pokok, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tunjangan</th>
                                                <td>Rp {{ number_format($slip->tunjangan, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Potongan</th>
                                                <td>Rp {{ number_format($slip->potongan, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr class="table-success">
                                                <th>Total Diterima</th>
                                                <th>
                                                    Rp {{ number_format($slip->total_gaji, 0, ',', '.') }}
                                                </th>
                                            </tr>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-info">
                                        Silakan pilih bulan dan tahun untuk melihat slip gaji.
                                    </div>
                                @endisset

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('layouts.bottomNav')
