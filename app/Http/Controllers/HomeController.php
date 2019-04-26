<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Group;
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
}
