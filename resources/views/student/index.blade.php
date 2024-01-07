@extends('layouts.template')

@section('content')
<div class="container mt-4 p-4 bg-white rounded shadow">
    <div class="jumbotron py-3 px-2">
        <h3>Data Siswa</h3>
        <a href="/dashboard" style="color: black;" >Home </a>
        <a>/</a>
        <a href="{{route('student.index')}}" style="color: black;" >Data Siswa </a>
        <hr class="my-1">
    </div>

 <a href="{{ route('student.create') }}" class="btn btn-secondary">Tambah Data</a>
    <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no =1; @endphp
            @foreach($student as $item)
            <tr>
                <td>{{($no++)}}</td>
                <td>{{$item['nis']}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['rombel']['rombel']}}</td>
                <td>{{$item['rayon']['rayon']}}</td>
                <td class="d-flex"> 
                    <a href="{{route('student.edit', $item['id']) }}" class="btn btn-info ml-5" style="color: white">Edit</a>
                    {{-- <form action="{{route('student.delete',$item['id']) }}" method="POST"> --}}
                    @csrf
                    @method('DELETE')
          
                   <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                </td>
               
            </tr>
            @endforeach
          
        </tbody>
    </table>
    </div>
    @endsection
    
