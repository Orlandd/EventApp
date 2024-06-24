<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // dd(Schedule::where('tanggal', '>=', Carbon::today())
        //     ->orderBy('tanggal', 'asc')
        //     ->take(5)
        //     ->get());

        $schedules = Schedule::with('events', 'places', 'tickets')
            ->where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->take(5)
            ->get();

        // Tambahkan jumlah tiket ke setiap entri
        $schedules->each(function ($schedule) {
            $schedule->tickets_count = $schedule->tickets->count();
        });

        return view('dashboard.index', [
            'schedules' => $schedules
        ]);
    }

    public function getEvent()
    {

        $events = Event::with(['schedules' => function ($query) {
            $query->withCount('tickets');
        }])->get();


        $events->each(function ($event) {
            $event->total_tickets_count = $event->schedules->sum('tickets_count');
        });

        // dd($events);

        return response()->json($events);
    }
}
