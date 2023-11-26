@extends('layouts.main')

@section('content')
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        {{-- page heading --}}
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
        {{-- end of page heading --}}

        {{-- page content --}}
        <div class="page-content">
            <section class="row">
                @if (session()->has('success'))
                    {{-- <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div> --}}
                    <script>
                        Swal.fire({
                            icon: "success",
                            titleText: "Success!",
                            text: "{{ session('success') }}",
                        })
                    </script>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Data User') }}</h4>
                    </div>
                    <div class="card-body">
                        <a href="/users/create">
                            <button class="btn btn-sm btn-success mb-2"><i class="bi bi-file-earmark-plus-fill"></i>Tambah User</button>
                        </a>
                        <table id="userTable" class="display table table-borderless table-hover table-responsive table-striped">
                            <caption>Data User</caption>
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Divisi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucwords($user->name) }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucwords($user->roles->pluck('name')->implode(',')) }}</td>
                                        <td>
                                            @if ($user->divisi_id != null)
                                                {{ ucwords($user->Divisi->nama) }}
                                            @else
                                                {{ '-' }}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning text-white mx-1" title="Edit">
                                                <span class="bi bi-pencil-fill"></span>
                                            </a>
                                            <form action="/users/{{ $user->id }}" method="post" class="d-inline" id="{{ 'delete-form' . $loop->iteration }}">
                                                @method('delete')
                                                @csrf
                                                <button type="button" class="btn btn-sm btn-danger" title="Delete" id="{{ 'delete-button' . $loop->iteration }}" title="Delete">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </button>
                                                <script>
                                                    document.getElementById("{{ 'delete-button' . $loop->iteration }}").addEventListener("click", (e) => {
                                                        Swal.fire({
                                                            icon: "question",
                                                            titleText: "Are you sure?",
                                                            text: "This will delete this user permanently. You cannot undo this action.",
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Delete',
                                                            focusCancel: true,
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById("{{ 'delete-form' . $loop->iteration }}").submit()
                                                            }
                                                        })
                                                    });
                                                </script>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        {{-- end of page content --}}
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endsection
