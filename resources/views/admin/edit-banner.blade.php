@extends('admin.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-5 mb-5">
    <h2 class="header">Edit Banner</h2>
    <!-- Form Input Data -->
    <form action="/Edit-Banner/{{ $banner->id_banner }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        <!-- Nama Paket dan Gambar -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="banner_name">Nama Banner</label>
                    <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Masukkan Nama Banner" value="{{ $banner->banner_name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="banner_photo">Gambar Banner</label>
                    <input type="file" class="form-control" id="banner_photo" name="banner_photo">
                    <img src="{{ asset('storage/' . $banner->banner_photo) }}" alt="Gambar Banner" style="width: 100px; margin-top: 10px;">
                </div>
            </div>
        </div>
        
        <!-- Submit Button -->
        <div class="form-group mt-3 text-right">
            <a href="/Banner" class="btn btn-sm btn-batal">Batal</a>
            <button type="submit" class="btn btn-sm btn-simpan">Simpan</button>
        </div>

    </form>
</div>
@endsection
