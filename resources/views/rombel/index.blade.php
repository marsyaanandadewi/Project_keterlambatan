@extends('layouts.template')

@section('content')
@if (Session::get('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
@endif

@if (Session::get('deleted'))
    <div class="alert alert-warning">{{Session::get('deleted')}}</div>
@endif

<div class="container mt-4 p-4 bg-white rounded shadow">
    <div class="jumbotron py-3 px-2">
        <h3>Data Rombel</h3>
        <a href="/dashboard" style="color: black;" >Home </a>
        <a >/</a>
        <a href="{{route('rombel.index')}}" style="color: black;">Data Rombel </a>
        <hr class="my-1 mt-3">
    </div>

    <a href="{{ route('rombel.create') }}" class="btn btn-secondary">Tambah Data</a>
    <table class="table table-bordered mt-5" >
        <thead>
            <tr>
                <th>No</th>
                <th>Rombel</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($rombel as $item)
            <tr>
                <td>{{($no++)}}</td>
                <td>{{$item['rombel']}}</td>
                <td class="d-flex"> 
                    <a href="{{route('rombel.edit', $item['id']) }}" class="btn btn-info ml-5" style="color: white">Edit</a>
                    <form action="{{route('rombel.delete', $item['id']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="margin-left: 10px">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
