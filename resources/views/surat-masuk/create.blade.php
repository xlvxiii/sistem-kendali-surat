@extends('layouts.main')

@section('content')
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ __($title) }}</h3>
                        <p class="text-subtitle text-muted">{{ __('You are logged in as admin!') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- page content --}}
        <div class="page-content">
            <a href="{{ url('suratMasuk') }}" class="btn btn-primary mb-3">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
            <section class="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Tambah Surat Masuk') }}</h4>
                            </div>

                            {{-- form layout --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/suratMasuk" method="post" enctype="multipart/form-data" class="form form-vertical">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">

                                                {{-- input nomor surat --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat') }}" autofocus>
                                                            @error('nomor_surat')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-file-earmark-text"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input perihal --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="perihal" class="form-label">Perihal</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal') }}">
                                                            @error('perihal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-chat-left-quote"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input nomor agenda --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="nomor_agenda" class="form-label">Nomor Agenda</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('nomor_agenda') is-invalid @enderror" id="nomor_agenda" name="nomor_agenda" value="{{ old('nomor_agenda') }}">
                                                            @error('nomor_agenda')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar-week"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input asal --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="asal_surat" class="form-label">Asal Surat</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" name="asal_surat" value="{{ old('asal_surat') }}">
                                                            @error('asal_surat')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-building-up"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input tanggal surat --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                                        <div class="position-relative">
                                                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat') }}">
                                                            @error('tanggal_surat')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar2-date"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input tanggal diterima --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
                                                        <div class="position-relative">
                                                            <input type="date" class="form-control @error('tanggal_diterima') is-invalid @enderror" id="tanggal_diterima" name="tanggal_diterima" value="{{ old('tanggal_diterima') }}">
                                                            @error('tanggal_diterima')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-calendar2-date"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input file --}}
                                                <div class="col-md-6 col-12">
                                                    <label for="file-surat" class="form-label">File Surat</label>
                                                    <input type="file" accept="application/pdf" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
                                                    @error('file')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                {{-- input jenis disposisi --}}
                                                <div class="col-md-6 col-12">
                                                    <label for="jenis_disposisi_id" class="form-label">Jenis Disposisi</label>
                                                    <div class="input-group mb-3">
                                                        <label class="input-group-text" for="jenis_disposisi_id">
                                                            <span class="">
                                                                <i class="bi bi-person-badge-fill"></i>
                                                            </span>
                                                        </label>
                                                        <select class="form-select" id="jenis_disposisi_id" name="jenis_disposisi_id">
                                                            @foreach ($disposisi as $row)
                                                                @if (old('jenis_disposisi_id') == $row->id)
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
                                                </div>

                                                {{-- input catatan --}}
                                                <div class="col-md-6 col-12">
                                                    <label for="catatan" class="form-label">Catatan</label>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a comment here" name="catatan" id="catatan" style="height: 100px">{{ old('catatan') }}</textarea>
                                                        <label for="catatan">Leave a comment</label>
                                                    </div>
                                                    @error('catatan')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
