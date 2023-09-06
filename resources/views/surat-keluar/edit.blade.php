@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Edit Surat Masuk') }}</div>

                    <div class="card-body">

                        <div class="col-lg-8">
                            <form action="/suratMasuk/{{ $suratMasuk->id }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $suratMasuk->nomor_surat) }}" autofocus>
                                    @error('nomor_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="asal_surat" class="form-label">Asal Surat</label>
                                    <input type="text" class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" name="asal_surat" value="{{ old('asal_surat', $suratMasuk->asal_surat) }}">
                                    @error('asal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal</label>
                                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal', $suratMasuk->perihal) }}">
                                    @error('perihal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_agenda" class="form-label">Nomor Agenda</label>
                                    <input type="text" class="form-control @error('nomor_agenda') is-invalid @enderror" id="nomor_agenda" name="nomor_agenda" value="{{ old('nomor_agenda', $suratMasuk->nomor_agenda) }}">
                                    @error('nomor_agenda')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', $suratMasuk->tanggal_surat) }}">
                                    @error('tanggal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                    <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror" id="tanggal_diterima" name="tanggal_diterima" value="{{ old('tanggal_diterima', $suratMasuk->tanggal_diterima) }}">
                                    @error('tanggal_diterima')
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
                                <div class="mb-3">
                                    <label for="jenis_disposisi_id" class="form-label">Jenis Disposisi</label>
                                    <select class="form-select" id="jenis_disposisi_id" name="jenis_disposisi_id">
                                        @foreach ($disposisi as $row)
                                            @if (old('jenis_disposisi_id', $suratMasuk->jenis_disposisi_id) == $row->id)
                                                <option value="{{ $row->id }}" selected>{{ ucwords($row->jenis_disposisi) }}</option>
                                            @else
                                                <option value="{{ $row->id }}">{{ ucwords($row->jenis_disposisi) }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('jenis_disposisi_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Leave a comment here" name="catatan" id="catatan" style="height: 100px">{{ $suratMasuk->catatan }}</textarea>
                                        <label for="catatan">Leave a comment</label>
                                      </div>
                                    @error('catatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- input hidden untuk menyimpan nama file yang tersimpan di database --}}
                                <input type="hidden" name="oldFile" value="{{ $suratMasuk->file }}">

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
