@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-3">
        <h1>Update Home</h1>
    </div>

    <div class="container mx-auto px-3">
        <div class="rounded-xl max-w-96 shadow-xl border-2 overflow-hidden p-3 my-4">
            <div class=" border-2 rounded-lg overflow-hidden ">
                <img src="/storage/event/{{ $image->image }}" class="card-img-top" alt="...">
            </div>
        </div>
    </div>

    <div class="container mx-auto px-3 mb-10">
        <form action="/dashboard/event-pictures/{{ $image->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image"
                class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>
        </form>
    </div>
@endsection
