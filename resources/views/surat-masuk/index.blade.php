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
                    <div class="card-header">{{ __('Surat Masuk') }}</div>

                    <div class="card-body">
                        <a href="/suratMasuk/create">
                            <button class="btn btn-sm btn-success mb-2"><i class="bi bi-file-earmark-plus-fill"></i>Tambah Surat</button>
                        </a>
                        <table id="suratMasukTable" class="display table table-borderless table-hover table-striped table-sm fs-6">
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
                                    <th>Jenis Disposisi</th>
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
                                        <td>{{ ucwords($suratMasuk->JenisDisposisi->jenis_disposisi) }}</td>
                                        <td>
                                            <div class="d-inline-flex">
                                                <button class="btn btn-sm btn-success"><span class="bi bi-eye-fill"></span></button>
                                                <a href="/suratMasuk/{{ $suratMasuk->id }}/edit" class="btn btn-sm btn-warning mx-1" title="Edit">
                                                    <span class="bi bi-pencil-fill"></span>
                                                </a>
                                                <form action="/suratMasuk/{{ $suratMasuk->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                        <span class="bi bi-x-circle-fill"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
            $('#suratMasukTable').DataTable();
        });
    </script>
@endsection
