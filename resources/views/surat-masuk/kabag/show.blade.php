@extends('layouts.main')

@section('content')
    <div id="main">
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    titleText: "Success!",
                    text: "{{ session('success') }}",
                })
            </script>
        @endif
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

        {{-- page content --}}
        <div class="page-content">
            <a href="{{ url('suratMasukKabag') }}" class="btn btn-primary mb-3">
                <i class="fas fa-chevron-left"></i> {{ __('Kembali') }}
            </a>
            @empty($suratMasuk->DisposisiKedua)
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#disposisiModal">
                    <i class="bi bi-send-fill"></i> {{ __('Disposisi') }}
                </button>
            @endempty

            <div class="modal fade" id="disposisiModal" tabindex="-1" aria-labelledby="disposisiModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="/suratMasukKabag/{{ $suratMasuk->id }}">
                            @csrf
                            @method('put')
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="disposisiModalLabel">Disposisi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <input type="hidden" name="surat_masuk_id" value="{{ $suratMasuk->id }}">

                                <div class="mb-3">
                                    <label for="user_id" class="col-form-label">Ditujukan:</label>
                                    <select class="form-select" id="user_id" name="user_id" required>
                                        <option value="" default selected disabled>--Pilih Staff/Pelaksana--</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}">{{ ucwords($staff->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="catatan" class="col-form-label">Catatan:</label>
                                    <textarea class="form-control" id="catatan" name="catatan"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <section>
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Detail Surat Masuk') }}</h4>
                            </div>
    
                            {{-- card content --}}
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <table class="display table table-borderless table-hover table-striped fs-6">
                                            <tr>
                                                <td style="width: 20%">{{ 'Nomor Surat' }}</td>
                                                <td style="width: 5%">{{ ':' }}</td>
                                                <td>{{ $suratMasuk->nomor_surat }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Tanggal Surat' }}</td>
                                                <td>{{ ':' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($suratMasuk->tanggal_surat)->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Tanggal Diterima' }}</td>
                                                <td>{{ ':' }}</td>
                                                <td>{{ \Carbon\Carbon::parse($suratMasuk->tanggal_diterima)->format('d F Y') }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Perihal' }}</td>
                                                <td>{{ ':' }}</td>
                                                <td>{{ $suratMasuk->perihal }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Asal' }}</td>
                                                <td>{{ ':' }}</td>
                                                <td>{{ $suratMasuk->asal_surat }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Nomor Agenda' }}</td>
                                                <td>{{ ':' }}</td>
                                                <td>{{ $suratMasuk->nomor_agenda }}</td>
                                            </tr>
                                            <tr>
                                                <td>{{ 'Catatan' }}</td>
                                                <td>{{ ':' }}</td>
                                                @if ($suratMasuk->catatan != '')
                                                    <td>{{ $suratMasuk->catatan }}</td>
                                                @else
                                                    <td>{{ '-' }}</td>
                                                @endif
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    @isset($suratMasuk->DisposisiPertama)
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Instruksi Pimpinan') }}</h4>
                                </div>
    
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="display table table-borderless table-hover table-striped fs-6">
                                                <tr>
                                                    <td style="width: 20%">{{ 'Instruksi' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    <td>{{ ucwords($suratMasuk->DisposisiPertama->jenis_disposisi) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ 'Ditujukan' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    <td>{{ ucwords($suratMasuk->DisposisiPertama->Divisi->nama) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ 'Tanggal' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($suratMasuk->DisposisiPertama->created_at)->format('d F Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ 'Catatan' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    @if ($suratMasuk->DisposisiPertama->catatan != '')
                                                        <td>{{ $suratMasuk->DisposisiPertama->catatan }}</td>
                                                    @else
                                                        <td>{{ '-' }}</td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
    
                    @isset($suratMasuk->DisposisiKedua)
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('Instruksi Kepala Bagian') }}</h4>
                                </div>
    
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <table class="display table table-borderless table-hover table-striped fs-6">
                                                <tr>
                                                    <td>{{ 'Ditujukan' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    <td>{{ ucwords($suratMasuk->DisposisiKedua->User->name) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ 'Tanggal' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($suratMasuk->DisposisiKedua->created_at)->format('d F Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ 'Catatan' }}</td>
                                                    <td>{{ ':' }}</td>
                                                    @if ($suratMasuk->DisposisiKedua->catatan != '')
                                                        <td>{{ $suratMasuk->DisposisiKedua->catatan }}</td>
                                                    @else
                                                        <td>{{ '-' }}</td>
                                                    @endif
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
    
    
                </div>
    
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('File Surat') }}</h4>
                            </div>
    
                            <div class="card-content">
                                <div class="card-body">
                                    <iframe title="surat_masuk" src="{{ asset('storage/' . $suratMasuk->file . '#zoom=FitW') }}" height="550" class="embed-responsive embed-responsive-item"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
