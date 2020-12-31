<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstNavBarModel;
use App\Models\TrashModel;

class FirstNavBarController extends Controller
{
    public function Index(Request $request){
        $totalData = FirstNavBarModel::orderBy('id','desc')->where('trash',0)->get();
        return view('admin.firstNav',compact('totalData'));
    }
    public function create(Request $request){
        $data = new FirstNavBarModel;
        $data->iconName = $request->iconName;
        $data->link = $request->link;
        $data->save();
        $totalData = FirstNavBarModel::all();
        return view('admin.firstNav',compact('totalData'));
    }
    public function delete(Request $request, $id){
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Navbar Icons")->first();
        $Trash->delete();
        
        $data = FirstNavBarModel::find($id);
        $data->delete();
        return back();
    }
    public function edit(Request $request, $id){
        $data = FirstNavBarModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function Trash(Request $request, $id){
        $user = $request->session()->get("admin");
        $data = FirstNavBarModel::find($id);
        $data->trash = 1;
        $data->save();
        $Trash = new TrashModel;
        $Trash->adminTableId = $user->id;
        $Trash->trashItem = "firstNav";
        $Trash->category = "Navbar Icons";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $data->iconName;
        $Trash->save();
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $data = FirstNavBarModel::find($id);
        $data->trash = 0;
        $data->save();
        $Trash = TrashModel::where('deleteId',$id)->where('category',"Navbar Icons")->first();
        $Trash->delete();
        return back();
    }
}
