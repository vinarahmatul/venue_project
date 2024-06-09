@extends('admin.main')

@section('content')

<div class="container mt-5 mb-5">
    <h2 class="header">Tambah Banner</h2>
    <!-- Form Input Data -->
    <form action="/Tambah-Banner" method="POST" enctype="multipart/form-data">
        @csrf
        
        <!-- Nama Banner dan Gambar -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="banner_name">Nama Banner</label>
                    <input type="text" class="form-control" id="banner_name" name="banner_name" placeholder="Masukkan Nama Banner" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="banner_photo">Gambar Banner</label>
                    <input type="file" class="form-control" id="banner_photo" name="banner_photo" required>
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
