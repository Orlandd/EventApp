@extends('layout.main')

@section('container')
    <h1 class="text-center text-3xl font-bold my-6">Locations</h1>
    <hr>


    <section class="container mx-auto mt-6">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach ($locations as $location)
                <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 hover:scale-105 transition-all">
                    <div class=" border-2 rounded-lg overflow-hidden ">
                        <img src="/storage/{{ $location->image }}" class="card-img-top" alt="...">
                    </div>
                    <div class="text-center">
                        <h5 class="card-title">{{ $location->nama }}</h5>
                        <p class="card-text">{{ $location->lokasi }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
@endsection
