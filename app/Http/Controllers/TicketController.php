<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Event;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function index(Request $request)
    {
        // return view('booking.place', [
        //     'event' => $request->event,
        //     'location' => $request->location,
        //     'Dates' => Schedule::where('event_id', $request->event)->where('place_id', $request->location)->get()
        // ]);

        // dd(auth()->user()->role);
        if (auth()->guest() || auth()->user()->role == 0) {
            $tickets = Ticket::with('schedules.places', 'schedules.events')->where('user_id', Auth::id())->get();

            return view('booking', [
                'tickets' => $tickets
            ]);
        }

        return view('dashboard.tickets.scan');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('booking.event', [
            'events' => Event::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Untuk mendapatkan tanggal dan waktu
        $date = explode(",", $request->schedule);

        // $schedule = Schedule::where('event_id', $request->event)->where('place_id', $request->location)->where('tanggal', $date[0])->where('waktu', $date[1])->first();

        // dd($schedule);
        for ($i = 0; $i < $request->quantity; $i++) {
            $code = Uuid::uuid4()->toString();
            $data = $request;
            $data = [
                "code" => $code,
                "user_id" => Auth::id(),
                "schedule_id" => $request->schedule
            ];

            Ticket::create($data);
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($ticket)
    {
        $tickets = Ticket::with('schedules.places', 'schedules.events')->where('user_id', Auth::id())->where('id', $ticket)->first();


        $data = $tickets->code;
        $qrCode = QrCode::generate($data);


        return view('showTicket', [
            "ticket" => $tickets,
            'qrCode' => $qrCode
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket, Request $request)
    {
        dd('test');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $tickets = Ticket::where('code', $request->result)->first();


        if (!$tickets) {
            return response()->json('Ticket not found!', 404);
        }

        if ($tickets->status == 1) {
            // return response()->json('Ticket already used!');
            return response()->json('
                <div class="alert alert-danger" role="alert">
                    Ticket already used!
                </div>
            ');
        }


        Ticket::where('code', $request->result)->update([
            'status' => 1
        ]);

        // return response()->json('Ticket successfully used!');
        return response()->json('
                <div class="alert alert-success" role="alert">
                    Ticket successfully used!
                </div>
        ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }


    public function getDataLocation(Request $request)
    {
        $event = $request->input('event');
        $data = Schedule::with('places')->where('event_id', $event)->get();

        return response()->json($data);

        // return view('booking', compact('data'));
    }

    public function getDataSchedule(Request $request)
    {
        $event = $request->input('event');
        $place = $request->input('place');

        $data = Schedule::where('event_id', $event)->where('place_id', $place)->get();
        return response()->json($data);
    }
}
