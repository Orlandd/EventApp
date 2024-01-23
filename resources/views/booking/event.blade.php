@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1>Booking Ticket</h1>
    </div>
    <hr>

    <div class="text-start mt-2 ">
        <form action="/booking/location" method="post">
            @csrf
            <h3 class="text-center">Event</h3>
            <div class="row mb-3 justify-content-center">

                <div class="col-sm-7">
                    <select class="form-select" name="event" id="event" aria-label="Default select example">
                        @foreach ($events as $event)
                            <option value="{{ $event->id }}" data-variable="{{ $event->id }}">
                                {{ $event->nama }}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <button type="submit" class="col-sm-2 btn btn-primary">Next</button>
            </div>
        </form>
    </div>
@endsection
