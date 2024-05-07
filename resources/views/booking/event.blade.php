@extends('layout.main')

@section('container')
    <div class="text-3xl font-bold p-4 text-center">
        <h1>Booking Ticket</h1>
    </div>
    <hr>

    <div class="container mx-auto p-3">
        <form action="/booking" method="post">
            @csrf
            <label for="event">Event</label>
            <select id="event" name="event"
                class="py-2 px-3 mb-3 pe-9 block w-full border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Open this select menu</option>
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" data-variable="{{ $event->id }}">
                        {{ $event->nama }}
                    </option>
                @endforeach
            </select>
            <label for="location">Loacation</label>
            <select id="place" name="location"
                class="py-2 px-3 mb-3  pe-9 block w-full border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Open this select menu</option>
            </select>
            <label for="schedule">Schedule</label>
            <select id="schedule" name="schedule"
                class="py-2 px-3 mb-3 pe-9 block w-full border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                <option selected="">Open this select menu</option>
            </select>

            <div class="flex gap-4">
                <label class="" for="quantity">Quantity Booked</label>

                <div class="col-sm-3">
                    <input type="number" min="1" class="border-2 py-2 px-3 rounded-lg text-sm" name="quantity"
                        id="quantity" required>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="px-4 py-2 bg-slate-300 rounded-lg">Book Now</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Ketika nilai pada select pertama berubah
            $('#event').change(function() {
                let event = $(this).val(); // Ambil nilai dari select pertama
                // Kirim permintaan AJAX ke Laravel untuk mendapatkan data terkait dengan nilai select pertama
                $.ajax({
                    url: "{{ route('getDataLocation') }}",
                    type: "POST",
                    data: {
                        event: event,
                        _token: '{{ csrf_token() }}'
                    }, // Kirim nilai select pertama ke Laravel
                    success: function(response) {
                        // Tampilkan data yang diterima di select kedua
                        let html = '';

                        html += `
                            <option selected="">Open this select menu</option>
                        `
                        response.forEach(e => {
                            html += `
                                <option value="${e.place_id}" data-variable="${e.place_id}">
                                    ${e.places.nama}
                                </option>
                            `;
                        });
                        $('#place').html(html);

                        console.log(response)
                    }
                });
            });

            $('#place').change(function() {
                let event = $('#event').val();
                let place = $(this).val();
                $.ajax({
                    url: "{{ route('getDataSchedule') }}",
                    type: "POST",
                    data: {
                        event: event,
                        place: place,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response)
                        let html = '';

                        html += `
                            <option selected="">Open this select menu</option>
                        `
                        response.forEach(e => {
                            html += `
                                <option value="${e.id}" data-variable="${e.id}">
                                    ${e.tanggal} | ${e.waktu} | sisa : ${e.jumlah}
                                </option>
                            `;
                        });
                        $('#schedule').html(html);
                    }
                });
            });
        });
    </script>
@endsection
