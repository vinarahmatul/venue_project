@extends('main')

@section('content')
<div class="container mt-5">
    <!-- Gambar Utama -->
    <div class="main-image-section position-relative">
        <button onclick="window.history.back()" class="btn btn-primary back-button">Kembali</button>
        <img src="{{ asset('storage/' . $wedding->wedding_photo) }}" class="img-fluid mb-3 w-100" alt="{{ $wedding->title_wedding }}">
    </div>
    
    <!-- Deskripsi -->
    <div class="description-section mt-3">
        <h1>{{ $wedding->title_wedding }}</h1>
        <p>{{ $wedding->description_wedding }}</p>
    </div>
</div>
@endsection
