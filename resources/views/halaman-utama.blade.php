@extends('main')

@section('content')
<div class="content-section">
    <div id="jumbotronCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            @foreach($banners as $banner)
                <div class="carousel-item @if($loop->first) active @endif">
                    <img class="d-block w-100 jumbotron-img" src="{{ asset('storage/' . $banner->banner_photo) }}" alt="{{ $banner->banner_name }}">
                </div>
            @endforeach
        </div>
    </div>
</div>


<div class="card-section">
    <div class="tagline">Venue Wedding</div>
        @foreach($weddings as $wed)
            <div class="custom-card mb-3">
                <img src="{{ asset('storage/' . $wed->wedding_photo) }}" class="custom-card-img" alt="{{ $wed->title_wedding }}">
                <div class="custom-card-body">
                    <h5 class="custom-card-title">{{ $wed->title_wedding }}</h5>
                    <p class="custom-card-text">{{ \Illuminate\Support\Str::limit($wed->description_wedding, 100, $end='...') }}</p>
                    <p class="custom-card-text"><small class="text-muted">Last updated {{ $wed->updated_at->diffForHumans() }}</small></p>
                    <a href="/Detail-Venue-Pernikahan/{{ $wed->id_wedding }}" class="custom-card-link">Selengkapnya</a>
                </div>
            </div>
        @endforeach
</div>

<div class="card-section">
    <div class="tagline">Venue Birthday Party</div>
        @foreach($partys as $birthday)
            <div class="custom-card mb-3">
                <img src="{{ asset('storage/' . $birthday->party_photo) }}" class="custom-card-img" alt="{{ $birthday->title_party }}">
                <div class="custom-card-body">
                    <h5 class="custom-card-title">{{ $birthday->title_party }}</h5>
                    <p class="custom-card-text">{{ \Illuminate\Support\Str::limit($birthday->description_party, 100, $end='...') }}</p>
                    <p class="custom-card-text"><small class="text-muted">Last updated {{ $birthday->updated_at->diffForHumans() }}</small></p>
                    <a href="/Detail-Venue-Pesta/{{ $birthday->id_party }}" class="custom-card-link">Selengkapnya</a>
                </div>
            </div>
        @endforeach
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var carousel = $('#carouselExampleControls');
        var interval;
        
        carousel.on('mouseenter', function() {
        interval = setInterval(function() {
            carousel.carousel('next');
        }, 2000); // Mengatur interval perpindahan slide setiap 2 detik
        });

        carousel.on('mouseleave', function() {
        clearInterval(interval);
        });
    });
</script>
@endsection