@extends('layout.main')

@section('container')
    <section class="flex flex-col min-h-screen ">
        <div class="container mx-auto mt-8 px-4 ">
            <h4 class="text-2xl font-semibold text-center text-black mb-6">Profile</h4>
        </div>

        <div class="container mx-auto px-4">
            <div class="mx-auto p-4 text-center border-2 rounded-xl md:w-1/2">
                <h1 class="text-3xl font-medium">{{ auth()->user()->name }}</h1>
                <h3>{{ auth()->user()->email }} | {{ auth()->user()->nohp }}</h3>
            </div>
            <div class="mx-auto p-4 text-center">
                <a href="/profile/edit" class="px-4 py-2 bg-emerald-300 rounded-xl">Edit</a>
            </div>

        </div>
    </section>
@endsection
