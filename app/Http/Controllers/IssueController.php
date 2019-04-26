<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Category;
use Illuminate\Http\Request;

class IssueController extends Controller
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
        $issues = $this->getIssues();
        return view('pages.issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('pages.issues.create', compact('categories'));
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
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'requests' => 'required',
        ]);

        Issue::create([
            'name' => $request->name,
            'label' => slugify($request->name),
            'category_id' => $request->category_id,
            'requests' => json_encode($request->requests),
        ]);

        flash()->success('Success!!', 'You have successfully added a new record.');
        return redirect()->route('issues.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('pages.issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $categories = Category::latest()->get();
        return view('pages.issues.edit', compact('categories', 'issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'requests' => 'required',
        ]);

        $issue->name = $request->name;
        $issue->label = slugify($request->name);
        $issue->category_id = $request->category_id;
        $issue->requests = json_encode($request->requests);

        $issue->save();

        flash()->success('Success!!', 'You have successfully updated this record.');
        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        flash()->success('Success!!', 'You have successfully deleted this record.');
        return redirect()->route('issues.index');
    }

    protected function getIssues()
    {
        return Issue::latest()->get();
    }
}
