@extends('main')

@section('content')
<div class="container mt-5">
    <div class="tagline">Venue Wedding</div>
    <div class="card-section">
        @foreach($wedding as $wedd)
            <div class="custom-card mb-3">
                <img src="{{ asset('storage/' . $wedd->wedding_photo) }}" class="custom-card-img" alt="{{ $wedd->title_wedding }}">
                <div class="custom-card-body">
                    <h5 class="custom-card-title">{{ $wedd->title_wedding }}</h5>
                    <p class="custom-card-text">{{ \Illuminate\Support\Str::limit($wedd->description_wedding, 100, $end='...') }}</p>
                    <p class="custom-card-text"><small class="text-muted">Last updated {{ $wedd->updated_at->diffForHumans() }}</small></p>
                    <a href="/Detail-Venue-Pernikahan/{{ $wedd->id_wedding }}" class="custom-card-link">Selengkapnya</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
