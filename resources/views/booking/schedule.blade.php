@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1>Booking Ticket</h1>
    </div>
    <hr>

    <div class="text-start mt-2 ">
        <form action="/booking" method="post">
            @csrf
            <input type="hidden" id="disabledTextInput" class="form-control" name="event" id="event"
                placeholder="Disabled input" value="{{ $event }}">

            <input type="hidden" id="disabledTextInput" class="form-control" name="location" id="location"
                placeholder="Disabled input" value="{{ $location }}">
            <div class="row mb-3 justify-content-center">
                <h5 class="text-start col-sm-3">Date</h5>

                <div class="col-sm-3">
                    <select class="form-select" name="schedule" id="schedule" aria-label="Default select example">
                        @foreach ($dates as $date)
                            <option value="{{ $date->tanggal }},{{ $date->waktu }}" data-variable="{{ $date->id }}">
                                {{ $date->tanggal }}, ({{ $date->waktu }})
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <h5 class="text-start col-sm-3">Quantity Booked</h5>

                <div class="col-sm-3">
                    <input type="number" min="1" class="form-control" name="quantity" id="quantity" required>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <button type="submit" class="col-sm-2 btn btn-success">Book Now</button>
            </div>
        </form>
    </div>
@endsection
