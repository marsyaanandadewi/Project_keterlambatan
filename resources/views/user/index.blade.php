@extends('layouts.template')

@section('content')
@if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if (Session::get('deleted'))
    <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
@endif

<div class="container mt-4 p-4 bg-white rounded shadow">
    <div class="jumbotron py-3 px-2">
        <h4>Data User</h4>
        <a href="/dashboard" style="color: black;">Home </a>
        <a >/</a>
        <a href="{{ route('user.index') }}" style="color: black;">Data User </a>
        <hr class="my-1">
    </div>

    <a href="{{ route('user.create') }}" class="btn btn-secondary">Tambah Data</a>

    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($user as $item)
                <tr>
                    <td>{{ ($user->currentPage() - 1) * $user->perPage() + $loop->index + 1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td>{{ $item['role'] }}</td>
                    <td class="d-flex">
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-info ml-5">Edit </a>
                        <form action="{{ route('user.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($user->count())
            {{ $user->links() }}
        @endif
    </div>
</div>
@endsection
