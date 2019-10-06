<?php

namespace App\Http\Controllers;

use App\Location;
use App\TravelCategory;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::where('archived', 0)->latest()->get();
        return view('pages.locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $travels = TravelCategory::all();
        return view('pages.locations.create', compact('travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'short' => 'required|string|max:3',
        ]);

        $location = new Location;

        $location->name = $request->name;
        $location->label = slugify($request->name);
        $location->short = $request->short;
        $location->local_flight_ticket = $request->local_flight_ticket;
        $location->travel_category_id = $request->travel_category_id;

        $location->save();
        flash()->success('Success!!', 'Location has been created successfully.');
        return redirect()->route('locations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $travels = TravelCategory::latest()->get();
        return view('pages.locations.edit', compact('travels', 'location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'short' => 'required|string|max:3',
        ]);

        $location->name = $request->name;
        $location->label = slugify($request->name);
        $location->short = $request->short;
        $location->local_flight_ticket = $request->local_flight_ticket;
        $location->travel_category_id = $request->travel_category_id;

        $location->save();
        flash()->success('Success!!', 'Location has been updated successfully.');
        return redirect()->route('locations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $location->delete();
        flash()->success('Success!!', 'Location has been deleted successfully.');
        return back();
    }
}
