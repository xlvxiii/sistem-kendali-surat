@extends('layouts.main')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ __('Dashboard') }}</h3>
                        <p class="text-subtitle text-muted">{{ __('Anda login sebagai pengelola!') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container-fluid">
                <section class="row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <!-- Card -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="d-inline-flex mb-2">
                                                <div class="badge p-3 rounded-4" style="background-color: #9694ff;">
                                                    <i class="bi bi-envelope-arrow-down-fill fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Jumlah Surat Masuk
                                            </h6>
                                            <h5 class="font-extrabold mb-0">
                                                {{ $sumSuratMasuk }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of card -->

                        <!-- Card -->
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="d-inline-flex mb-2">
                                                <div class="badge p-3 rounded-4" style="background-color: #9694ff;">
                                                    <i class="bi bi-envelope-arrow-up-fill fa-2x"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Jumlah Surat Keluar
                                            </h6>
                                            <h5 class="font-extrabold mb-0">
                                                {{ $sumSuratKeluar }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of card -->
                    </div>
                </section>
            </div>
        </div>

    </div>
@endsection
