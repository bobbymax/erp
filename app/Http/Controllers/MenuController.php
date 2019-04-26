<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Module;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menus = $this->getMenus();
        return view('pages.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::latest()->get();
        return view('pages.menus.create', compact('modules'));
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
            'module_id' => 'required|integer',
            'permission' => 'required|string|max:255',
            'route' => 'required|string|max:255',
        ]);

        Menu::create([
            'name' => $request->name,
            'module_id' => $request->module_id,
            'label' => slugify($request->name),
            'icon' => $request->icon,
            'permission' => $request->permission,
            'route' => $request->route,
        ]);

        flash()->success('All Done!!', 'You have successfully create a menu.');
        return redirect()->route('menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('pages.menus.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $modules = Module::latest()->get();
        return view('pages.menus.edit', compact('modules', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'module_id' => 'required|integer',
            'permission' => 'required|string|max:255',
            'route' => 'required|string|max:255',
        ]);

        $menu->name = $request->name;
        $menu->module_id = $request->module_id;
        $menu->label = slugify($request->name);
        $menu->icon = $request->icon;
        $menu->permission = $request->permission;
        $menu->route = $request->route;

        $menu->save();

        flash()->success('All Done!!', 'You have successfully updated this menu.');
        return redirect()->route('menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        flash()->success('All Done!!', 'You have successfully deleted this menu.');
        return redirect()->route('menus.index');
    }

    protected function getMenus()
    {
        return Menu::latest()->get();
    }
}
