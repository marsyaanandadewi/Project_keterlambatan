@extends('layouts.template')

@section('content')
    <form action="{{ route('late.update', $late->id) }}" method="POST" class="card mt-3 p-5" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <h3 class="mb-4">Edit Data Keterlambatan</h3>

        <div class="mb-3 row">
            <label for="student_id" class="col-sm-2 col-form-label @error('student_id') is-invalid @enderror">Siswa :</label>
            <div class="col-sm-10">
                <select name="student_id" id="student_id" class="form-control">
                    <option selected hidden disabled>Pilih</option>
                    @foreach ($student as $students)
                        <option value="{{ $students->id }}">{{ $students->name }}</option>
                    @endforeach
                </select>
                
                @error('student_id')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal :</label>
            <div class="col-sm-10">
                <input type="datetime-local" class="form-control" id="tanggal" name="date_time" value="{{ $late->date_time }}">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="information" class="col-sm-2 col-form-label">Keterangan Keterlambatan :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="information" name="information" value="{{ $late->information }}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="bukti" class="col-sm-2 col-form-label">Pilih file:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="bukti" name="bukti">
            </div>
        </div>

        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-info">Simpan</button>
        </div>
    </form>
@endsection
