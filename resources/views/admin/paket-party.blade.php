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
            <h1 class="header mb-4">Daftar Paket Ulang Tahun</h1>
        </div>
    </div>

    <!-- Button to Add Data -->
    <div class="row mb-3">
        <div class="col text-right">
            <a href="/Tambah-Paket-Party" class="btn btn-tambah">Tambah Data</a>
        </div>
    </div>

    <!-- Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Paket</th>
                    <th>Gambar Paket</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partys as $pr)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $pr->title_party }}</td>
                    <td class="text-center"><img src="{{ asset('storage/' . $pr->party_photo) }}" alt="Gambar Paket" style="width: 100px;"></td>
                    <td class="description" data-full-description="{{ $pr->description_party }}">{{ $pr->description_party }}</td>
                    <td class="table-actions">
                        <a href="/Edit-Paket-Party/{{ $pr->id_party }}" class="btn btn-sm btn-edit">Edit</a>
                        <form action="/Hapus-Paket-Party/{{ $pr->id_party }}" method="POST" style="display:inline;">
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

<!-- Overlay for full description -->
<div id="descriptionOverlay" class="overlay">
    <div class="overlay-content" id="overlayContent"></div>
    <span class="overlay-close" id="overlayClose">&times;</span>
</div>

@endsection
