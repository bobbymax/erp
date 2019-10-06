<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GradeLevel;

class GradeLevelController extends Controller
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
        $grades = GradeLevel::latest()->get();
        return view('pages.gradelevels.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.gradelevels.create');
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
        	'code' => 'required|string|max:3',
        ]);

        $grade = new GradeLevel;

        $grade->name = $request->name;
        $grade->label = slugify($request->name);
        $grade->code = $request->code;
        // $grade->per_diem_local = $request->per_diem_local;
        // $grade->per_diem_international = $request->per_diem_international;
        // $grade->airport_shuttle = $request->airport_shuttle;
        

        $grade->save();

        flash()->success('Success', 'Grade Level Created');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(GradeLevel $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(GradeLevel $grade)
    {
        return view('pages.gradelevels.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradeLevel $grade)
    {
        $this->validate($request, [
        	'name' => 'required|string|max:255',
        	'code' => 'required|string|max:3',
        ]);

        $grade->name = $request->name;
        $grade->label = slugify($request->name);
        $grade->code = $request->code;

        $grade->save();

        flash()->success('Success', 'Grade Level Updated Successfully');
        return redirect()->route('grades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradeLevel $grade)
    {
        $grade->delete();
        flash()->success('Success', 'Grade Level Deleted Successfully.');
        return redirect()->route('grades.index');
    }
}
