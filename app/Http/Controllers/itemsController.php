<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Menu;
class itemsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(10);
        $menus = Menu::all();
        return view('items.items', compact('items'), compact('menus'));
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
            $input['image'] = $this->uploade($input['image']);
        }else{
            $input['image'] = "images/menus/default.jpg";
        }
        $input['user_id'] = \Auth::user()->id;

        Item::create($input);
        return redirect()->back();

    }

    public function uploade($file){

        $extention = $file->getClientOriginalExtension();
        $shafilename = sha1($file->getClientOriginalName());
        $filename = date('Y-M-D-h-i-s').".".$shafilename.".".$extention;
        $path = public_path('images/items/');
        $file->move($path, $filename);
        return 'images/items/'.$filename;
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
        $item = Item::find($id);
        $menus = Menu::get(['title','id']);
        return view('items.edit', compact('item'), compact('menus'));
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
        $input = $request->all();
        if(isset($input['image'])){
            $input['image'] = $this->uploade($input['image']);
        }
        Item::find($id)->update($input);
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::find($id)->delete();
        return redirect()->back();
    }
}
