@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1>My Ticket</h1>
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <div class="card text-center shadow" style="max-width: 340px;">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $ticket->schedules->events->nama }}</h5>
                <hr>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $ticket->schedules->tanggal }} |
                    {{ $ticket->schedules->waktu }}
                </h6>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $ticket->schedules->places->nama }}</h6>
                <p class="card-text">{{ $ticket->schedules->places->lokasi }}</p>
                <hr>
                <div class="text-center">
                    {{ QrCode::size(200)->generate($ticket->code) }}
                    <p>{{ $ticket->code }}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
