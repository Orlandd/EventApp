@extends('dashboard.layouts.main')

@section('container')
    <section class="container mx-auto p-3">
        <h1 class="text-3xl">Update</h1>
    </section>
    <section class="container mx-auto p-3">
        <div class="">
            <form action="/dashboard/schedules/{{ $schedule->id }}" method="POST">
                @method('PUT')
                @csrf
                <input type="text" value="{{ $schedule->id }}" name="id" id="id" hidden>
                <label for="event">Event</label>
                <select id="event" name="event"
                    class="py-2 px-3 mb-3 pe-9 block w-[300px] border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="{{ $schedule->events->nama }}" value="{{ $schedule->events->id }}"
                        class="bg-slate-300 p-2">
                        {{ $schedule->events->nama }}</option>
                    @foreach ($events as $event)
                        <option value="{{ $event['id'] }}">{{ $event['nama'] }}</option>
                    @endforeach
                </select>
                <label for="location">Location</label>
                <select id="location" name="location"
                    class="py-2 px-3 mb-3 pe-9 block w-[300px] border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="{{ $schedule->places->nama }}" value="{{ $schedule->places->id }}"
                        class="bg-slate-300 p-2">
                        {{ $schedule->places->nama }}</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location['id'] }}">{{ $location['nama'] }}
                        </option>
                    @endforeach

                </select>
                <label for="date">Date</label><br>
                <input type="date" name="date" id="date " value="{{ $schedule['tanggal'] }}"
                    class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"><br>
                <label for="time">Time</label><br>
                <input type="time" name="time" id="time"
                    class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2" value="{{ $schedule['waktu'] }}"> <br>
                <label for="jumlah">Jumlah</label><br>
                <input type="number" name="jumlah" id="jumlah" min="1" value="{{ $schedule['jumlah'] }}"
                    class="rounded-lg py-2 px-3 mb-3 border-gray-200 border-2"> <br>

                <button type="submit" class="py-2 px-3 rounded-lg bg-sky-500">Submit</button>

            </form>
        </div>

    </section>
@endsection
