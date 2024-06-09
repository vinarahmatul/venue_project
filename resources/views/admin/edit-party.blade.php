@extends('admin.main')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-5 mb-5">
    <h2 class="header">Edit Paket Party</h2>
    <!-- Form Input Data -->
    <form action="/Edit-Paket-Party/{{ $party->id_party }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        
        <!-- Nama Paket dan Gambar -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="title_party">Nama Paket</label>
                    <input type="text" class="form-control" id="title_party" name="title_party" placeholder="Masukkan Nama Paket" value="{{ $party->title_party }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="party_photo">Gambar Paket</label>
                    <input type="file" class="form-control" id="party_photo" name="party_photo">
                    <img src="{{ asset('storage/' . $party->party_photo) }}" alt="Gambar Paket" style="width: 100px; margin-top: 10px;">
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="form-group mt-2">
            <label for="description_party">Deskripsi</label>
            <textarea class="form-control" id="description_party" name="description_party" rows="5" placeholder="Masukkan Deskripsi Paket" required>{{ $party->description_party }}</textarea>
        </div>
        
        <!-- Submit Button -->
        <div class="form-group mt-3 text-right">
            <a href="/Paket-Party" class="btn btn-sm btn-batal">Batal</a>
            <button type="submit" class="btn btn-sm btn-simpan">Simpan</button>
        </div>

    </form>
</div>
@endsection
