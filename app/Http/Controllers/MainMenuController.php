<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainMenuModel;
use App\Models\TrashModel;

class MainMenuController extends Controller
{
    public function Index(Request $request){
        $totalData = MainMenuModel::orderBy('id','desc')->where('trash',0)->get();
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
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Navbar Menus")->first();
        $Trash->delete();
        
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
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = MainMenuModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "navMenu";
        $Trash->category = "Navbar Menus";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->menu;
        $Trash->save();
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = MainMenuModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Navbar Menus")->first();
        $Trash->delete();
        return back();
    }
    
}
