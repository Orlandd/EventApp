<?php

namespace App\Http\Controllers;

use App\Models\EventPicture;
use App\Http\Requests\StoreEventPictureRequest;
use App\Http\Requests\UpdateEventPictureRequest;

class EventPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = EventPicture::all();

        return view('dashboard.home.event.index', [
            'images' => $images
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        //
    }
}
