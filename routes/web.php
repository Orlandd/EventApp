<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventPictureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\Event;
use App\Models\Home;
use App\Models\Place;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    if (Auth::guest() || Auth::user()->role == 0) {
        return view('home', [
            'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
            'images' => Home::all()
        ]);
    }

    return redirect()->intended('/dashboard');
});

Route::get(
    '/schedule',
    [ScheduleController::class, 'index']
);

Route::get(
    '/locations',
    function () {
        return view('locations', [
            'locations' => Place::all()
        ]);
    }
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

    Route::post('/dashboard/scan/code', [TicketController::class, 'update']);
    Route::get('/dashboard/scan/code', [TicketController::class, 'update']);

    Route::post('/booking/event', [TicketController::class, 'getDataLocation'])->name('getDataLocation');
    Route::post('/booking/schedule', [TicketController::class, 'getDataSchedule'])->name('getDataSchedule');



    Route::resource('/booking', TicketController::class);
    Route::resource('/dashboard/scan', TicketController::class);
    Route::resource('/dashboard/schedules', ScheduleController::class);
    Route::resource('/dashboard/places', PlaceController::class);
    Route::resource('/dashboard/homes', HomeController::class);
    Route::resource('/dashboard/event-pictures', EventPictureController::class);
    Route::resource('/dashboard/events', EventController::class);


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

    // Route::post('/booking/schedule', function (Request $request) {
    //     // dd($request);
    //     return view('booking.schedule', [
    //         'event' => $request->event,
    //         'location' => $request->location,
    //         'dates' => Schedule::where('event_id', $request->event)->where('place_id', $request->location)->get()
    //     ]);
    // });
});
