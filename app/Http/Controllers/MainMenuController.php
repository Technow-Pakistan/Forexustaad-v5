<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenuModel;

class MainMenuController extends Controller
{
    public function Index(Request $request){
        $totalData = MainMenuModel::all();
        return view('admin.mainMenus',compact('totalData'));
    }
    public function create(Request $request){
        $data = new MainMenuModel;
        $data->menu = $request->menu;
        $data->link = $request->link;
        $data->save();
        $totalData = MainMenuModel::all();
        return view('admin.mainMenus',compact('totalData'));
    }
    public function delete(Request $request, $id){
        
        $data = MainMenuModel::find($id);
        $data->delete();
        return back();
    }
    public function edit(Request $request, $id){
      
        $data = MainMenuModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    
}
