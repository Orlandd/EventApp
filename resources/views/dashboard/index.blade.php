@extends('dashboard.layouts.main')

@section('container')
    <div class="container px-4 mx-auto mt-3">
        <h1 class="text-2xl font-medium">Welcome Back, {{ auth()->user()->name }}</h1>
    </div>
    <div class="container px-4 mx-auto mt-3">
        <div class="grid grid-cols-1  gap-4 w-full ">
            <div class="p-3 border-2 rounded-xl w-full">
                <h1 class="text-2xl font-medium mb-4">Schedules</h1>
                @foreach ($schedules as $schedule)
                    {{ $schedule->tanggal }} | {{ $schedule->events->nama }} | {{ $schedule->places->nama }} |
                    {{ $schedule->tickets_count }}
                @endforeach
            </div>
        </div>
        <div class="mt-5 flex flex-col justify-center items-center border-2 border-yellow-500 p-4 rounded-2xl shadow-lg">
            <h2 class="text-yellow-500 text-lg font-semibold mb-4">Event</h2>
            <div class="w-full h-64 bg-white">
                <canvas id="event" class="w-full mx-auto"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {

            let getEvent;


            $.ajax({
                url: "/dashboard/getEvent",
                method: 'GET',
                success: function(response) {
                    if (getEvent) {
                        getEvent.destroy();
                    }

                    console.log(
                        response); // Memperbaiki log untuk menampilkan respons yang diterima

                    if (response.length > 0) {
                        let labels = [];
                        let data = [];

                        response.forEach(e => {
                            labels.push(e.nama);
                            data.push(e.total_tickets_count);
                        });

                        const ctx = document.getElementById('event').getContext('2d');
                        getEvent = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Event',
                                    data: data,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }

                        });
                    } else {
                        const ctx = document.getElementById('event').getContext('2d');
                        pemasukanChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: [],
                                datasets: [{
                                    label: 'Event',
                                    data: [],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }

                        });
                    }
                }
            });

        });
    </script>
@endsection
