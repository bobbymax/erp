<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
use App\Profile;
use Carbon\Carbon;
use App\GradeLevel;
use Image;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function helpdesk()
    {
        //
    }

    public function staffservices()
    {
        //
    }

    public function placements(Request $request)
    {
        if ($request->ajax()) {
            $select = $request->select;
            $value = $request->value;
            $dependent = $request->dependent;

            if ($value !== null) {
                $query = DB::table('groups')->where('id', $value)->first();

                if ($select === "directorate") {
                    $results = Group::where('parent', $query->id)->get();
                } else {
                    $results = Group::where('relative', $query->id)->where('department', 1)->get();
                }

                $data = view('pages.ajax.placement', compact('results', 'select', 'dependent'))->render();
                return response()->json(['options' => $data]);
            }
        }
    }

    public function account($user)
    {
        $grades = GradeLevel::latest()->get();
        $user = User::where('staff_no', $user)->firstOrFail();
        $groups = Group::latest()->get();
        return view('pages.users.profile', compact('user', 'groups', 'grades'));
    }

    public function viewProfile($user)
    {
        $grades = GradeLevel::latest()->get();
        $user = User::where('staff_no', $user)->firstOrFail();
        $groups = Group::latest()->get();
        return view('pages.users.account', compact('user', 'groups', 'grades'));
    }

    public function assignGroup(Request $request, User $user)
    {
        if ($request->has('groups')) {
            foreach ($request->groups as $value) {
                $group = Group::with('permissions')->findOrFail($value);
                if ($value !== null) {
                    $exist = DB::select(DB::raw("SELECT * FROM user_group WHERE user_id = '{$user->id}' AND group_id = '{$group->id}'"));

                    if (! $exist) {
                        $user->actAs($group);
                    }
                }
            }
        }

        flash()->success('All Done!!', 'You have successfully added this user to the selected groups.');
        return redirect()->route('users.index');
    }

    public function blockGroup(User $user, Group $group)
    {
        $blocked = DB::table('user_group')->where('user_id', $user->id)->where('group_id', $group->id)->get();

        if ($blocked) {
            DB::table('user_group')->where('user_id', $user->id)->where('group_id', $group->id)->delete();
            flash()->success('Success!!', 'You have denied the user this group successfully.');
        } else {
            flash()->error('Success!!', 'Oops!! something went wrong.');
        }

        return back();
    }

    public function updateAccount(Request $request, $user)
    {
        $this->validate($request, [
            'grade_level' => 'required|string|max:6',
            'directorate' => 'required|integer',
            'division' => 'required|integer',
            'date_joined' => 'required',
        ]);

        $user = User::where('staff_no', $user)->firstOrFail();

        if(! $user && $user->id !== auth()->user()->id) {
            flash()->error('Oops!!', 'User was not found, or Wrong session provided.');
            return back();
        }

        if (! is_object($user->profile)) {           
            $profile = new Profile;
        } else {
            $profile = $user->profile;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time() . $file->getClientOriginalName();
            $location = public_path('images/avatars/' . $name);
            Image::make($file)->fit(500, 500)->save($location);
            $user->avatar = $name;

            $user->save();
        }

        $profile->user_id = $user->id;
        $profile->grade_level = $request->grade_level;
        $profile->directorate = $request->directorate;
        $profile->division = $request->division;
        $profile->department = $request->department;
        $profile->date_joined = Carbon::parse($request->date_joined);


        if($profile->save()) {
            $directorate = $profile->directorate;
            $division = $profile->division;
            $department = $profile->department;

            $groups = [$directorate, $division, $department];

            foreach ($groups as $key => $value) {
                if ($value != 0) {

                    $group = Group::with('permissions')->findOrFail($value);
                    $exist = DB::select(DB::raw("SELECT * FROM user_group WHERE user_id = '{$user->id}' AND group_id = '{$group->id}'"));

                    if (! $exist) {
                        $user->actAs($group);
                    }

                }
            }

            flash()->success('Success!!', 'Your records have been updated successfully.');
        }
        
        return redirect()->route('user.dashboard');

    }
}
