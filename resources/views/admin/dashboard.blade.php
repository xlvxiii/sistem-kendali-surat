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
                        <p class="text-subtitle text-muted">{{ __('You are logged in as admin!') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <section class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Dashboard') }}</h4>
                    </div>
                    <div class="card-body">

                        <!-- Card -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Surat Masuk
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold">
                                                {{ $count }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <span class="bi bi-envelope-fill fa-2x text-gray-300"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End of card --}}

                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection
