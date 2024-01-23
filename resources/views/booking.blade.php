@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1>My Ticket</h1>
    </div>
    <hr>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-5">
        @foreach ($tickets as $ticket)
            <div class="col">
                <div class="card mx-1 shadow border border-0 rounded-4 {{ $ticket->status == 1 ? 'bg-danger-subtle bg-opacity-10' : 'bg-success-subtle bg-opacity-10' }}"
                    style="width: 18rem;">
                    <div class="card-body ">
                        <h5 class="card-title">{{ $ticket->schedules->events->nama }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $ticket->schedules->tanggal }} |
                            {{ $ticket->schedules->waktu }}
                        </h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ $ticket->schedules->places->nama }}</h6>
                        <p class="card-text">{{ $ticket->schedules->places->lokasi }}</p>
                        <a href="/booking/{{ $ticket->id }}" class="badge bg-dark text-decoration-none">Show</a>
                        <a href="#" class="badge bg-danger text-decoration-none">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection
