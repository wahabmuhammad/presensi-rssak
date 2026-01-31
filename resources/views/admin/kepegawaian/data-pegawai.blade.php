@extends('admin.layout.masterLayout')
@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    @if ($errors->any())
                        <div class="alert alert-outline-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col">
                        <!-- Page pre-title -->
                        <div class="page-pretitle">
                            Administrator
                        </div>
                        <h2 class="page-title">
                            Data Pegawai
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                </svg>
                                Tambah Pegawai
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-report">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                                </svg>
                                Tambah Pegawai
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-auto ms-auto mb-1 mt-3">
        <form action="{{ url('user') }}" method="GET">
            <div class="input-group">
                <input type="search" value="{{ Request::get('search') }}" class="form-control" placeholder="Search…"
                    name="search" aria-label="Search in website">
                <button class="btn btn-primary" type="submit">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                    </svg>
                </button>
            </div>
        </form>
    </div> --}}
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Daftar User</h3>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-secondary">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm" value="8" size="3"
                                    aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-secondary">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="search" value="" class="form-control"
                                        placeholder="Search…" name="search" aria-label="Search in website" id="search">
                                    <button class="btn btn-primary" type="submit">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                            <path d="M21 21l-6 -6" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="max-height: 600px; overflow:auto;">
                    <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>NIK</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Panggilan</th>
                                <th>GOL / MK</th>
                                <th>Awal Masuk</th>
                                <th>TMT</th>
                                <th>SK PT</th>
                                <th>Status Pegawai</th>
                                <th>Jenis Kelamin</th>
                                <th>Formasi</th>
                                <th>Jabatan</th>
                                <th>Jenis Pegawai</th>
                                <th>Unit Kerja</th>
                                <th>Nomor HP</th>
                                <th>Email</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Lulusan / Tahun</th>
                                <th>Pendidikan Terakhir / Usia</th>
                                <th>Program Studi</th>
                                <th>Status Perkawinan</th>
                                <th>Alamat</th>
                                {{-- <th class="w-1"></th> --}}
                            </tr>
                        </thead>
                        <tbody id="tablePegawai">
                            {{-- Data akan dimuat di sini melalui AJAX --}}
                        </tbody>
                    </table>
                    {{-- {{ $userTable->withQueryString()->links() }} --}}
                    {{-- Loading Animate --}}
                    <div id="loading" style="display:none;">
                        <div class="container container-slim py-4">
                            <div class="text-center">
                                {{-- <div class="mb-3">
                                    <a href="." class="navbar-brand navbar-brand-autodark"><img
                                            src="./static/logo-small.svg" height="36" alt=""></a>
                                </div> --}}
                                <div class="text-secondary mb-3">Memuat Data</div>
                                <div class="progress progress-sm">
                                    <div class="progress-bar progress-bar-indeterminate"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pagination-links" id="pagination-links">
                        {{-- {{ $datas->links() }} <!-- Menampilkan link pagination --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal --}}
    @include('admin.layout.modal')


    <script type="text/javascript">
        $(document).ready(function() {
            // console.log('ok');

            function loadData(page = 1) {
                $.ajax({
                    url: "get/data-pegawai?page=" + page, // endpoint API
                    type: "GET",
                    dataType: "json",
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var rows = '';
                        var startIndex = (page - 1) *
                            10;

                        $.each(response.datas, function(index, item) {
                            // console.log(item);
                            var rowNumber = startIndex + index + 1;
                            rows += `
                        <tr class="pegawai-row">
                            <td>${rowNumber}</td>
                            <td>${item.nip}</td>
                            <td>${item.nik}</td>
                            <td>${item.nama_lengkap}</td>
                            <td>${item.nama_panggilan}</td>
                            <td>${item.gol_mk}</td>
                            <td>${item.awal_masuk_formatted}</td>
                            <td>${item.tmt_formatted}</td>
                            <td>${item.sk_pt_formatted}</td>
                            <td>${item.status_kerja}</td>
                            <td>${item.jenis_kelamin_text}</td>
                            <td>${item.formasi}</td>
                            <td>${item.jabatan}</td>
                            <td>${item.jenispegawai}</td>
                            <td>${item.unitkerja}</td>
                            <td>${item.nohp ?? '-'}</td>
                            <td>${item.email ?? '-'}</td>
                            <td>${item.tempat_lahir}, ${item.tgl_lahir_formatted}</td>
                            <td>${item.alumni}</td>
                            <td>${item.nama_pendidikan} / ${item.usia} th</td>
                            <td>${item.program_studi}</td>
                            <td>${item.status_kawin}</td>
                            <td>${item.alamat}</td>
                        </tr>
                    `;
                        });

                        $("#tablePegawai").html(rows);
                        $('#pagination-links').html(response.pagination);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal memuat data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading").hide();
                    }
                });
            }

            function searchData(keyword, page = 1) {
                $.ajax({
                    url: "get/data-pegawai",
                    type: "GET",
                    dataType: "json",
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(response) {
                        var rows = '';
                        var startIndex = (page - 1) * 10;

                        $.each(response.datas, function(index, item) {
                            var rowNumber = startIndex + index + 1;
                            rows += `
                    <tr class="pegawai-row">
                        <td>${rowNumber}</td>
                        <td>${item.nip}</td>
                        <td>${item.nik}</td>
                        <td>${item.nama_lengkap}</td>
                        <td>${item.nama_panggilan}</td>
                        <td>${item.gol_mk}</td>
                        <td>${item.awal_masuk_formatted}</td>
                        <td>${item.tmt_formatted}</td>
                        <td>${item.sk_pt_formatted}</td>
                        <td>${item.status_kerja}</td>
                        <td>${item.jenis_kelamin_text}</td>
                        <td>${item.formasi}</td>
                        <td>${item.jabatan}</td>
                        <td>${item.jenispegawai}</td>
                        <td>${item.unitkerja}</td>
                        <td>${item.nohp ?? '-'}</td>
                        <td>${item.email ?? '-'}</td>
                        <td>${item.tempat_lahir}, ${item.tgl_lahir_formatted}</td>
                        <td>${item.alumni}</td>
                        <td>${item.nama_pendidikan} / ${item.usia} th</td>
                        <td>${item.program_studi}</td>
                        <td>${item.status_kawin}</td>
                        <td>${item.alamat}</td>
                    </tr>
                `;
                        });

                        $("#tablePegawai").html(rows);
                        $("#pagination-links").html(response.pagination);
                    },
                    error: function() {
                        Swal.fire("Error", "Gagal mencari data pegawai!", "error");
                    },
                    complete: function() {
                        $("#loading").hide();
                    }
                });
            }

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadData(page);
            });
            loadData();
            $('#search').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchData(keyword);
                } else {
                    loadData();
                }
            });

            function updateNamaLengkap() {
                let depan = $('#gelar_depan').val();
                let nama = $('#nama_pegawai').val();
                let belakang = $('#gelar_belakang').val();

                let full = '';

                if (depan) full += depan + '. ';
                if (nama) full += nama;
                if (belakang) full += ', ' + belakang;

                $('#nama_lengkap').val(full.trim());
            }

            $('#gelar_depan, #nama_pegawai, #gelar_belakang').on('keyup change', updateNamaLengkap);

            $.get('pegawai/options', function(res) {

                let statusPegawai = '';
                res.statusPegawai.forEach(e => {
                    statusPegawai += `<option value="${e.id}">${e.status_kerja}</option>`;
                });
                $('select[name=status_pegawaifk]').html(statusPegawai);

                let jabatan = '';
                res.jabatan.forEach(e => {
                    jabatan += `<option value="${e.id}">${e.namajabatan}</option>`;
                });
                $('select[name=jabatan_fk]').html(jabatan);

                let tunjanganFungsional = '';
                res.tunjanganFungsional.forEach(e => {
                    tunjanganFungsional +=
                        `<option value="${e.id}">${e.jabatan_fungsional}</option>`;
                });
                $('select[name=tunjangan_fungsional_fk]').html(tunjanganFungsional);
                let formasi = '';
                res.formasi.forEach(e => {
                    formasi += `<option value="${e.id}">${e.formasi}</option>`;
                });
                $('select[name=formasi_fk]').html(formasi);

                let ruangan = '';
                res.ruangan.forEach(e => {
                    ruangan += `<option value="${e.id_ruangan}">${e.nama_ruangan}</option>`;
                });
                $('select[name=unitkerja]').html(ruangan);

                let pendidikan = '';
                res.pendidikan.forEach(e => {
                    pendidikan += `<option value="${e.id}">${e.nama_pendidikan}</option>`;
                });
                $('select[name=pendidikan_fk]').html(pendidikan);

                let jenisPegawai = '';
                res.jenisPegawai.forEach(e => {
                    jenisPegawai += `<option value="${e.id}">${e.jenispegawai}</option>`;
                });
                $('select[name=jenispegawai_fk]').html(jenisPegawai);

                let statusKawin = '';
                res.statusKawin.forEach(e => {
                    statusKawin += `<option value="${e.id}">${e.status_kawin}</option>`;
                });
                $('select[name=status_kawinfk]').html(statusKawin);

            });

            function saveData(formData) {
                $.ajax({
                    url: 'pegawai/store', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // If successful, fetch updated data
                            $('#modal-report').modal('hide');
                            loadData();
                            // Optionally, you can reset the form here
                            $('#form-inputpegawai')[0]
                                .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: "Data pegawai berhasil disimpan!",
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal menyimpan data pegawai!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error saving data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal menyimpan data pegawai!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }

            $('#form-inputpegawai').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveData(formData); // Call the saveData function
            });

            $('.table').on('click', '.pegawai-row', function() {
                patientId = $(this).data('id');

                $('.pegawai-row').removeClass('highlight');
                // Tambahkan highlight pada baris yang dipilih
                $(this).addClass('highlight');
                // Klik di luar tabel untuk menghapus highlight
                $(document).on('click', function(e) {
                    if (!$(e.target).closest('.table').length) {
                        // Hapus highlight jika klik di luar tabel
                        $('.pegawai-row').removeClass('highlight');
                        patientId = null;
                    }
                });
            });

            // loadData();
        });
    </script>
@endsection
