<?php

namespace App\Http\Controllers;

use App\Models\EventPicture;
use App\Http\Requests\StoreEventPictureRequest;
use App\Http\Requests\UpdateEventPictureRequest;
use App\Models\Home;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = EventPicture::all();

        if (Auth::guest() || Auth::user()->role == 0) {
            return view('home', [
                'times' => Schedule::with('places', 'events')->orderBy('tanggal', 'ASC')->get(),
                'images' => Home::all()
            ]);
        }

        return view('dashboard.home.event.index', [
            'images' => $images
        ]);
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
        return view('dashboard.home.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventPictureRequest $request)
    {
        $id = EventPicture::all()->last();


        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        if ($id === null) {
            $imageName = 'image1' . '.' . $request->image->extension();
        } else {
            $imageName = 'image' . $id->id + 1 . '.' . $request->image->extension();
        }

        $directory = public_path('storage/event');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $request->image->move(public_path('storage/event'), $imageName);

        EventPicture::create([
            "image" => $imageName,
        ]);

        return redirect("/dashboard/eventpictures")->with("status", 'Image has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventPicture $eventPicture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventPicture $eventPicture)
    {

        return view('dashboard.home.event.edit', [
            'image' => $eventPicture
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventPictureRequest $request, EventPicture $eventPicture)
    {

        if ($request->image !== null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            ]);

            $imageName = 'image' . $eventPicture->id . '.' . $request->image->extension();
            $request->image->move(public_path('storage/event'), $imageName);

            $eventPicture->image = $imageName;
            $eventPicture->update();

            return redirect("/dashboard/event-pictures")->with("status", 'Image has been updated!');
        }

        return redirect("/dashboard/event-pictures")->with("status", 'Image has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventPicture $eventPicture)
    {

        $imagePath = public_path('storage/event/' . $eventPicture->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);

            $eventPicture->delete();
        }


        return redirect("/dashboard/event-pictures")->with("status", 'Image has been deleted!');
    }
}
