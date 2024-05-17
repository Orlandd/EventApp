@extends('dashboard.layouts.main')

@section('container')
    <div class="container mx-auto px-3 mb-10 mt-5">
        <h1 class="text-3xl font-bold">Scan Code</h1>
    </div>

    <div id="notif" class="container mx-auto px-3">

    </div>

    <div class="container mx-auto px-3">
        <div class="rounded-xl overflow-hidden w-full md:w-[700px] mx-auto lg:w-[500px]" id="reader">
        </div>
    </div>

    <section class="container mx-auto px-3">
        <form id="scanForm">

            <div class="">
                <h5 class="text-2xl font-semibold mt-6">Event</h5>

                <select id="idEvent" name="idEvent"
                    class="py-2 px-3 mb-3 pe-9 block w-full border-2 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                    <option selected="">Open this select menu</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}" data-variable="{{ $schedule->id }}">
                            {{ $schedule->events->nama }} | {{ $schedule->places->nama }} | {{ $schedule->tanggal }} |
                            {{ $schedule->waktu }}
                        </option>
                    @endforeach
                </select>
                <h5 class="text-2xl font-semibold mt-6">Input Code</h5>


                <input type="text" class="w-full p-2 border-2 rounded-full" id="result" name="result">

                <button class="w-full mt-4 py-3 rounded-full bg-sky-400" type="submit" id="button-addon2">Submit</button>
            </div>
        </form>
    </section>

    {{-- <div id="reader" width="100px"></div> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Tangani event submit pada form
            $('#scanForm').submit(function(e) {
                e.preventDefault(); // Hindari reload halaman

                let code = $('#result').val();
                $.ajax({
                    type: 'POST',
                    url: '/dashboard/scan/code',
                    data: {
                        result: code,
                        idEvent: $('#idEvent').val(),
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $("#notif").html(`

                            <div class="py-3 px-3 w-full rounded-full border-2 my-3">${response}</div>
                            
                        `)
                    },
                    error: function(xhr, status, error) {
                        // Tanggapan error dari server
                        // console.error(xhr.responseText);
                        // Lakukan tindakan lain jika diperlukan
                    }
                });
            });
        });

        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);

            let code = decodedText;

            $.ajax({
                type: 'POST',
                url: '/dashboard/scan/code',
                data: {
                    result: code,
                    idEvent: $('#idEvent').val(),
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    $("#notif").html(`
                            <div class="py-3 px-3 w-full rounded-full border-2 my-3">${response}</div>
                        `)
                },
                error: function(xhr, status, error) {

                }
            });


        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 60,
                qrbox: {
                    width: 300,
                    height: 300
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
