@extends('layout.main')

@section('container')
    <section class="container mx-auto px-4">
        <div class=" flex flex-wrap-reverse mx-auto md:flex-nowrap gap-4 ">
            <div class="w-full mx-auto my-auto">
                <h4 class="text-lg text-sky-600 font-bold">Welcome to, Event ID</h4>
                <h1 class="text-3xl text-slate-900 font-bold">Your Gateway to Unforgettable Concert Experiences! </h1>
                <p class="text-lg">Elevate your concert experience! Exclusive access, seamless booking, top-notch
                    security. Stay updated and
                    make it an Event. Secure your tickets now!</p>
            </div>
            <div class="w-full flex gap-1 md:max-w-[610px]">
                <div class="bg-no-repeat bg-center bg-cover	 mx-auto w-[400px] h-[300px] md:w-[300px] md:h-[608px] bg-slate-500 rounded-xl overflow-hidden"
                    style="background-image: url(/storage/home/{{ $images[0]->image }});">
                    {{-- <img src="" alt=""> --}}
                </div>

                <div class="hidden md:inline">
                    <div style="background-image: url(/storage/home/{{ $images[1]->image }});"
                        class="bg-no-repeat bg-center bg-cover mx-auto mb-2 w-[400px] h-[300px] md:w-[300px] md:h-[300px] bg-slate-500 rounded-xl overflow-hidden">
                        {{-- <img src="https://source.unsplash.com/1080x1080?stage?orientation=horizontal" alt=""> --}}
                    </div>
                    <div style="background-image: url(/storage/home/{{ $images[2]->image }});"
                        class=" bg-no-repeat bg-center bg-cover mx-auto  mt-2 w-[400px] h-[300px] md:w-[300px] md:h-[300px] bg-slate-500 rounded-xl overflow-hidden">
                        {{-- <img src="https://source.unsplash.com/1080x1080?praise?orientation=horizontal" alt=""> --}}
                    </div>
                </div>

            </div>
        </div>


    </section>

    <br>
    <hr>

    <section class="container mx-auto px-4">
        <div class="mx-auto">
            <h2 class="text-2xl font-semibold text-center">Locations</h2>
            <div class="mt-3">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ($locations as $location)
                        <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 hover:scale-105 transition-all">
                            <div class=" aspect-square bg-center bg-cover  bg-slate-600 rounded-lg overflow-hidden"
                                style="background-image: url(/storage/places/{{ $location->image }});">

                            </div>
                            <p class="text-center text-xl mt-3">{{ $location->nama }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>


    </section>

    <br>
    <hr>

    <section class="container mx-auto px-4">
        <div class="mx-auto">
            <h2 class="text-2xl font-semibold text-center">Schedules</h2>

            <div class="mt-3">
                <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                    @foreach ($times as $time)
                        <div class="rounded-xl shadow-xl border-2 overflow-hidden p-3 hover:scale-105 transition-all">
                            <p class="text-lg font-semibold text-center mb-3">{{ $time->events->nama }}</p>
                            <div class=" p-4 border-2 rounded-lg overflow-hidden">
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $time->tanggal }} |
                                    {{ $time->waktu }} </h6>
                                <p class="card-text">{{ $time->places->nama }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center mt-5">
                <a href="/" class="text-xl font-semibold text-center">View More...</a>
            </div>

        </div>


    </section>
@endsection
