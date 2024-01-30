@extends('layout.main')

@section('container')
    <h1 class="text-center">Locations</h1>
    <hr>
    <div class="container" style="height: 60vh">
        <div class="row row-cols-1 row-cols-md-2 row-cols-sm-1 g-4">
            @foreach ($locations as $location)
                <div class="col">
                    <div class="card h-100">
                        <img src="https://source.unsplash.com/1080x500?stage?orientation=landscape" class="card-img-top"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                                additional
                                content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
