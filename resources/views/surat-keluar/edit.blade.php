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
            <a href="{{ url('suratKeluar') }}" class="btn btn-primary mb-3">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
            <section class="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Edit Surat Keluar') }}</h4>
                            </div>

                            {{-- form layout --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/suratKeluar/{{ $suratKeluar->id }}" method="post" id="update-form" enctype="multipart/form-data" class="form form-vertical">
                                        @method('put')
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">

                                                {{-- input nomor surat --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $suratKeluar->nomor_surat) }}"
                                                                autofocus>
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
                                                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" value="{{ old('perihal', $suratKeluar->perihal) }}">
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

                                                {{-- input asal --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="asal_surat" class="form-label">Asal Surat</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('asal_surat') is-invalid @enderror" id="asal_surat" name="asal_surat" value="{{ old('asal_surat', $suratKeluar->asal_surat) }}">
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

                                                {{-- input tujuan --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tujuan" class="form-label">Tujuan</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan" name="tujuan" value="{{ old('tujuan', $suratKeluar->tujuan) }}">
                                                            @error('tujuan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-building-down"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- input tanggal surat --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                                                        <div class="position-relative">
                                                            <input type="date" class="form-control @error('tanggal_surat') is-invalid @enderror" id="tanggal_surat" name="tanggal_surat"
                                                                value="{{ old('tanggal_surat', $suratKeluar->tanggal_surat) }}">
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

                                                {{-- input tanggal kirim --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                                                        <div class="position-relative">
                                                            <input type="date" class="form-control @error('tanggal_kirim') is-invalid @enderror" id="tanggal_kirim" name="tanggal_kirim"
                                                                value="{{ old('tanggal_kirim', $suratKeluar->tanggal_kirim) }}">
                                                            @error('tanggal_kirim')
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

                                                <input type="hidden" name="oldFile" value="{{ $suratKeluar->file }}">

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="button" id="update-button" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>

                                                <script>
                                                    document.getElementById("update-button").addEventListener("click", (e) => {
                                                        Swal.fire({
                                                            icon: "question",
                                                            titleText: "Are you sure?",
                                                            text: "This will change the data",
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Save',
                                                            focusCancel: true,
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('update-form').submit()
                                                            }
                                                        })
                                                    });
                                                </script>
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
