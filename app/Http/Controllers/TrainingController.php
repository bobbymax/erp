<?php

namespace App\Http\Controllers;

use App\Training;
use App\Category;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Storage;

class TrainingController extends Controller
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
        $trainings = auth()->user()->trainings;
        return view('pages.trainings.index', compact('trainings'));
    }

    public function manage()
    {
        $trainings = Training::where('completed', 1)->where('archived', 0)->latest()->get();
        $categories = Category::latest()->get();
        return view('pages.trainings.trainings', compact('categories', 'trainings'));
    }

    public function userTrainings($user)
    {
        $user = User::where('staff_no', $user)->firstOrFail();
        $categories = Category::latest()->get();
        return view('pages.trainings.bulk-edit', compact('user', 'categories'));
    }

    public function proposed()
    {
        $trainings = Training::where('completed', 0)->latest()->get();
        return view('pages.trainings.proposed', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.trainings.create');
    }

    public function createProposed()
    {
        return view('pages.trainings.create-proposed');
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
            'title' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'location_during_training' => 'string|max:255',
            //'certificate' => 'mimes:jpeg,bmp,png,gif,svg,pdf',
        ]);

        $training = new Training;

        $training->title = $request->title;
        $training->label = slugify($request->title);
        $training->provider = $request->provider;
        $training->provider_slug = slugify($request->provider);
        $training->location = $request->location;
        $training->start_date = Carbon::parse($request->start_date);
        $training->end_date = Carbon::parse($request->end_date);
        $training->location_during_training = $request->location_during_training;
        $training->completed = $request->completed;
        $training->approved = $request->approved;
        // Save File or Image Here
        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $name = time() . $file->getClientOriginalName();

            $location = 'certificates/' . $name;

            Storage::put($location, file_get_contents($file));

            $training->certificate = $name;
        }

        auth()->user()->trainings()->save($training);

        flash()->success('All Done!!', 'You have added this training successfully.');
        return redirect()->route('trainings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('pages.trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $categories = Category::latest()->get();
        return view('pages.trainings.edit', compact('training', 'categories'));
    }

    public function archived()
    {
        $trainings = Training::where('archived', 1)->latest()->get();
        return view('pages.trainings.archived', compact('trainings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    public function updateCategory(Training $training, Category $category)
    {
        $training->category_id = $category->id;
        $training->archived = true;
        $training->save();

        flash()->success('All Good!!', 'You have updated this training successfully.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
