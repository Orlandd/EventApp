@extends('dashboard.layouts.main')

@section('container')
    {{-- Place  --}}

    <section class="container px-3 mb-6">
        <h3 class="text-3xl font-bold ">New Location</h3>
    </section>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif


    <section class="container mx-auto px-3">
        <form action="/dashboard/places/" method="post" enctype="multipart/form-data">
            @csrf
            <label for="nama">Name</label><br>
            <input type="text" name="nama" id="nama"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="address">Adress</label><br>
            <input type="text" name="address" id="address"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>

            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

        </form>
    </section>
@endsection
