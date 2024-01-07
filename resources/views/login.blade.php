@extends('layouts.template')

@section('content')
<div class="card p-4 mt-5">
    <h2 class="text-center mb-4">Login</h2>
    <form action="{{ route('login.auth') }}" method="POST">
        @csrf
        @if (Session::get('failed'))
        <div class="alert alert-danger" role="alert">{{ Session::get('failed') }}</div>
        @endif
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
            @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-info btn-">Login</button>
        </div>
    </form>
</div>
@endsection
