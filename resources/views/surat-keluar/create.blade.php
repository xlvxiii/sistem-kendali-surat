@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Surat Keluar') }}</div>

                    <div class="card-body">

                        <div class="col-lg-8">
                            <form action="/suratKeluar" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="mb-3">
                                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" autofocus>
                                    @error('nomor_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                                    @error('tanggal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                                    <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" id="tanggal_kirim" name="tanggal_kirim" value="{{ old('tanggal_kirim') }}">
                                    @error('tanggal_kirim')
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
                                    <label for="tujuan" class="form-label">Tujuan</label>
                                    <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan') }}">
                                    @error('tujuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="asal_surat" class="form-label">Asal Surat</label>
                                    <input type="text" class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" name="asal_surat" value="{{ old('asal_surat') }}">
                                    @error('asal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">File Surat</label>
                                    <input type="file" accept="image/*,.pdf" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                                    @error('file')
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
