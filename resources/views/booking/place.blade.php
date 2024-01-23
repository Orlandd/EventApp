@extends('layout.main')

@section('container')
    <div class="text-center">
        <h1>Booking Ticket</h1>
    </div>
    <hr>

    <div class="text-start mt-2 ">
        <form action="/booking/schedule" method="post">
            @csrf
            <h3 class="text-center">Location</h3>
            <input type="hidden" id="disabledTextInput" class="form-control" name="event" id="event"
                placeholder="Disabled input" value="{{ $event }}">
            <div class="row mb-3 justify-content-center">

                <div class="col-sm-7">
                    <select class="form-select" name="location" id="location" aria-label="Default select example">
                        @foreach ($locations[0]->places()->get() as $location)
                            <option value="{{ $location->id }}" data-variable="{{ $location->id }}">
                                {{ $location->nama }}
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
