@extends('layouts.main')

@section('content')
    <div id="main">
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

        {{-- page content --}}
        <div class="page-content">
            <a href="{{ url('suratMasukPengelola') }}" class="btn btn-primary mb-3">
                <i class="fas fa-chevron-left"></i> {{ __('Kembali') }}
            </a>
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
