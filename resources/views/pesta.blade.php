@extends('main')

@section('content')
<div class="container mt-5">
    <div class="tagline">Venue Birthday Party</div>
    <div class="card-section">
        @foreach($party as $pr)
        <div class="custom-card mb-3">
            <img src="{{ asset('storage/' . $pr->party_photo) }}" class="custom-card-img" alt="{{ $pr->title_party }}">
            <div class="custom-card-body">
                <h5 class="custom-card-title">{{ $pr->title_party }}</h5>
                <p class="custom-card-text">{{ \Illuminate\Support\Str::limit($pr->description_party, 100, $end='...') }}</p>
                <p class="custom-card-text"><small class="text-muted">Last updated {{ $pr->updated_at->diffForHumans() }}</small></p>
                <a href="/Detail-Venue-Pesta/{{ $pr->id_party }}" class="custom-card-link">Selengkapnya</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
