@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{ __('Data User') }}</div>

                    <div class="card-body">
                        <a href="/users/create">
                            <button class="btn btn-sm btn-success mb-2"><i class="bi bi-file-earmark-plus-fill"></i>Tambah User</button>
                        </a>
                        <table id="userTable" class="display table table-borderless table-hover table-striped table-sm">
                            <caption>Data User</caption>
                            <thead class="">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
                                            <button class="btn btn-sm btn-success"><span class="bi bi-eye-fill"></span></button>
                                            <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-warning" title="Edit">
                                                <span class="bi bi-pencil-fill"></span>
                                            </a>
                                            <form action="/users/{{ $user->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Anda yakin ingin menghapus data?')">
                                                    <span class="bi bi-x-circle-fill"></span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>
@endsection
