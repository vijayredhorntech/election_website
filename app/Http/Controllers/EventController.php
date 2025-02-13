<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Office;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formData = [
            'url' => route('events.store'),
            'method' => 'POST',
            'type' => 'Create'
        ];

        $events = Event::all();

        $offices = Office::all();
        return view('admin.events.index')->with('events', $events)->with('formData', $formData)->with('offices', $offices);
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
    public function store(Request $request)
    {
        $request->validate([
            'office_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'start_datetime' => 'required',
            'end_datetime' => 'required',
            'location' => 'required',
        ]);
        $request->merge(['creator_id' => auth()->user()->id]);
        $event = Event::create($request->all());
        // $event->save();
        return redirect()->route('events.index')->with('success', 'Event created successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
