<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{
    public function Index(Request $request){
        $totalData = CategoryModel::all();
        return view('admin.categories',compact("totalData"));
    }
    public function Add(Request $request){
        $api = new CategoryModel;
        $api->fill($request->all());
        $api->save();
        return back();
    }
    public function delete(Request $request, $id){
        
        $data = CategoryModel::find($id);
        $data->delete();
        return back();
    }
    public function All(Request $request){
        $totalData = CategoryModel::all();
        return view('admin.add-new',compact("totalData"));
    }
}
