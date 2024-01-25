<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\Place;
use App\Models\Schedule;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get()
    ]);
});

Route::get(
    '/schedule',
    [ScheduleController::class, 'index']
);

// Route::get('/signin', function () {
//     return view('login.signin');
// });

// Route::get('/registration', function () {
//     return view('login.registration');
// });


Route::middleware('only_guest')->group(function () {
    Route::get('/signin', [UserController::class, 'login'])->name('login');
    Route::post('/signin', [UserController::class, 'authenticating']);
    Route::get('/registration', [UserController::class, 'register']);
    Route::post('/registration', [UserController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('/signout', [UserController::class, 'logout']);
    Route::get(
        '/dashboard',
        function () {
            return view('dashboard.index');
        }
    );
    Route::resource('/booking', TicketController::class);
    Route::resource('/dashboard/scan', TicketController::class);

    // Route::get('/booking/event', function () {
    //     dd('test');
    //     return view('booking.event', [
    //         'events' => Event::all()
    //     ]);
    // });

    Route::post('/booking/location', function (Request $request) {
        // $location = Schedule::with('places')->where('event_id', $request->event)->get();
        // dd();

        return view('booking.place', [
            'event' => $request->event,
            'locations' => Schedule::with('places')->where('event_id', $request->event)->get(),

        ]);
    });

    Route::post('/booking/schedule', function (Request $request) {
        // dd($request);
        return view('booking.schedule', [
            'event' => $request->event,
            'location' => $request->location,
            'dates' => Schedule::where('event_id', $request->event)->where('place_id', $request->location)->get()
        ]);
    });
});
