<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;

class EventsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $events = Events::all()->map(function ($event) {
      // Format date_from and date_to
      $formattedDateFrom = Carbon::parse($event->date_from)->format('F/j/Y'); // Format to 'Month/day/Year'
      $formattedDateTo = Carbon::parse($event->date_to)->format('F/j/Y');     // Format to 'Month/day/Year'

      return [
        'id' => 'event' . $event->id,
        'name' => $event->name, // Use 'name' for the event title
        'date' => $event->date_from == $event->date_to ? $formattedDateFrom : [$formattedDateFrom, $formattedDateTo],
        'description' => $event->description,
        'type' => $event->type ?? 'event', // Use 'type' or default to 'event'
        'everyYear' => false // Set logic if necessary
      ];
    });


    // dd($events);
    // Pass the events data to the view
    return view('calendar', ['events' => $events]);
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
  public function store(StoreEventsRequest $request)
  {
    // Check if AJAX request
    // Create the event using the form data
    $event = Events::create([
      'name' => $request->name,
      'description' => $request->description,
      'date_from' => $request->date_from,
      'date_to' => $request->date_to,
    ]);

    // Return a JSON response if AJAX request
    return response()->json([
      'success' => true,
      'message' => 'Event added successfully!',
      'event' => $event
    ]);
  }


  /**
   * Display the specified resource.
   */
  public function show(Events $events)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Events $events)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateEventsRequest $request, Events $events)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Events $events)
  {
    //
  }
}
