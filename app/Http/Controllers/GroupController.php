<?php

namespace App\Http\Controllers;

use App\Group;
use App\Permission;
use DB;
use Illuminate\Http\Request;
use App\Imports\GroupImport;
use Maatwebsite\Excel\Facades\Excel;

class GroupController extends Controller
{
    /**
     * Authentication Middleware
     */
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
        $groups = $this->getGroups();
        return view('pages.groups.index', compact('groups'));
    }

    public function import()
    {
        Excel::import(new GroupImport, public_path("groups.xlsx"));
        flash()->success('All Done!!!', 'Group records created successfully.');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->getGroups();
        return view('pages.groups.create', compact('groups'));
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
            'code' => 'required|string|max:5|unique:groups',
            'parent' => 'required',
            'relative' => 'required',
            'directorate' => 'required',
            'division' => 'required',
            'department' => 'required',
            'designation' => 'required',
        ]);

        Group::create([
            'name' => $request->name,
            'label' => slugify($request->name),
            'code' => $request->code,
            'top_level' => $request->top_level,
            'parent' => $request->parent,
            'relative' => $request->relative,
            'directorate'  => $request->directorate,
            'division'  => $request->division,
            'department'  => $request->department,
            'designation' => $request->designation,
        ]);

        flash()->success('All Done!!', 'You have created a group successfully.');
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $permissions = Permission::latest()->get();
        return view('pages.groups.show', compact('group', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        $groups = $this->getGroups();
        return view('pages.groups.edit', compact('group', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:5',
            'parent' => 'required',
            'relative' => 'required',
            'directorate' => 'required',
            'division' => 'required',
            'department' => 'required',
            'designation' => 'required',
        ]);

        $group->name = $request->name;
        $group->label = slugify($request->name);
        $group->code = $request->code;
        $group->top_level = $request->top_level;
        $group->parent = $request->parent;
        $group->relative = $request->relative;
        $group->directorate = $request->directorate;
        $group->division = $request->division;
        $group->department = $request->department;
        $group->designation = $request->designation;


        $group->save();

        flash()->success('Well Done!!', 'You have updated the group successfully.');
        return redirect()->route('groups.index');
    }

    public function addPermissions(Request $request, Group $group)
    {
        if ($request->permissions !== null) {
            foreach ($request->permissions as $value) {
                $permission = Permission::with('groups')->findOrFail($value);
                if ($value !== null) {
                    $exist = DB::select(DB::raw("SELECT * FROM group_permission WHERE group_id = '{$group->id}' AND permission_id = '{$permission->id}'"));

                    if (! $exist) {
                        $group->givePermissionTo($permission);
                    }
                }
            }
        }

        flash()->success('All Done!!', 'You have added permissions to this group.');
        return redirect()->route('groups.index');
    }

    public function denyPermission(Group $group, Permission $permission)
    {
        $permit = DB::table('group_permission')->where('group_id', $group->id)->where('permission_id', $permission->id)->get();

        if ($permit) {
            DB::table('group_permission')->where('group_id', $group->id)->where('permission_id', $permission->id)->delete();
            flash()->success('Success!!', 'You have removed this permission successfully.');
        } else {
            flash()->error('Success!!', 'Oops!! something went wrong.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        flash()->success('Success!!', 'You have deleted the group successfully.');
        return redirect()->route('groups.index');
    }

    protected function getGroups()
    {
        return Group::latest()->get();
    }
}
