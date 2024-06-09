@extends('admin.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-5 mb-5">
    <h2 class="header">Edit Paket Wedding</h2>
    <!-- Form Input Data -->
    <form action="/Edit-Paket-Wedding/{{ $wedding->id_wedding }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        <!-- Nama Paket dan Gambar -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="title_wedding">Nama Paket</label>
                    <input type="text" class="form-control" id="title_wedding" name="title_wedding" placeholder="Masukkan Nama Paket" value="{{ $wedding->title_wedding }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="wedding_photo">Gambar Paket</label>
                    <input type="file" class="form-control" id="wedding_photo" name="wedding_photo">
                    <img src="{{ asset('storage/' . $wedding->wedding_photo) }}" alt="Gambar Paket" style="width: 100px; margin-top: 10px;">
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="form-group mt-2">
            <label for="description_wedding">Deskripsi</label>
            <textarea class="form-control" id="description_wedding" name="description_wedding" rows="5" placeholder="Masukkan Deskripsi Paket" required>{{ $wedding->description_wedding }}</textarea>
        </div>
        
        <!-- Submit Button -->
        <div class="form-group mt-3 text-right">
            <a href="/Paket-Wedding" class="btn btn-sm btn-batal">Batal</a>
            <button type="submit" class="btn btn-sm btn-simpan">Simpan</button>
        </div>

    </form>
</div>
@endsection
