<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrategiesModel;

class StrategiesController extends Controller
{
    public function ViewAll(Request $request){
        $title = "Strategies";
        $Strategies = StrategiesModel::orderBy('id','desc')->where('status',0)->get();
        return view('strategies.viewAll',compact('Strategies','title'));
    }
    public function StrategyDetail(Request $request, $id){
        $url = str_replace("-"," ",$id);
        $Strategy = StrategiesModel::where('title',$url)->first();

        $title = $Strategy->title;
        return view('strategies.viewDetail',compact('Strategy','title'));
    }

    // Admin Panel

    public function Index(Request $request){
        $Strategies = StrategiesModel::orderBy('id','desc')->get();
        return view('admin.strategies.index',compact('Strategies'));
    }
    public function Add(Request $request){
        return view('admin.strategies.add');
    }
    public function AddStrategy(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $image = $path;
        }
        $data['image'] = $image;
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = new StrategiesModel;
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $strategy = StrategiesModel::find($id);
        return view('admin.strategies.add',compact("strategy"));
    }
    public function EditStrategy(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $image = $path;
            $data['image'] = $image;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = StrategiesModel::find($id);
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = StrategiesModel::find($id);
        $brokerNews->status = 1;
        $brokerNews->save();
        return back();
    }
    public function Active(Request $request, $id){
        $brokerNews = StrategiesModel::find($id);
        $brokerNews->status = 0;
        $brokerNews->save();
        return back();
    }
}
