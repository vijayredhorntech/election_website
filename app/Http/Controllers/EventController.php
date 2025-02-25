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

        try {
            // start date can't be in the past
            if ($request->start_datetime < now()) {
                return redirect()->route('events.index')->with('error', 'Start date can\'t be in the past');
            }

            // end date should be greater than start date
            if ($request->end_datetime <= $request->start_datetime) {
                return redirect()->route('events.index')->with('error', 'End date should be greater than start date');
            }

            $request->merge(['creator_id' => auth()->user()->id]);
            $event = Event::create($request->all());
            // $event->save();
            return redirect()->route('events.index')->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            return redirect()->route('events.index')->with('error', 'Error creating event');
        }
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

    public function status($id)
    {
        // dd($id);
        try {
            $event = Event::find($id);

            if ($event->status == 'completed') {
                return redirect()->route('events.index')->with('error', 'Event is already completed');
            }

            if (!$event) {
                return redirect()->route('events.index')->with('error', 'Event not found');
            }

            // toggle status from upcoming -> 'ongoing', 'completed'
            $event->status = $event->status == 'upcoming' ? 'ongoing' : 'completed';

            $event->save();

            return redirect()->route('events.index')->with('success', 'Event status updated successfully');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->route('events.index')->with('error', 'Error updating event status');
        }
    }
}
