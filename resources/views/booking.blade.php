@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1 class="text-3xl font-semibold my-3">My Ticket</h1>
    </div>

    @if (session('status'))
        <section class="container ">
            <div class="w-full p-3 border-2 border-sky-600 rounded-lg shadow-lg shadow-sky-300">
                {{ session('status') }}
            </div>
        </section>
    @endif
    <section class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 px-3">
            @foreach ($tickets as $ticket)
                <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3  {{ $ticket->status == 0 ? 'bg-green-200' : 'bg-red-200' }}"
                    hover:scale-105 transition-all">
                    <p class="text-lg font-semibold text-center mb-3">{{ $ticket->schedules->events->nama }}</p>
                    <div class=" p-4 border-2 border-slate-500 rounded-lg overflow-hidden">
                        <h6 class="text-lg font-medium text-center">{{ $ticket->schedules->tanggal }} |
                            {{ $ticket->schedules->waktu }}
                            <h6 class="text-lg font-medium text-center ">{{ $ticket->schedules->places->nama }}</h6>
                            <p class="text-lg font-medium text-center">{{ $ticket->schedules->places->lokasi }}</p>
                            <div class="text-center mt-3">
                                <a href="/booking/{{ $ticket->id }}"
                                    class="px-4 py-2 bg-slate-500 rounded-full text-white">Show</a>
                                <a href="#"
                                    class="px-4 py-2 bg-red-500 rounded-full text-white {{ $ticket->status == 0 ? 'inline' : 'hidden' }}">Delete</a>
                            </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
