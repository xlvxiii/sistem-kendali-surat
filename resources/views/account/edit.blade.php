@extends('layouts.main')

@section('content')
    <div id="main">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>{{ __($title) }}</h3>
                        <p class="text-subtitle text-muted">{{ __('Anda login sebagai ' . Auth::user()->getRoleNames()[0] . '!') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- page content --}}
        <div class="page-content">
            @if (session()->has('success'))
                <script>
                    Swal.fire({
                        icon: "success",
                        titleText: "Success!",
                        text: "{{ session('success') }}",
                    })
                </script>
            @endif
            <section>
                <div class="row match-height">
                    <div class="col-md-6 col-12">
                        {{-- edit user form --}}
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Edit User') }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/account/{{ $user->id }}" method="post" id="update-form" class="form form-vertical">
                                        @method('put')
                                        @csrf

                                        <input type="hidden" name="formName" value="update-form">
                                        <div class="form-body">
                                            <div class="row">
                                                {{-- input nama --}}
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="Name">Nama</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Nama" autofocus>
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

                                                {{-- input role --}}
                                                <label for="role" class="form-label">Role</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="role">
                                                        <span class="">
                                                            <i class="bi bi-person-badge-fill"></i>
                                                        </span>
                                                    </label>
                                                    <input type="text" class="form-control" name="role" id="role" value="{{ ucwords(Auth::user()->roles[0]->name) }}" disabled>
                                                </div>

                                                {{-- input divisi --}}
                                                <label for="divisi" class="form-label">Divisi</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="role">
                                                        <span class="">
                                                            <i class="bi bi-person-badge-fill"></i>
                                                        </span>
                                                    </label>
                                                    @unlessrole('pimpinan')
                                                        <input type="text" class="form-control" name="divisi" id="divisi" value="{{ $user->Divisi->nama }}" disabled>
                                                    @else
                                                        <input type="text" class="form-control" name="divisi" id="divisi" value="-" disabled>
                                                    @endunlessrole
                                                </div>

                                                {{-- input email --}}
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="email">Email</label>
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email address">
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

                                            </div>
                                        </div>

                                        <button id="update-button" type="button" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- end of edit user form --}}
                    </div>

                    {{-- change password form --}}
                    <div class="col-md-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ __('Change Password') }}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="/account/{{ $user->id }}" method="post" id="change-password-form" class="form form-vertical">
                                        @method('put')
                                        @csrf

                                        <input type="hidden" name="formName" value="change-password-form">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password">Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" onkeyup="toggle_password_confirmation()">
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

                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation"
                                                                placeholder="Confirm Password" disabled>
                                                            @error('password_confirmation')
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

                                            </div>
                                        </div>

                                        <button id="change-password-button" type="button" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end of change password form --}}

                </div>

            </section>
        </div>
    </div>

    <script>
        function toggle_password_confirmation() {
            if (document.getElementById("password").value === "") {
                document.getElementById('password_confirmation').disabled = true;
            } else {
                document.getElementById('password_confirmation').disabled = false;
            }
        }

        document.getElementById("update-button").addEventListener("click", (e) => {
            Swal.fire({
                icon: "question",
                titleText: "Are you sure?",
                text: "This will change this account data",
                showCancelButton: true,
                confirmButtonText: 'Save',
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-form').submit()
                }
            })
        });

        document.getElementById("change-password-button").addEventListener("click", (e) => {
            Swal.fire({
                icon: "question",
                titleText: "Are you sure?",
                text: "This will change this account password",
                showCancelButton: true,
                confirmButtonText: 'Save',
                focusCancel: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('change-password-form').submit()
                }
            })
        });
    </script>
@endsection
