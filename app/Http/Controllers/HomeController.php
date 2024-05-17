<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Home::all();

        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }

        return view('dashboard.home.hero.index', [
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        return view('dashboard.home.hero.edit', [
            'image' => $home
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        $imageName = 'image' . $home->id . '.' . $request->image->extension();
        $request->image->move(public_path('storage/home'), $imageName);

        Home::create([
            "image" => $imageName,
        ]);

        return redirect("/dashboard/homes")->with("status", 'Image has been created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
