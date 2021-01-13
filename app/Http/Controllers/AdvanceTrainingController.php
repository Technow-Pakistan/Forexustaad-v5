<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceTrainingModel;


class AdvanceTrainingController extends Controller
{

    // Admin Panel

    public function Index(Request $request){
        $Strategies = AdvanceTrainingModel::orderBy('id','desc')->get();
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
        $news = new AdvanceTrainingModel;
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $strategy = AdvanceTrainingModel::find($id);
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
        $news = AdvanceTrainingModel::find($id);
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Delete(Request $request, $id){
        $brokerNews = AdvanceTrainingModel::find($id);
        $brokerNews->status = 1;
        $brokerNews->save();
        return back();
    }
    public function Active(Request $request, $id){
        $brokerNews = AdvanceTrainingModel::find($id);
        $brokerNews->status = 0;
        $brokerNews->save();
        return back();
    }
}
