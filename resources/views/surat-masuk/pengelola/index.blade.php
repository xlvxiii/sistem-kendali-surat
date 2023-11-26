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
                        <p class="text-subtitle text-muted">{{ __('Anda login sebagai pengelola!') }}</p>
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
                        <a href="/suratMasukPengelola/create">
                            <button class="btn btn-sm btn-success mb-2"><i class="bi bi-file-earmark-plus-fill mr-1"></i>Tambah Surat</button>
                        </a>
                        <a href="/suratMasukPengelola/export">
                            <button class="btn btn-sm btn-primary mb-2"><i class="bi bi-floppy-fill mr-1"></i>Export</button>
                        </a>
                        <table id="suratMasukTable" class="display table table-borderless table-hover table-responsive table-striped fs-6">
                            <caption>Data Surat Masuk</caption>
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>No. Surat</th>
                                    <th>Tanggal</th>
                                    <th>Diterima</th>
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
                                        <td>{{ $suratMasuk->asal_surat }}</td>
                                        <td>{{ $suratMasuk->nomor_agenda }}</td>
                                        <td>{{ $suratMasuk->status }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <a href="/suratMasukPengelola/{{ $suratMasuk->id }}" class="badge bg-success text-bg-dark py-2" title="Detail">
                                                    <span class="bi bi-eye-fill"></span>
                                                </a>
                                                <a href="/suratMasukPengelola/{{ $suratMasuk->id }}/edit" class="badge bg-warning text-bg-dark mx-1 py-2" title="Edit">
                                                    <span class="bi bi-pencil-fill"></span>
                                                </a>
                                                <form action="/suratMasukPengelola/{{ $suratMasuk->id }}" method="post" id="{{ 'delete-form' . $loop->iteration }}" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="button" id="{{ 'delete-button' . $loop->iteration }}" class="btn btn-sm btn-danger" title="Delete">
                                                        <span class="bi bi-x-circle-fill"></span>
                                                    </button>

                                                    <script>
                                                        document.getElementById("{{ 'delete-button' . $loop->iteration }}").addEventListener("click", (e) => {
                                                            Swal.fire({
                                                                icon: "question",
                                                                titleText: "Are you sure?",
                                                                text: "This will delete this data permanently. You cannot undo this action.",
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Delete',
                                                                focusCancel: true,
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById("{{ 'delete-form' . $loop->iteration }}").submit()
                                                                }
                                                            })
                                                        });
                                                    </script>
                                                </form>
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
