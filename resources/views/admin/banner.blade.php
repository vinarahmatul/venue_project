@extends('admin.main')

@section('content')

@if(session('success'))
    <div class="alert-container" id="alertContainer">
        <div class="alert alert-success" id="alertBox">
            {{ session('success') }}
        </div>
    </div>
@endif

<div class="container mt-5">
    <!-- Header -->
    <div class="row">
        <div class="col">
            <h1 class="header mb-4">Daftar Banner (Jumbotron)</h1>
        </div>
    </div>

    <!-- Button to Add Data -->
    <div class="row mb-3">
        <div class="col text-right">
            <a href="/Tambah-Banner" class="btn btn-tambah">Tambah Data</a>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Banner</th>
                    <th>Gambar Banner</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($banners as $br)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $br->banner_name }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $br->banner_photo) }}" alt="Gambar Banner" class="banner-img" data-banner-name="{{ $br->banner_name }}" style="width: 100px;">
                    </td>
                    <td class="table-actions">
                        <a href="/Edit-Banner/{{ $br->id_banner }}" class="btn btn-sm btn-edit">Edit</a>
                        <form action="/Hapus-Banner/{{ $br->id_banner }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="overlay-banner"></div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var overlaybanner = document.querySelector('.overlay-banner');

    // Event listener untuk menampilkan overlay ketika gambar diklik
    document.querySelectorAll('.banner-img').forEach(function(element) {
        element.addEventListener('click', function() {
            var bannerName = this.getAttribute('data-banner-name');
            var bannerPhoto = this.getAttribute('src');

            var overlayContentBanner = `
                <div class="overlay-content-banner">
                    <h2>${bannerName}</h2>
                    <img src="${bannerPhoto}" alt="Gambar Banner">
                </div>
            `;

            overlaybanner.innerHTML = overlayContentBanner;
            overlaybanner.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        });
    });

    // Event listener untuk menyembunyikan overlay ketika di klik di luar konten overlay
    overlaybanner.addEventListener('click', function(event) {
        if (event.target === overlaybanner) {
            overlaybanner.style.display = 'none';
        }
    });
});
</script>
