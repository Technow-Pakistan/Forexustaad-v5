<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceTrainingModel;


class AdvanceTrainingController extends Controller
{

    public function ViewAll (Request $request, $id){
        if($id == "all"){
            $lecture = AdvanceTrainingModel::orderBy('id','asc')->first();
        }else{
            $title = str_replace('-',' ',$id);
            $lecture = AdvanceTrainingModel::where('title',$title)->first();
        }
        $nextId = $lecture->id + 1;
        $nextLecture = AdvanceTrainingModel::where('id',$nextId)->first();
        $lastId = $lecture->id - 1;
        $lastLecture = AdvanceTrainingModel::where('id',$lastId)->first();
        $Lectures = AdvanceTrainingModel::all();
        return view('training.advance.advance',compact('Lectures','lecture','lastLecture','nextLecture'));
    }

    // Admin Panel

    public function Index(Request $request){
        $Lectures = AdvanceTrainingModel::orderBy('id','desc')->get();
        return view('admin.training.advance.index',compact('Lectures'));
    }
    public function Add(Request $request){
        return view('admin.training.advance.add');
    }
    public function AddLecture(Request $request){
        $data = $request->all();
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $news = new AdvanceTrainingModel;
        $news->fill($data);
        $news->save();
        return back();
    }
    public function Edit(Request $request, $id){
        $lecture = AdvanceTrainingModel::find($id);
        return view('admin.training.advance.add',compact("lecture"));
    }
    public function EditLecture(Request $request, $id){
        $data = $request->all();
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
