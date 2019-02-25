<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class menuController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('Menus.menus', compact('menus'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if(isset($input['image'])){
         $input['image'] = $this->uplode($input['image']);

        }else{
            $input['image'] = "images/menus/default.jpg";
        }
        $input['user_id'] = \Auth::user()->id;
        Menu::create($input);
        return redirect()->back();
    }

    public function uplode($file){
        $extension = $file->getClientOriginalExtension();
        $shafilename = sha1($file->getClientOriginalName());
        $filename = date('Y-M-D-h-i-s').".".$shafilename.".".$extension;
        $path = public_path('images/menus/');
        $file->move($path, $filename);
        return "images/menus/".$filename;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('Menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $menu = $request->all();
        if(isset($menu['image'])){
            $menu['image'] = $this->uplode($menu['image']);
        }
        Menu::find($id)->update($menu);
        return redirect('/menus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::find($id)->delete();
        return redirect()->back();
    }
}
