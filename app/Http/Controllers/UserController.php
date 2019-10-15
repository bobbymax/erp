<?php

namespace App\Http\Controllers;

use App\User;
use App\Location;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
use Storage;
use Mail;

use App\Mail\NewUser;

class UserController extends Controller
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
        $users = $this->getAllUsers();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::latest()->get();
        return view('pages.users.create', compact('locations'));
    }


    public function details(Request $request)
    {
        if ($request->ajax()) {
            $userId = $request->user;

            $user = User::find($userId);

            if ($user) {
                return response()->json($user);
            }
        }
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
            'email' => 'required|string|max:255|unique:users',
            'staff_no' => 'required|string|max:255|unique:users',
            'location_id' => 'required|integer',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->staff_no = $request->staff_no;
        $user->location_id = $request->location_id;
        $user->room_no = $request->room_no;
        $user->password = Hash::make('Password1');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/avatars/' . $filename);
            Image::make($file)->fit(300, 300)->save($location);

            $user->avatar = $filename;
        }

        if ($user->save()) {
            $group = Group::where('label', 'staff')->first();

            if ($group) {
                $user->actAs($group);
            }
        }

        Mail::to($user->email)->queue(new NewUser($user));

        flash()->success('All Done!!!', 'You created the user successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $groups = Group::latest()->get();
        return view('pages.users.show', compact('groups', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $locations = Location::latest()->get();
        return view('pages.users.edit', compact('locations', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'staff_no' => 'required|string|max:255',
            'location_id' => 'required|integer',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->staff_no = $request->staff_no;
        $user->location_id = $request->location_id;
        $user->room_no = $request->room_no;
        //$user->password = Hash::make('Password1');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = time() . $file->getClientOriginalName();
            $location = public_path('images/avatars/' . $filename);
            Image::make($file)->fit(300, 300)->save($location);

            $user->avatar = $filename;
        }

        $user->save();

        flash()->success('All Done!!!', 'You updated this user successfully.');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash()->success('Done!!', 'User has been deleted successfully.');
        return redirect()->route('users.index');
    }

    protected function getAllUsers()
    {
        return User::latest()->get();
    }
}
