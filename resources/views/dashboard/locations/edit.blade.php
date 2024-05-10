@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">Update Location</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-auto px-3 mb-5">
        <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3">
            <div class=" border-2 rounded-lg overflow-hidden ">
                <img src="/storage/{{ $location->image }}" class="card-img-top" alt="...">
            </div>

        </div>
    </section>


    <section class="container mx-auto px-3 mb-7">
        <form action="/dashboard/places/{{ $location->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="nama">Name</label><br>
            <input type="text" name="nama" id="nama" value="{{ $location->nama }}"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="address">Adress</label><br>
            <input type="text" name="address" id="address" value="{{ $location->lokasi }}"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
