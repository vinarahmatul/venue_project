@extends('main')

@section('content')
<div class="container mt-5">
    <!-- Gambar Utama -->
    <div class="main-image-section position-relative">
        <button onclick="window.history.back()" class="btn btn-primary back-button">Kembali</button>
        <img src="{{ asset('storage/' . $party->party_photo) }}" class="img-fluid mb-3 w-100" alt="{{ $party->title_party }}">
    </div>
    
    <!-- Deskripsi -->
    <div class="description-section mt-3">
        <h1>{{ $party->title_party }}</h1>
        <p>{{ $party->description_party }}</p>
    </div>
</div>
@endsection

