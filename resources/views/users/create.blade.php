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
            <a href="{{ url()->previous() }}" class="btn btn-primary mb-3">
                <i class="fas fa-chevron-left"></i> Kembali
            </a>
            <section class="row">
                <div class="card col-6">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Tambah User') }}</h4>
                    </div>

                    {{-- form layout --}}
                    <div class="card-content">
                        <div class="card-body">
                            <form action="/users" method="post" class="form form-vertical">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="Name">Nama</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Nama" autofocus>
                                                    @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <label for="role" class="form-label">Role</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="role">
                                                <span class="">
                                                    <i class="bi bi-person-badge-fill"></i>
                                                </span>
                                            </label>
                                            <select class="form-select" id="role" name="role">
                                                @foreach ($roles as $role)
                                                    @if (old('role') == $role->name)
                                                        <option value="{{ $role->name }}" selected>{{ ucwords($role->name) }}</option>
                                                    @else
                                                        <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('role')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="email">Email</label>
                                                <div class="position-relative">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Email address">
                                                    @error('email')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password">Password</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                                    @error('password')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
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
                    {{-- end of form layout --}}

                </div>
            </section>
        </div>
        {{-- end of page content --}}

    </div>
@endsection
