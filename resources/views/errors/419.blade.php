@extends('errors.main')

@section('content')
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="{{ asset('asset/error.svg') }}" alt="Not Found" />
                    <h1 class="error-title">SESSION EXPIRED</h1>
                    <p class="fs-5 text-gray-600">
                        Sorry, your session has expired. Please try loggin in again.
                    </p>
                    <a href="/login" class="btn btn-lg btn-outline-primary mt-3">Log in</a>
                </div>
            </div>
        </div>
    </div>
@endsection
