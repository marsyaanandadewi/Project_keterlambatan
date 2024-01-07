@extends('layouts.templatePs')

@section('content')
    @if (Session::get('sukses'))
        <div class="alert alert-success">{{ Session::get('sukses') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 style="font-family: Arial, Helvetica, sans-serif">Data Keterlambatan</h3>
    </div>
    <div class=" justify-content-end">
        <div class="container" style="max-width: 80%; margin: 0 50px 0 0">
            <a href="{{ route('late.create')}}" class="btn btn-dark mb-3">Tambah Data</a>
            <a href="{{ route('late.excel') }}" class="btn btn-secondary mb-3">Export Data Keterlambatan</a>
    
        </div>
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('late.index') }}">Keseluruhan Data</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('late.rekap') }}">Rekapitulasi Data</a>
        </li>
    </ul>

    {{-- <form class="mt-3" action="{{ route('late.index') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="late" value="{{ request('student_id') }}" placeholder="Search Data Keterlambatan">
            <div class="input-group-append">
                <button class="btn btn-info" style="color: white" type="submit">Search</button>
            </div>
        </div>
    </form> --}}
    
    <!-- Form Pencarian -->
<form class="mt-3" action="{{ route('late.index') }}" method="GET">
    <div class="input-group">
        <input type="text" class="form-control" name="late" value="{{ request('late') }}" placeholder="Search Data Keterlambatan">
        <div class="input-group-append">
            <button class="btn btn-info" type="submit" style="color: white">Search</button>
        </div>
    </div>
</form>

    <!-- Tabel Data -->
<table class="table table-bordered table-striped mt-3">
    <thead>
        <tr style="text-align: center">
            <th>No</th>
            <th>Nis</th>
            <th>Nama</th>
            <th>Jumlah Keterlambatan</th>
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($late as $item)
            <tr style="text-align: center">
                <td>{{ $no++ }}</td>
                <td>{{ $item['student']['nis'] }}</td>
                <td>{{ $item['student']['name'] }}</td>
                <td>{{ $item->total_late }}</td>
                <td><a href="{{ route('late.show', $item["student"]["id"]) }}" class="btn btn-info me-2" style="color: white">Lihat</a></td>
                <td><a href="{{ route('late.pdf', $item['student']->id)}}" class="btn btn-info ms-5" style="color: white">Cetak Surat</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

    {{-- <table class="table table-bordered table-striped mt-3">
        <thead>
            <tr style="text-align: center">
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>informasi</th>
            
            </tr>
        </thead>
        <tbody>
            @php
            $no =1;
            @endphp
            @if ($late->count() > 0)

            @foreach ($late as $item)
            <tr style="text-align: center">
                <td>{{ $no++ }}</td>
                <td>{{ $item->student->name }}</td>
                <td>{{ $item->date_time }}</td>
                <td>{{ $item->information }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('late.edit', ['id' => $item->id]) }}" class="btn btn-info me-2" style="color: white">Edit</a>
                    <form method="POST" action="{{ route('late.delete', ['id' => $item->id]) }}">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button> 
                    </form>
                </td>
            </tr>
        @endforeach
        
    
            @else
                {{-- <tr>
                    <td colspan="8" class="text-center">No data available</td>
                </tr> --}}
            {{-- @endif
        </tbody>
    </table>  --}}
@endsection
