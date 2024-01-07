@extends('layouts.templatePs')

@section('content')
    @if (Session::get('sukses'))
        <div class="alert alert-success">{{ Session::get('sukses') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{ Session::get('deleted') }}</div>
    @endif
    
    <h3>Data Keterlambatan</h3>
        <div class="justify-content-start jumbotron py-1 mb-3" style="line-height: 5px; padding-bottom:30px;">
            <a href="/dashboard" style="color: black;">Home </a>
            <a >/</a>
            <a href="{{route('late.index')}}" style="color: black;">Data Keterlambatan/</a>
        </div>

        <a href="{{ route('late.create')}}" class="btn btn-dark mb-3" style="color: white">Tambah Data</a>
        <a href="{{ route('late.excel') }}" class="btn btn-secondary mb-3" style="color: white">Export Data Keterlambatan</a>

    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{route('late.index')}}">Keseluruhan Data</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('late.rekap')}}">Rekapitulasi Data</a>
        </li>
      </ul>


    <form class="mt-3" action="{{ route('late.index') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="late" value="{{ request('student_id') }}" placeholder="Search Data Keterlambatan">
            <div class="input-group-append">
                <button class="btn btn-info" type="submit" style="color: white">Search</button>
            </div>
        </div>
    </form>

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
            @php $no =1; @endphp
                @foreach ($rekap as $item)
                    <tr style="text-align: center">
                        <td>{{ ($no++)}}</td>
                        <td>{{ $item['student']['nis'] }}</td>
                        <td>{{ $item['student']['name'] }}</td>
                        <td>{{ $item->total_late }}</td>
                        <td><a href="{{ route('late.show', $item["student"]["id"]) }}" class="btn btn-info me-2" style="color: white">Lihat</a></td>
                        <td><a href="{{ route('late.pdf', $item['student']->id)}}" class="btn btn-info ms-5" style="color: white">Cetak Surat</a></td>
                       
                    </tr>
                @endforeach
        </tbody>
    </table>
@endsection