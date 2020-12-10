<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FirstNavBarModel;

class FirstNavBarController extends Controller
{
    public function Index(Request $request){
        $totalData = FirstNavBarModel::all();
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
}
