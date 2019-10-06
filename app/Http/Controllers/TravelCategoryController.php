<?php

namespace App\Http\Controllers;

use App\TravelCategory;
use Illuminate\Http\Request;

class TravelCategoryController extends Controller
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
        $travels = TravelCategory::where('archived', 0)->latest()->get();
        return view('pages.travels.index', compact('travels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.travels.create');
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
            'type' => 'required|string|max:255',
            'locations' => 'required|string|max:255',
        ]);

        $travel = new TravelCategory;

        $travel->type = $request->type;
        $travel->label = slugify($request->type);
        $travel->locations = $request->locations;

        $travel->save();

        flash()->success('Success!!', 'Travel category saved successfully.');
        return redirect()->route('travels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TravelCategory  $travelCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TravelCategory $travel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TravelCategory  $travelCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TravelCategory $travel)
    {
        return view('pages.travels.edit', compact('travel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TravelCategory  $travelCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TravelCategory $travel)
    {
        $this->validate($request, [
            'type' => 'required|string|max:255',
            'locations' => 'required|string|max:255',
        ]);

        $travel->type = $request->type;
        $travel->label = slugify($request->type);
        $travel->locations = $request->locations;

        $travel->save();

        flash()->success('Success!!', 'Travel category updated successfully.');
        return redirect()->route('travels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TravelCategory  $travelCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TravelCategory $travel)
    {
        $travel->delete();
        flash()->success('Success!!', 'Travel category deleted successfully.');
        return back();
    }
}
