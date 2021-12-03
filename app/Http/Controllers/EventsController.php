<?php

namespace App\Http\Controllers;

use App\Exceptions\EventException;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['events' => Event::all()], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        try {
            $event = Event::create([
                'name'        => $request->input('name'),
                'type'        => $request->input('type'),
                'location'    => $request->input('location'),
                'date'        => $request->input('date'),
                'status'      => $request->input('status') ? $request->input('status') : 'new',
                'customer_id' => $request->input('customer_id')
            ]);

            return response()->json(['event' => $event], Response::HTTP_CREATED);
        } catch(EventException $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        try {
            return response()->json(['event' => $event], Response::HTTP_OK);
        } catch(EventException $e) {
            return $e;
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        try {
            $event->update([
                'name'        => $request->input('name'),
                'type'        => $request->input('type'),
                'location'    => $request->input('location'),
                'date'        => $request->input('date'),
                'status'      => $request->input('status'),
                'customer_id' => $request->input('customer_id')
            ]);

            return response()->json(['event' => $event], Response::HTTP_CREATED);
        } catch (EventException $e) {
            return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return  response()->json(['status' => 'OK'], Response::HTTP_OK);
    }
}
