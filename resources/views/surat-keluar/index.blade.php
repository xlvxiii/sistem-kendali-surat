@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Surat Keluar') }}</div>

                    <div class="card-body">
                        <a href="/suratKeluar/create">
                            <button class="btn btn-sm btn-success mb-2"><i class="bi bi-file-earmark-plus-fill"></i>Tambah Surat</button>
                        </a>
                        <table id="suratKeluarTable" class="display table table-borderless table-hover table-striped table-sm fs-6">
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

                                                <a href="/suratKeluar/{{ $suratKeluar->id }}/edit" class="btn btn-sm btn-warning mx-1" title="Edit">
                                                    <span class="bi bi-pencil-fill"></span>
                                                </a>
                                                <form action="/suratKeluar/{{ $suratKeluar->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                        <span class="bi bi-x-circle-fill"></span>
                                                    </button>
                                                </form>
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
                                                            <iframe src="{{ asset('storage/' . $suratKeluar->file . '#zoom=FitW') }}" height="450" class="embed-responsive embed-responsive-item"></iframe>
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
                </div>
            </div>
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $('#suratKeluarTable').DataTable();
        });
    </script>
@endsection
