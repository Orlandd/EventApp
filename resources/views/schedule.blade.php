@extends('layout.main')

@section('container')
    {{-- Place  --}}
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-1 g-4 mb-5">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://source.unsplash.com/1080x500?stage?orientation=landscape"
                        class="rounded-4 d-block w-100 h-95" alt="..." style="filter: brightness(50%);">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="/schedule/place/{{ $locations[0]->id }}"
                                class="text-decoration-none text-white">{{ $locations[0]->nama }}</a></h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://source.unsplash.com/1080x500?concert-stage?orientation=landscape"
                        class="rounded-4 d-block w-100 h-95" alt="..." style="filter: brightness(50%);">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><a href="/schedule/place/{{ $locations[1]->id }}"
                                class="text-decoration-none text-white">{{ $locations[1]->nama }}</a></h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <h3>Current Event</h3>

    {{-- Schedule --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        @foreach ($times as $time)
            <div class="col">
                <div class="card border border-0 shadow" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $time->events->nama }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $time->tanggal }} |
                            {{ $time->waktu }} </h6>
                        <p class="card-text">{{ $time->places->nama }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
