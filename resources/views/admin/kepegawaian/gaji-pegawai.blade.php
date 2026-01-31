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
                            <a href="" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal"
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
                            </a>
                            <a href="" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal"
                                data-bs-target="#modal-komponen-gaji" aria-label="Buat User Baru">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
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
                            <form action="{{ url('user') }}" method="GET">
                                <div class="input-group">
                                    <input type="search" value="{{ Request::get('search') }}" class="form-control"
                                        placeholder="Search…" name="search" aria-label="Search in website">
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
                    {{-- {{ $userTable->withQueryString()->links() }} --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.layout.modal')
    <script>
        $(document).ready(function() {
            function loadData() {
                $.ajax({
                    url: '{{ url('/get-data-gaji-pegawai') }}', // Adjust URL if needed
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        let html = '';
                        response.datas.forEach(function(item, index) {
                            html += '<tr>';
                            html += '<td>' + (index + 1) + '</td>';
                            html += '<td>' + item.nip_pegawai + '</td>';
                            html += '<td>' + item.nama_pegawai + '</td>';
                            html += '<td>' + item.pgpns + '</td>';
                            html += '<td>' + item.tahunpgpns + '</td>';
                            html += '<td>' + item.dasarbpjsks + '</td>';
                            html += '<td>' + item.dasarbpjstk + '</td>';
                            html += '</tr>';
                        });
                        $('#tablePegawai').html(html);
                    },
                    error: function() {
                        console.error('Error fetching data');
                    }
                });
            }
            loadData();
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
                        $('#hargaLayanan').val(response.harga);
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
                            // loadData();
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

        });
    </script>
@endsection
