<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Event;
use App\Models\Place;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $locations = Place::all();
        $times = Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get();
        // dd($times);

        if (Auth::user()->role == 1) {


            return view('dashboard.schedules.index', [
                'locations' => $locations,
                'times' => $times
            ]);
        }

        return view('schedule', [
            'locations' => $locations,
            'times' => $times
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Place::all();
        $events = Event::all();
        return view("dashboard.schedules.create", [
            'locations' => $locations,
            'events' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScheduleRequest $request)
    {
        // dd($request);
        $eventId = $request->event;
        $locationId = $request->location;
        $date = $request->date;
        $time = $request->time;
        $jumlah = $request->jumlah;
        Schedule::create([
            "event_id" => $eventId,
            "place_id" => $locationId,
            "tanggal" => $date,
            "waktu" => $time,
            "status" => "on",
            "jumlah" => $jumlah
        ]);

        return redirect("/dashboard/schedules")->with("status", 'Schedule has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        $times = Schedule::with('places', 'events')->where('id', $schedule->id)->orderBy('tanggal', 'ASC')->first();

        $locations = Place::all();
        $events = Event::all();
        return view("dashboard.schedules.edit", [
            'schedule' => $times,
            'locations' => $locations,
            'events' => $events
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        // dd($schedule);
        $eventId = $request->event;
        $locationId = $request->location;
        $date = $request->date;
        $time = $request->time;
        $jumlah = $request->jumlah;


        $schedule->event_id = $eventId;
        $schedule->place_id = $locationId;
        $schedule->tanggal = $date;
        $schedule->waktu = $time;
        $schedule->status = "on";
        $schedule->jumlah = $jumlah;
        $schedule->update();

        return redirect("/dashboard/schedules")->with("status", 'Schedule has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}
