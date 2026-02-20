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
                            Data Gaji Pegawai
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block" id="editKomponenGaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-user-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h3.5" />
                                    <path d="M18.42 15.61a2.1 2.1 0 0 1 2.97 2.97l-3.39 3.42h-3v-3l3.42 -3.39" />
                                </svg>
                                Edit Komponen Gaji
                            </button>
                        </div>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <div class="btn-list">
                            <button class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-csv">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" />
                                    <path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" />
                                    <path
                                        d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" />
                                    <path d="M16 15l2 6l2 -6" />
                                </svg>
                                Tambah Komponen Gaji
                            </button>
                            {{-- <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji" aria-label="Buat User Baru">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12", style="margin-top: 30px">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-tittle">Daftar Pegawai</h3>
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
                                    <input type="search" value="" class="form-control" placeholder="Search…"
                                        name="search" aria-label="Search in website" id="search">
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
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table table-bordered table-sticky">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIP</th>
                                <th>Nama Pegawai</th>
                                <th>PGPNS</th>
                                <th>Tahun PGPNS</th>
                                <th>Dasar BPJS KS</th>
                                <th>Dasar BPJS TK</th>
                                {{-- <th class="w-1"></th> --}}
                            </tr>
                        </thead>
                        <tbody id="tablePegawai">
                            {{-- diisi dengan ajax --}}
                        </tbody>
                    </table>
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
    @include('admin.layout.modal')
    <script>
        $(document).ready(function() {
            function loadData(page = 1) {
                $.ajax({
                    url: '{{ url('/get-data-gaji-pegawai?page=') }}' + page,
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        // Tampilkan loading atau indikator lainnya jika diperlukan
                        $("#loading").show();
                    },
                    success: function(response) {
                        // console.log(response);
                        var html = '';
                        var startIndex = (page - 1) *
                            10;
                        // let html = '';
                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id_komponengaji +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.nip_pegawai + '</td>';
                            html += '<td>' + item.nama_pegawai + '</td>';
                            html += '<td>' + item.pgpns + '</td>';
                            html += '<td>' + item.tahunpgpns + '</td>';
                            html += '<td>' + (item.dasarbpjsks ?? '-') + '</td>';
                            html += '<td>' + (item.dasarbpjstk ?? '-') + '</td>';
                            html += '</tr>';
                        });
                        $('#tablePegawai').html(html);
                        $('#pagination-links').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    },
                    complete: function() {
                        // Sembunyikan loading setelah permintaan selesai
                        $("#loading").hide();
                    }
                });
            }
            loadData();

            function searchData(keyword, page = 1) {
                $.ajax({
                    url: '{{ url('/get-data-gaji-pegawai') }}',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        keyword: keyword,
                        page: page
                    },
                    beforeSend: function() {
                        $("#loading").show();
                    },
                    success: function(response) {
                        var html = '';
                        var startIndex = (page - 1) * 10;

                        response.datas.forEach(function(item, index) {
                            var rowNumber = startIndex + index + 1;
                            html += '<tr class="pegawai-row" data-id="' + item.id_komponengaji +
                                '">';
                            html += '<td>' + rowNumber + '</td>';
                            html += '<td>' + item.nip_pegawai + '</td>';
                            html += '<td>' + item.nama_pegawai + '</td>';
                            html += '<td>' + item.pgpns + '</td>';
                            html += '<td>' + item.tahunpgpns + '</td>';
                            html += '<td>' + (item.dasarbpjsks ?? '-') + '</td>';
                            html += '<td>' + (item.dasarbpjstk ?? '-') + '</td>';
                            html += '</tr>';
                        });

                        $('#tablePegawai').html(html);
                        $('#pagination-links').html(response.pagination);
                    },
                    error: function() {
                        console.error('Error searching data');
                    },
                    complete: function() {
                        $("#loading").hide();
                    }
                });
            }

            function showSuggestions() {
                $('#suggestionsList').show();
                $('#modalBodyBottom').addClass('with-suggestion');
            }

            function hideSuggestions() {
                $('#suggestionsList').hide();
                $('#modalBodyBottom').removeClass('with-suggestion');
            }

            $('#namapegawai').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 1) { // Start searching after 1 characters
                    $.ajax({
                        url: '{{ url('/get-pegawai') }}', // Adjust URL if needed
                        method: 'GET',
                        data: {
                            query: query,
                        },
                        success: function(response) {
                            // Show the suggestions
                            let suggestionsList = $('#suggestionsList');
                            suggestionsList.empty(); // Clear previous suggestions
                            if (response.length > 0) {
                                response.forEach(function(item) {
                                    suggestionsList.append(
                                        '<li class="list-group-item" data-id="' +
                                        item.id + '">' + item.nama_lengkap + '</li>'
                                    );
                                });
                                showSuggestions();
                            } else {
                                hideSuggestions();
                            }
                            // console.log(response);
                        },
                        error: function() {
                            // Handle error (optional)
                        }
                    });
                } else {
                    hideSuggestions(); // Hide suggestions if input is too short
                }
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadData(page);
            });

            $('#search').on('keyup', function() {
                let keyword = $(this).val();

                if (keyword.length > 0) {
                    searchData(keyword);
                } else {
                    loadData(); // balik ke data awal
                }
            });


            // Select a suggestion
            $(document).on('click', '#suggestionsList li', function() {
                let selectedText = $(this).text();
                let selectedId = $(this).data('id');
                $('#namapegawai').val(selectedText);
                $('#idpegawai').val(selectedId);
                $.ajax({
                    url: '{{ url('/get-komponen-gaji/pegawai') }}', // Adjust URL if needed
                    method: 'GET',
                    data: {
                        data: selectedId,
                    },
                    success: function(response) {
                        // $('#hargaLayanan').val(response.harga);
                    }
                });
                hideSuggestions();
            });

            //ketika diklik di luar suggestionsList, maka suggestionsList hilang
            $(document).on('click', function(e) {
                if (!$(e.target).closest('#namapegawai, #suggestionsList').length) {
                    hideSuggestions();
                }
            });

            function saveData(formData) {
                $.ajax({
                    url: 'gaji-pegawai/komponen-gaji/save', // Adjust this URL to your save endpoint
                    method: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        // Check if the save was successful
                        if (response.success) {
                            // console.log(response);
                            // If successful, fetch updated data
                            // $('#modal-report').modal('hide');
                            loadData();
                            // Optionally, you can reset the form here
                            // $('#form-inputgajipegawai')[0]
                            //     .reset(); // Assuming your form has the ID 'form-inputpegawai'

                            Swal.fire({
                                title: "Success",
                                text: response.message,
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

            $('#form-inputgajipegawai').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                saveData(formData); // Call the saveData function
                loadData();
            });
            //selected komponen gaji pegawai untuk diedit
            // Handle row click to select pegawai
            let pegawaiId = null;

            // Klik baris pegawai
            $('.table').on('click', '.pegawai-row', function(e) {
                e.stopPropagation(); // cegah event document

                pegawaiId = $(this).data('id');
                console.log(pegawaiId);

                $('.pegawai-row').removeClass('highlight');
                $(this).addClass('highlight');
            });

            // Klik di luar tabel → reset
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.table').length) {
                    $('.pegawai-row').removeClass('highlight');
                    pegawaiId = null;
                    console.log(pegawaiId);
                }
            });
            //edit komponen gaji pegawai
            $('#editKomponenGaji').on('click', function() {
                if (!pegawaiId) {
                    Swal.fire({
                        title: "Error",
                        text: "Pilih pegawai terlebih dahulu!",
                        icon: "warning",
                        confirmButtonText: "OK"
                    });
                    return;
                }
                // console.log(pegawaiId);
                $.get(`pegawai/${pegawaiId}/get-komponen-gaji`, function(pegawai) {
                    // Load options → setelah selesai baru set value
                    $('[name=id_komponengaji]').val(pegawai.id_komponengaji);
                    $('[name=pegawai_fk]').val(pegawai.id_pegawai);
                    $('[name=namapegawai]').val(pegawai.nama_lengkap);
                    $('[name=pgpns]').val(pegawai.pgpns);
                    $('[name=tahunpgpns]').val(pegawai.tahunpgpns);
                    $('[name=dasarbpjsks]').val(pegawai.dasarbpjsks);
                    $('[name=dasarbpjstk]').val(pegawai.dasarbpjstk);
                    $('#modal-editkomponen-gaji').modal('show');
                });
                // Isi data ke modal
            });

            function updateKomponenGaji(formData) {
                $.ajax({
                    url: '{{ url('pegawai/komponen-gaji/update') }}', // Adjust this URL to your update endpoint
                    method: 'PUT',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            loadData();
                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                confirmButtonText: "OK"
                            });
                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Gagal memperbarui data komponen gaji!",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating data:', error);
                        Swal.fire({
                            title: "Error",
                            text: "Gagal memperbarui data komponen gaji!",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                });
            }
            $('#form-editgajipegawai').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize the form data

                updateKomponenGaji(formData); // Call the updateKomponenGaji function
            });
            //reset form ketika modal ditutup
            $('#modal-komponen-gaji').on('hidden.bs.modal', function() {

                // reset form input
                $('#form-inputkomponen-gaji')[0].reset();

                // reset semua select (biar kosong)
                $('#form-inputkomponen-gaji select').val(null).trigger('change');

                // hapus highlight row
                $('.pegawai-row').removeClass('highlight');

                // reset id pegawai
                pegawaiId = null;
            });
            $('#modal-editkomponen-gaji').on('hidden.bs.modal', function() {

                // reset form input
                $('#form-editkomponen-gaji')[0].reset();

                // reset semua select (biar kosong)
                $('#form-editkomponen-gaji select').val(null).trigger('change');

                // hapus highlight row
                $('.pegawai-row').removeClass('highlight');

                // reset id pegawai
                pegawaiId = null;
            });
        });
    </script>
@endsection
