@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1 class="text-3xl font-bold my-4">My Ticket</h1>
    </div>
    <hr>

    <section class="container mx-auto mt-5">
        <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 max-w-96 mx-auto">
            <p class="text-lg font-semibold text-center mb-3">{{ $ticket->schedules->events->nama }}</p>
            <div class=" p-4 border-2 rounded-lg overflow-hidden">
                <h6 class="text-lg font-medium text-center">{{ $ticket->schedules->tanggal }} |
                    {{ $ticket->schedules->waktu }} </h6>
                <p class="text-lg font-medium text-center">{{ $ticket->schedules->places->nama }}</p>
                <p class="text-lg font-medium text-center">{{ $ticket->schedules->places->lokasi }}</p>
                <hr>
                <div class="mt-4">
                    <div class="flex flex-wrap justify-center"> {{ QrCode::size(200)->generate($ticket->code) }}</div>
                    <p class="text-center">{{ $ticket->code }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
