@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Surat Masuk') }}</div>

                    <div class="card-body">

                        <div class="col-lg-8">
                            <form action="/suratMasuk" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="noSurat" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control @error('noSurat') is-invalid @enderror" id="noSurat" name="noSurat" value="{{ old('noSurat') }}" autofocus>
                                    @error('noSurat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="asalSurat" class="form-label">Asal Surat</label>
                                    <input type="text" class="form-control @error('asalSurat') is-invalid @enderror" id="asalSurat" name="asalSurat" value="{{ old('asalSurat') }}">
                                    @error('asalSurat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal</label>
                                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}">
                                    @error('perihal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomorAgenda" class="form-label">Nomor Agenda</label>
                                    <input type="text" class="form-control @error('nomorAgenda') is-invalid @enderror" id="nomorAgenda" name="nomorAgenda" value="{{ old('nomorAgenda') }}">
                                    @error('nomorAgenda')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggalSurat" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tanggalSurat') is-invalid @enderror" id="tanggalSurat" name="tanggalSurat" value="{{ old('tanggalSurat') }}">
                                    @error('tanggalSurat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggalDiterima" class="form-label">Tanggal Diterima</label>
                                    <input type="date" class="form-control @error('tanggalDiterima') is-invalid @enderror" id="tanggalDiterima" name="tanggalDiterima" value="{{ old('tanggalDiterima') }}">
                                    @error('tanggalDiterima')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="fileSurat" class="form-label">File Surat</label>
                                    <input type="file" accept="image/*,.pdf" class="form-control @error('fileSurat') is-invalid @enderror" id="fileSurat" name="fileSurat" value="{{ old('fileSurat') }}">
                                    @error('fileSurat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenisDisposisi" class="form-label">Jenis Disposisi</label>
                                    <select class="form-select" id="jenisDisposisi" name="jenisDisposisi">
                                        @foreach ($disposisi as $jenisDisposisi)
                                            @if (old('jenisDisposisi') == $jenisDisposisi->name)
                                                <option value="{{ $jenisDisposisi->name }}" selected>{{ ucwords($jenisDisposisi->name) }}</option>
                                            @else
                                                <option value="{{ $jenisDisposisi->name }}">{{ ucwords($jenisDisposisi->name) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jenisDisposisi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
