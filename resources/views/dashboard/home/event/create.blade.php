@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-3">
        <h1>Add Picture</h1>
    </div>

    <div class="container mx-auto px-3 mb-10">
        <form action="/dashboard/event-pictures" method="post" enctype="multipart/form-data">
            @csrf
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image" class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
            <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>
        </form>
    </div>
@endsection
