@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container ">
        <h3 class="text-3xl font-bold m-6">Detail</h3>
    </section>


    <section class="container mx-auto px-3 mb-5">
        <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3">
            <div class=" border-2 rounded-lg overflow-hidden ">
                <img src="/storage/places/{{ $location->image }}" class="card-img-top" alt="...">
            </div>
            <div class="text-center">
                <h1 class="text-2xl">{{ $location->nama }}</h1>
                <h3 class="text-lg">{{ $location->lokasi }}</h3>
            </div>

        </div>
    </section>
@endsection
