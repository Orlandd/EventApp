<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Home;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Place::all();

        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }


        if (Auth::user()->role == 1) {


            return view('dashboard.locations.index', [
                'locations' => $locations,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaceRequest $request)
    {
        // dd($request);
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $imageName = $request->nama . '.' . $request->image->extension();
        $request->image->move(public_path('storage'), $imageName);

        $nama = $request->nama;
        $lokasi = $request->address;
        Place::create([
            "nama" => $nama,
            "lokasi" => $lokasi,
            "image" => $imageName,
        ]);

        return redirect("/dashboard/places")->with("status", 'Location has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Place $place)
    {
        if (Auth::user()->role == 1) {
            return view('dashboard.locations.detail', [
                'location' => $place,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Place $place)
    {
        return view("dashboard.locations.edit", [
            'location' => $place,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaceRequest $request, Place $place)
    {
        // dd($request);

        if (!isset($request->image)) {
            $place->nama = $request->nama;
            $place->lokasi = $request->address;
            $place->update();

            return redirect("/dashboard/places")->with("status", 'Location has been updated!');
        }

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $imageName = $request->nama . '.' . $request->image->extension();
        $request->image->move(public_path('storage'), $imageName);

        $place->nama = $request->nama;
        $place->lokasi = $request->address;
        $place->image = $imageName;
        $place->update();

        return redirect("/dashboard/places")->with("status", 'Location has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect("/dashboard/places")->with("status", 'Location has been deleted!');
    }
}
