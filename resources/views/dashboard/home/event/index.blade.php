@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-3">
        <h1>Event</h1>
    </div>
    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif

    <section class="container mx-6 my-4">
        <a href="/dashboard/event-pictures/create" class="px-4 py-2 bg-sky-500 rounded-full text-white">New Picture</a>
    </section>
    <section class="container mx-auto px-3">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach ($images as $image)
                <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 my-4">
                    <div class=" border-2 rounded-lg overflow-hidden ">
                        <img src="/storage/event/{{ $image->image }}" class="card-img-top" alt="...">
                    </div>
                    <div class="text-center mt-3">
                        <a href="/dashboard/event-pictures/{{ $image->id }}/edit"
                            class="px-6 py-2 rounded-xl bg-sky-400">Edit</a>
                        <form action="/dashboard/event-pictures/{{ $image->id }}" method="post" class="inline-flex">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('Are you sure delete ?')"
                                class="inline-flex px-6 py-2 rounded-xl bg-rose-400">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
