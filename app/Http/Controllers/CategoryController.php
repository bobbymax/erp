<?php

namespace App\Http\Controllers;

use App\Category;
use App\Module;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = $this->getCategories();
        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::latest()->get();
        return view('pages.categories.create', compact('modules'));
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
            'module_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        Category::create([
            'module_id' => $request->module_id,
            'name' => $request->name,
            'label' => slugify($request->name),
            'icon' => $request->icon,
        ]);

        flash()->success('Well Done!!', 'You have created this category successfully.');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('pages.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $modules = Module::latest()->get();
        return view('pages.categories.edit', compact('modules', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'module_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $category->module_id = $request->module_id;
        $category->name = $request->name;
        $category->label = slugify($request->name);
        $category->icon = $request->icon;
        $category->save();

        flash()->success('Well Done!!', 'You have updated this category successfully.');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        flash()->success('Well Done!!', 'You have deleted this category successfully.');
        return redirect()->route('categories.index');
    }

    protected function getCategories()
    {
        return Category::latest()->get();
    }
}
