@extends('layout.main')

@section('container')
    {{-- Place  --}}

    @if ($images != [])
        <!-- Slider -->
        <section class="container mx-auto px-3">
            <div data-hs-carousel='{
            "loadingClasses": "opacity-0",
            "isAutoPlay": true
          }'
                class="relative">
                <div class="hs-carousel relative overflow-hidden w-full h-[200px] md:h-[700px] bg-white rounded-lg">

                    <div
                        class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                        @foreach ($images as $image)
                            <div class="hs-carousel-slide">
                                <div class="flex justify-center h-full bg-cover bg-center bg-gray-100 p-6 dark:bg-neutral-900"
                                    style="background-image: url(/storage/event/{{ $image->image }})">
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
    @endif


    <!-- End Slider -->




    <h3 class="text-center text-3xl font-bold m-6">Current Event</h3>

    <section class="container mx-auto">
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
    </section>
@endsection
