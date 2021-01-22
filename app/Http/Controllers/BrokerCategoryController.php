<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BrokerCategoryModel;

class BrokerCategoryController extends Controller
{
    public function Index(Request $request){
        $totalCategory = BrokerCategoryModel::all();
        return view('admin.broker.allCategory',compact('totalCategory'));
    }
    public function AddCategoryProcess(Request $request){
        $category = new BrokerCategoryModel;
        $category->fill($request->all());
        $category->save();
        return back();
    }
    public function EditCategoryProcess(Request $request, $id){
        $category = BrokerCategoryModel::find($id);
        $category->fill($request->all());
        $category->save();
        return back();
    }
    public function Category(Request $request){
        $totalData = BrokerCategoryModel::all();
        return view('admin.broker.category',compact('totalData'));
    }
    public function DeleteCategoryProcess(Request $request, $id){
        $category = BrokerCategoryModel::find($id);
        $category->active = 1;
        $category->save();
        return back();
    }
    public function ActiveCategoryProcess(Request $request, $id){
        $category = BrokerCategoryModel::find($id);
        $category->active = 0;
        $category->save();
        return back();
    }
}
