<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use App\Group;
use App\Menu as ListMenu;

class MenuController extends Controller
{
    private $icons;
    private $groups;

    public function __construct()
    {
         $this->icons = collect([
             ['class'=>'mobile'],
             ['class'=>'home'],
             ['class'=>'dashboard'],
             ['class'=>'calendar'],
             ['class'=>'circle-o'],
             ['class'=>'info-circle'],
             ['class'=>'bell'],
             ['class'=>'bolt'],
             ['class'=>'briefcase'],
             ['class'=>'cube'],
             ['class'=>'desktop'],
             ['class'=>'hand-o-right'],
	 ]);
	 $this->groups = Group::all();
         return $this->middleware('management');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$menus = ListMenu::all();
        return render('menu.index')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return render('menu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return render('menu.edit')->with(compact('menu'))
		                  ->with('groups',$this->groups)
      	                          ->with('icons',$this->icons);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
