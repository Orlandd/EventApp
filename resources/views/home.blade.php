@extends('layout.main')

@section('container')
    <div class="row">
        <div class="col d-flex align-items-center">
            <div class="hero-word">
                <h4>Welcome to, Event ID</h4>
                <h1>Your Gateway to Unforgettable Concert Experiences! </h1>
                <p>Elevate your concert experience! Exclusive access, seamless booking, top-notch security. Stay updated and
                    make it an Event. Secure your tickets now!</p>
            </div>
        </div>
        <div class="col">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner rounded-4 shadow-lg">
                    <div class="carousel-item active">
                        <img src="https://source.unsplash.com/720x1080?stage?orientation=potrait"
                            class="rounded-4 d-block w-100 h-95" alt="..." style="filter: brightness(50%);">

                    </div>
                    <div class="carousel-item">
                        <img src="https://source.unsplash.com/720x1080?concert-stage?orientation=potrait"
                            class="rounded-4 d-block w-100 h-95" alt="..." style="filter: brightness(50%);">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <hr>
    <div class="row">
        <h2 class="text-center">Locations</h2>
        <br>
        <div class="row row-cols-1 row-cols-md-4 g-4 row-cols-sm-2">
            <div class="col">
                <div class="card h-100 border border-0 shadow">
                    <img src="https://source.unsplash.com/1080x720?bulding-concert?orientation=landscape"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Location 1</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border border-0 shadow">
                    <img src="https://source.unsplash.com/1080x720?concert-hall?orientation=landscape" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Location 2</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border border-0 shadow">
                    <img src="https://source.unsplash.com/1080x720?auditorium?orientation=landscape" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Location 3</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100 border border-0 shadow">
                    <img src="https://source.unsplash.com/1080x720?stage?orientation=landscape" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Location 4</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a href="/" class="btn btn-dark text-decoration-none text-center">View More...</a>
        </div>
    </div>
    <br>
    <hr>
    <h2 class="text-center">Schedules</h2>
    <br>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5 d-flex justify-content-center ">
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
    <div class="d-flex justify-content-center mt-5">
        <a href="/" class="btn btn-dark text-decoration-none text-center">View More...</a>
    </div>
    <br><br>
@endsection
