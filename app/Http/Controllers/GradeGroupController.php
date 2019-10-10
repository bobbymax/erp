<?php

namespace App\Http\Controllers;

use App\GradeGroup;
use App\Allowance;
use App\TravelCategory;
use Illuminate\Http\Request;

class GradeGroupController extends Controller
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
        $gradeGroups = GradeGroup::latest()->get();
        return view('pages.gradegroups.index', compact('gradeGroups'));
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gradegroups.create');
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
            'grades' => 'required|string|max:255',
            'out_of_pocket' => 'required|integer',
            'airport_shuttle' => 'required|integer',
            'local_flight_ticket' => 'required|integer',
            'intra_city_shuttle' => 'required|integer',
            'ph_transit' => 'required|integer',
        ]);

        $gradeGroup = new GradeGroup;

        $gradeGroup->name = $request->name;
        $gradeGroup->label = slugify($request->name);
        $gradeGroup->grades = $request->grades;

        if ($gradeGroup->save()) {
            $allowance = new Allowance;

            $allowance->grade_group_id = $gradeGroup->id;
            $allowance->airport_shuttle = $request->airport_shuttle;
            $allowance->local_flight_ticket = $request->local_flight_ticket;
            $allowance->intra_city_shuttle = $request->intra_city_shuttle;
            $allowance->ph_transit = $request->ph_transit;
            $allowance->out_of_pocket = $request->out_of_pocket;

            $allowance->save();
        }

        flash()->success('Success!!', 'Grade group and allowances created successfully.');
        return redirect()->route('gradeGroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GradeGroup  $gradeGroup
     * @return \Illuminate\Http\Response
     */
    public function show(GradeGroup $gradeGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GradeGroup  $gradeGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeGroup $gradeGroup)
    {
        return view('pages.gradegroups.edit', compact('gradeGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GradeGroup  $gradeGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradeGroup $gradeGroup)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'grades' => 'required|string|max:255',
            'out_of_pocket' => 'required|integer',
            'airport_shuttle' => 'required|integer',
            'local_flight_ticket' => 'required|integer',
            'intra_city_shuttle' => 'required|integer',
            'ph_transit' => 'required|integer',
        ]);

        $gradeGroup->name = $request->name;
        $gradeGroup->label = slugify($request->name);
        $gradeGroup->grades = $request->grades;

        if ($gradeGroup->save()) {
            $allowance = $gradeGroup->allowance;

            $allowance->grade_group_id = $gradeGroup->id;
            $allowance->airport_shuttle = $request->airport_shuttle;
            $allowance->local_flight_ticket = $request->local_flight_ticket;
            $allowance->intra_city_shuttle = $request->intra_city_shuttle;
            $allowance->ph_transit = $request->ph_transit;
            $allowance->out_of_pocket = $request->out_of_pocket;

            $allowance->save();
        }

        flash()->success('Success!!', 'Grade group and allowances updated successfully.');
        return redirect()->route('gradeGroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GradeGroup  $gradeGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeGroup $gradeGroup)
    {
        $gradeGroup->delete();
        flash()->success('Success!!', 'Grade group and allowances deleted successfully.');
        return back();
    }
}
