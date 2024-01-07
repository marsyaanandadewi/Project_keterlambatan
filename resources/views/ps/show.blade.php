@extends('layouts.templatePs')

@section('content')
<br>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="/lates/rekap" class="btn btn-info me-md-2" style="color: white">Kembali</a>
</div>



<div class="row mt-3">
    @php
    $no = 1;
    @endphp

    @forelse ($late as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-secondary">Keterlambatan {{ $no++ }}</h4>
                    <p class="card-text">Tanggal: {{ \Carbon\Carbon::parse($item->date_time)->format('d F Y H:i:s') }}</p>
                    <p class="card-text text-secondary">Informasi: {{ $item->information }}</p>
                    <center>
                        <img src="{{ asset('uploads/' . $item->bukti) }}" alt="" width="100px"
                            style="aspect-ratio: 100/90; object-fit: contain;">
                    </center>
                </div>
            </div>
        </div>
    @empty
        {{-- <div class="col-md-12">
            <p class="text-center">Tidak ada data keterlambatan.</p>
        </div> --}}
    @endforelse
</div>
@endsection
