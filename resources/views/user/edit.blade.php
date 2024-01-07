@extends('layouts.template')

@section('content')

<div class="card-body p-5">
  <div class="justify-content-start jumbotron py-3" style="line-height: 5px; padding-bottom:30px;">
      <h4>Edit Data User</h4>
      <a href="/dashboard" style="color: black;" >Home </a>
      <a href="{{route('user.index')}}" style="color: black;" >Data User </a> 
      <a href="{{route('user.create')}}" style="color: black;" >Edit Data User </a> 
    </div>
    <div class="mt-3">
<form action="{{ route('user.update',$user['id']) }}"class="mt-3 p-5" method="POST">
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>       
    @endif

 @if (Session::get('success'))
 <div class="alert alert-success">{{Session::get('success')}}</div>
     
 @endif
 @csrf
    @method('PATCH')

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label @error('name') is-invalid @enderror">Nama:</label>
        <div class="col-sm-10">
          <input type="text"  class="form-control" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <div class="text-danger">{{$message}}</div>
              
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label ">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" >
          @error('email')
          <div class="text-danger">{{$message}}</div>
          @enderror
        </div>
      </div>
      <div class="mb-3 row">
        <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna</label>
        <div class="col-sm-10">
           
            <select name="role" id="role" class="form-control">
                <option selected hidden disabled>Pilih</option>
                <option value="admin" {{ old('role') =='admin' ? 'selected' : ''}}>Admin</option>
                <option value="ps" {{ old('role') =='ps' ? 'selected' : ''}}>Pembimbing Rayon</option>
            </select>
            @error('role')
            <div class="text-danger">{{$message}}</div>
                
            @enderror
        </div>
      </div>
      <div class="mb-3 row">
    <button type="submit" class="btn btn-info" style="color: white">Simpan Perubahan </button>
</form>
@endsection