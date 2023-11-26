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
                        <p class="text-subtitle text-muted">{{ __('Anda login sebagai kepala bagian!') }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of page heading --}}

        {{-- page content --}}
        <div class="page-content">
            <section class="row">
                @if (session()->has('success'))
                    <script>
                        Swal.fire({
                            icon: "success",
                            titleText: "Success!",
                            text: "{{ session('success') }}",
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Surat Masuk') }}</h4>
                    </div>
                    <div class="card-body">
                        <table id="suratMasukTable" class="display table table-borderless table-hover table-responsive table-striped fs-6">
                            <caption>Data Surat Masuk</caption>
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>No. Surat</th>
                                    <th>Tanggal</th>
                                    <th>Diterima</th>
                                    <th>Perihal</th>
                                    <th>Asal</th>
                                    <th>No. Agenda</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $suratMasuk)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $suratMasuk->nomor_surat }}</td>
                                        <td>{{ $suratMasuk->tanggal_surat }}</td>
                                        <td>{{ $suratMasuk->tanggal_diterima }}</td>
                                        <td>{{ $suratMasuk->perihal }}</td>
                                        <td>{{ $suratMasuk->asal_surat }}</td>
                                        <td>{{ $suratMasuk->nomor_agenda }}</td>
                                        <td>{{ $suratMasuk->status }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                @if (Route::currentRouteName() != 'pending')                                                    
                                                <a href="/suratMasukKabag/{{ $suratMasuk->id }}" class="badge bg-success text-bg-dark mx-1 py-2" title="Detail">
                                                    <span class="bi bi-eye-fill"></span>
                                                </a>
                                                @else
                                                <a href="/suratMasukKabag/pending/{{ $suratMasuk->id }}" class="badge bg-success text-bg-dark mx-1 py-2" title="Detail">
                                                    <span class="bi bi-eye-fill"></span>
                                                </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        {{-- end of page content --}}

    </div>
    <script type="module">
        $(document).ready(function() {
            $('#suratMasukTable').DataTable();
        });
    </script>
@endsection
