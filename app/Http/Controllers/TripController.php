<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    //home page
    public function index()
    {
        return view('trips.index', [
            'trips' => Trip::all(),
        ]);
    }

    //search for a trip
    public function search(Request $request)
    {
        $search = $request->get('start_city', 'end_city');
        $trips = Trip::where('start_city', 'like', '%' . $search . '%')->orWhere('end_city', 'like', '%' . $search . '%')
            ->get();

        // dd($trips);
        return view('users.search', [
            'trips' => $trips,
        ]);
    }

    //show single trip
    public function show(Trip $trip)
    {
        return view('users.show', [
            'trip' => $trip,
        ]);
    }

    //create new trip
    public function create()
    {
        return view('trips.create');
    }

    //store new trip
    public function store(Request $request)
    {
        $formData = $request->validate([
            'start_city' => 'required',
            'end_city' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'seats' => 'required',
        ]);

        Trip::create($formData);
        return redirect('/trips')->with('message', 'Trip created successfully!');
    }

    //edit trip
    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    //update trip
    public function update(Request $request, Trip $trip)
    {
        $formData = $request->validate([
            'start_city' => 'required',
            'end_city' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'seats' => 'required',
        ]);

        $trip->update($formData);
        return redirect('/trips')->with('message', 'Trip updated successfully!');
    }

    //delete trip
    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect('/trips')->with('message', 'Trip deleted successfully!');
    }

    //add a new ticket
    public function addTicket(Request $request, Ticket $ticket)
    {
        $formData = $request->validate([
            'trip_id' => 'required',
            'user_id' => 'required',
        ]);

        // $formData['user_id'] = Auth::user()->id;
        // dd($formData);


        DB::table('tickets')->insert($formData);
        DB::table('trips')->where('id', $formData['trip_id'])->decrement('seats', 1);
        return redirect('/')->with('message', 'Ticket added successfully!');
    }
}
