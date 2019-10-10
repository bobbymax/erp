<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradeGroup;
use App\TravelCategory;
use DB;

class PerDiemController extends Controller
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
    public function index($gradeGroup)
    {
        $gradeGroup = GradeGroup::where('label', $gradeGroup)->firstOrFail();
        return view('pages.gradegroups.per-diem', compact('gradeGroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($gradeGroup)
    {
        $gradeGroup = GradeGroup::where('label', $gradeGroup)->firstOrFail();
        $travels = TravelCategory::latest()->get();
        return view('pages.gradegroups.create-per-diem', compact('gradeGroup', 'travels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, GradeGroup $gradeGroup)
    {
        $this->validate($request, [
            'travel_category_id' => 'required|integer',
            'per_diem' => 'required|integer',
        ]);

        $travel = TravelCategory::find($request->travel_category_id);

        if ($travel) {
            $gradeGroup->travelCategories()->attach($travel->id, [
                'per_diem' => $request->per_diem,
            ]);
        }

        flash()->success('Success!!', 'Per Diem added successfully.');
        return redirect()->route('per.diems.index', $gradeGroup->label);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeGroup $gradeGroup, TravelCategory $travel)
    {
        $travels = TravelCategory::all();
        $db = DB::table('per_diem_allowances')->where('travel_category_id', $travel->id)->where('grade_group_id', $gradeGroup->id)->pluck('per_diem');

        // echo $db;
        return view('pages.gradegroups.edit-per-diem', compact('gradeGroup', 'travels', 'travel', 'db'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradeGroup $gradeGroup, TravelCategory $travel)
    {
        $this->validate($request, [
            'travel_category_id' => 'required|integer',
            'per_diem' => 'required|integer',
        ]);

        $newTravelId = $request->travel_category_id;

        $newTravel = TravelCategory::find($newTravelId);

        if ($newTravel) {
            if ($travel->id != $newTravel->id) {
                $gradeGroup->travelCategories()->detach($travel->id);

                $gradeGroup->travelCategories()->attach($newTravel->id, [
                    'per_diem' => $request->per_diem,
                ]);
            } else {
                $gradeGroup->travelCategories()->updateExistingPivot($travel->id, [
                     'per_diem' => $request->per_diem,
                ]);
            }

            flash()->success('Success!!', 'Per Diem has been updated successfully.');
        } else {
            flash()->error('Oops!!', 'Something went wrong.');
        }
        return redirect()->route('per.diems.index', $gradeGroup->label);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeGroup $gradeGroup, TravelCategory $travel)
    {
        $gradeGroup->travelCategories()->detach($travel->id);

        flash()->success('Success!!', 'Per Diem has been deleted successfully.');
        return back();
    }
}
