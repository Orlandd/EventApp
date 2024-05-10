@extends('layout.main')

@section('container')
    <h1 class="text-center text-3xl font-bold my-6">Locations</h1>
    <hr>


    <section class="container mx-auto mt-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach ($locations as $location)
                <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 hover:scale-105 transition-all">
                    <div class=" border-2 rounded-lg overflow-hidden ">
                        <img src="https://source.unsplash.com/1080x500?stage?orientation=landscape" class="card-img-top"
                            alt="...">
                    </div>
                    <div class="text-center">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection
