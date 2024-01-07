@extends('layouts.template')

@section('content')
<div class="jumbotron py-5 px-3">
        @if (Session::get('failed'))
            <div class="alert alert-danger">{{Session::get('failed')}}</div>
        @endif
        <H4>Dashboard</H4> 
        <a href="" style="color: white;" class="btn btn-info ml-5">Home </a>
        <hr class="my-4">

        <div class="row">
            <!-- Rombel Card -->
            <div class="col-md-4 mb-4">
              <div class="card border shadow h-100 py-2 " style="box-shadow: rgba(241, 6, 6, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(231, 11, 11, 0.09) 0px -3px 5px;">
                <div class="card-body">
                  <h5 class="card-title">Rombel</h5>
                  <p class="card-text"style="font-size: 18px;">{{ App\Models\Rombel::where('id', '!=', '')->count() }}</p>
                  <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
                  </svg></a>
                </div>
              </div>
            </div>
          
            <!-- Peserta Didik Card -->
            <div class="col-md-4 mb-4">
              <div class="card border shadow h-100 py-2">
                <div class="card-body">
                  <h5 class="card-title">Peserta Didik</h5>
                  <p class="card-text"style="font-size: 18px;">{{ App\Models\Student::where('id', '!=', '')->count() }}</p>
                  <a> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                    <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                  </svg></a>
                </div>
              </div>
            </div>
          
            <!-- Rayon Card -->
            <div class="col-md-4 mb-4">
              <div class="card border shadow h-100 py-2">
                <div class="card-body">
                  <h5 class="card-title">Rayon</h5>
                  <p class="card-text"style="font-size: 18px;">{{ App\Models\Rayon::where('id', '!=', '')->count() }}</p>
                  <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-houses-fill" viewBox="0 0 16 16">
                    <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.5 2.5 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354z"/>
                    <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708z"/>
                  </svg></a>
                </div>
              </div>
            </div>
          
            <!-- Administrator Card -->
            <div class="col-md-6 mb-4">
              <div class="card border shadow h-100 py-2">
                <div class="card-body">
                  <h5 class="card-title">Administrator</h5>
                  <p class="card-text"style="font-size: 18px;">{{ App\models\User::where('role', 'admin')->count() }}</p>
                  <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                  </svg></a>
                </div>
              </div>
            </div>
          
            <!-- Pembimbing Siswa Card -->
            <div class="col-md-6 mb-4">
              <div class="card border shadow h-100 py-2">
                <div class="card-body">
                  <h5 class="text-prima">Pembimbing Siswa</h5>
                  <p class="card-text" style="font-size: 18px;">{{ App\models\User::where('role', 'ps')->count() }}</p>
                  <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                  </svg> </a>
                </div>
              </div>
            </div>
          </div>
    </div>
    
@endsection
