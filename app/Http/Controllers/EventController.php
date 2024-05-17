<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Home;
use App\Models\Place;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }


        if (Auth::user()->role == 1) {


            return view('dashboard.events.index', [
                'events' => $events,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }

        if (Auth::user()->role == 1) {


            return view('dashboard.events.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $nama = $request->nama;
        Event::create([
            "nama" => $nama,
        ]);

        return redirect("/dashboard/events")->with("status", 'Event has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }

        return view("dashboard.events.edit", [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->nama = $request->nama;
        $event->update();

        return redirect("/dashboard/events")->with("status", 'Event has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {


        $event->delete();
        return redirect("/dashboard/events")->with("status", 'Event has been deleted!');
    }
}
