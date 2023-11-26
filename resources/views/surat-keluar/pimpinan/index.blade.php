@extends('layouts.main')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        {{-- page heading --}}
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ __($title) }}</h3>
                        <p class="text-subtitle text-muted">{{ __('You are logged in as pimpinan!') }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of page heading --}}

        {{-- page content --}}
        <div class="page-content">
            <section class="row">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    <script>
                        Swal.fire({
                            icon: "success",
                            titleText: "Success!",
                            text: "{{ session('success') }}",
                        })
                    </script>
                @endif
                
                {{-- card --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Surat Keluar') }}</h4>
                    </div>

                    {{-- card body --}}
                    <div class="card-body">
                        <table id="suratKeluarTable" class="display table table-borderless table-hover table-striped table-responsive fs-6">
                            <caption>Data Surat Keluar</caption>
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>No. Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Kirim</th>
                                    <th>Perihal</th>
                                    <th>Tujuan</th>
                                    <th>Asal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $suratKeluar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $suratKeluar->nomor_surat }}</td>
                                        <td>{{ $suratKeluar->tanggal_surat }}</td>
                                        <td>{{ $suratKeluar->tanggal_kirim }}</td>
                                        <td>{{ $suratKeluar->perihal }}</td>
                                        <td>{{ $suratKeluar->tujuan }}</td>
                                        <td>{{ $suratKeluar->asal_surat }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="{{ '#exampleModal' . $suratKeluar->id }}">
                                                    <span class="bi bi-eye-fill"></span>
                                                </button>
                                            </div>

                                        </td>
                                    </tr>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{ 'exampleModal' . $suratKeluar->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">File Surat</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="">
                                                        @if (!in_array(pathinfo(asset('storage/' . $suratKeluar->file), PATHINFO_EXTENSION), ['pdf']))
                                                            <img src="{{ asset('storage/' . $suratKeluar->file) }}" alt="" width="100%" height="">
                                                        @else
                                                            <iframe title="surat-keluar" src="{{ asset('storage/' . $suratKeluar->file . '#zoom=FitW') }}" height="450" class="embed-responsive embed-responsive-item"></iframe>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- end of card body --}}
                </div>
                {{-- end of card --}}
            </section>
        </div>
        {{-- end of page content --}}

    </div>
    
    <script type="module">
        $(document).ready(function() {
            $('#suratKeluarTable').DataTable();
        });
    </script>
@endsection
