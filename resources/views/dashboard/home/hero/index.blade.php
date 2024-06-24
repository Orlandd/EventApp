@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-3">
        <h1>Home</h1>
    </div>

    <section class="container mx-auto px-3 gap-3">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            @foreach ($images as $image)
                <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 my-4">
                    <div class=" border-2 rounded-lg overflow-hidden ">
                        <img src="/storage/home/{{ $image->image }}" class="card-img-top" alt="...">
                    </div>
                    <div class="text-center mt-3">
                        <a href="/dashboard/homes/{{ $image->id }}/edit" class="px-6 py-2 rounded-xl bg-sky-400">Edit</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
