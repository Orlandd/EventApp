@extends('dashboard.layouts.main')

@section('container')
    <div class="container px-4 mx-auto mt-3">
        <h1 class="text-2xl font-medium">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>
@endsection
