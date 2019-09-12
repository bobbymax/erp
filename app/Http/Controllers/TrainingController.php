<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;

use App\Training;
use App\Proposed;
use App\Category;
use App\Group;
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
        $users = User::latest()->get();
        $categories = Category::latest()->get();
        return view('pages.trainings.trainings', compact('categories', 'users'));
    }

    public function userTrainings($user)
    {
        $user = User::where('staff_no', $user)->firstOrFail();
        $categories = Category::latest()->get();
        return view('pages.trainings.bulk-edit', compact('user', 'categories'));
    }

    public function getUserTrainings(Request $request)
    {
        if ($request->ajax()) {
            $staff = $request->user;

            $user = User::where('staff_no', $staff)->firstOrFail();
            $categories = Category::latest()->get();

            if ($user) {
                $data = view('pages.ajax.user-trainings', compact('user', 'categories'))->render();
            }

            return response()->json($data);
        }
    }

    public function proposed()
    {
        $trainings = Training::where('completed', 0)->latest()->get();
        return view('pages.trainings.proposed', compact('trainings'));
    }

    public function hrPropose($staff)
    {
        $user = User::where('staff_no', $staff)->firstOrFail();
        $categories = Category::latest()->get();
        return view('pages.trainings.hr-proposed', compact('user', 'categories'));
    }

    /**
     * Returns all trainings for the department
     * awaiting approval
     * 
     * @return [trainings] [a collection of staff trainings]
     */
    public function approveTrainingsByManager()
    {
        $group = auth()->user()->groups()->where('division', 1)->first();
        // $groups = Group::where('division', true)->get();
        $trainings = Training::where('status', 'pending')->get();
        return view('pages.trainings.manager-approval', compact('trainings', 'group'));
    }

    public function approveTrainingsByHr()
    {
        $trainings = Training::where('status', '!=', 'pending')->where('completed', 0)->get();
        return view('pages.trainings.hr-approval', compact('trainings'));
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
    public function store(TrainingRequest $request)
    {

        $training = new Training;

        $training->title = $request->title;
        $training->label = slugify($request->title);
        $training->provider = $request->provider;
        $training->provider_slug = slugify($request->provider);
        $training->location = $request->location;
        $training->start_date = Carbon::parse($request->start_date);
        $training->end_date = Carbon::parse($request->end_date);
        $training->amount = $request->amount === null ? 0 : $request->amount;
        $training->location_during_training = $request->location_during_training;
        $training->completed = $request->formType === "archived" ? 1 : 0;
        $training->archived = $request->formType === "archived" ? 1 : 0;
        $training->status = $request->formType === "archived" ? "approved" : "pending";
        // Save File or Image Here
        if ($request->hasFile('certificate')) {
            $file = $request->file('certificate');
            $name = time() . $file->getClientOriginalName();

            $location = 'certificates/' . $name;

            Storage::put($location, file_get_contents($file));

            $training->certificate = $name;
        }

        if ($request->formType === "hr_proposal") {
            $training->user_id = $request->user_id;
            $training->category_id = $request->category_id;
            $training->save();
        } else {
            auth()->user()->trainings()->save($training);
        }


        if ($request->formType !== "archived") {
            $proposed = new Proposed;

            $proposed->training_id = $training->id;
            if ($request->formType === "hr_proposal") {
                $proposed->author = auth()->user()->id;
            }
            $proposed->save();
        }

        flash()->success('All Done!!', 'You have added this training successfully.');
        return redirect()->route($request->formType === "archived" ? 'trainings.index' : 'propose.trainings');
    }

    /**
     * This is a function to find staff for HR
     * to propose a training
     * 
     * @param  Request $request [description]
     * @return [user]           [get user data]
     */
    public function findStaff(Request $request)
    {
        $this->validate($request, [
            'staff' => 'required',
        ]);

        $staff = $request->staff;

        if (is_numeric($staff)) {
            $user = User::where('staff_no', $staff)->firstOrFail();
        } else {
            $user = User::where('email', $staff)->firstOrFail();
        }

        if ($user) {
            flash()->success('Done!!', 'Propose training for staff.');
            return redirect()->route('hr.propose.training', [$user->staff_no]);
        } else {
            flash()->error('Oops!!!', 'User not found in our system.');
            return redirect()->back();
        }

        


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

    /**
     * Approve or decline proposed training for staff
     * 
     * @param  Request  $request
     * @param  Training $training [description]
     * @return an instance of training $training
     */
    public function approveOrDeclineTrainingRequest(Request $request, Training $training)
    {
        $this->validate($request, [
            'status' => 'required',
            'comment' => 'required',
        ]);

        $training->proposed->approved = $request->status;
        $training->proposed->comment = $request->comment;

        if ($training->proposed->save()) {
            $training->status = $training->proposed->approved == 1 ? 'manager approved' : 'manager denied';
            $training->save();
        }

        flash()->success('All Done!!', 'You have acted on this request.');
        return back();
    }

    public function decision(Training $training, $value) 
    {
        $training->status = $value;
        $training->save();

        if ($value == "approved") {
            $training->proposed->hr_approved = 1;
            $training->proposed->author = auth()->user()->id;
            $training->proposed->save();

            flash()->success('Approved!!', 'You have approved this training successfully.');
        } else {
            $training->proposed->author = auth()->user()->id;
            $training->proposed->save();

            flash()->info('Declined!!', 'The proposed training has been declined.');
        }

        return back();


    }

    public function updateCategory(Request $request)
    {


        if ($request->ajax()) {
            $training_id = $request->training;
            $category_id = $request->category;

            $training = Training::find($training_id);
            $category = Category::find($category_id);

            if ($training) {
                $training->category_id = $category->id;
                $training->archived = true;
                $training->save();
            }

            return response()->json(['data' => 'You have updated this recorded successfully.', 'status' => 'success']);
        }

        //flash()->success('All Good!!', 'You have updated this training successfully.');
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
