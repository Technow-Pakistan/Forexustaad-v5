<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceTrainingModel;
use App\Models\BasicTrainingModel;
use App\Models\HabbitTrainingModel;
use App\Models\AdvanceCommentsModel;
use App\Models\BasicCommentsModel;
use App\Models\HabbitCommentsModel;


class AdvanceTrainingController extends Controller
{

    public function ViewVipAll  (Request $request, $id){
            $clientInformation = $request->session()->get('client');
            $userId = $clientInformation["memberType"];
            if ($userId != 1) {
                $category = "Advance";
                if($id == "all"){
                    $lecture = AdvanceTrainingModel::orderBy('id','asc')->where('vipMember',1)->first();
                }else{
                    $title = str_replace('-',' ',$id);
                    $lecture = AdvanceTrainingModel::where('title',$title)->where('vipMember',1)->first();
                }
                if($lecture){
                    $Lecture1Done = AdvanceTrainingModel::where('vipMember',1)->first();
                    $nextId = $lecture->id + 1;
                    $nextLecture = AdvanceTrainingModel::where('id',$nextId)->where('vipMember',1)->first();
                    $lastId = $lecture->id - 1;
                    $lastLecture = AdvanceTrainingModel::where('id',$lastId)->where('vipMember',1)->first();
                    $Lectures = AdvanceTrainingModel::where('vipMember',1)->get();
                    $comments = AdvanceCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
                    $clientInformation = $request->session()->get('client');
                    $userId = $clientInformation["id"];
                    $commentAllow = AdvanceCommentsModel::where('memberId', $userId)->where('lectureId',$lastId)->first();
                    return view('training.advance.vipAdvance',compact('Lectures','lecture','lastLecture','nextLecture','category','comments','commentAllow','Lecture1Done'));
                }else{
                    $error = "This Lecture is not exist";
                    $request->session()->put("error",$error);
                    return redirect('/');
                }
            }else {
                $error = "This Advance Training is for Vip Members.";
                $request->session()->put("error",$error);
                return back();
            }
    }

    public function ViewAll (Request $request, $id1, $id){
        if ($id1 == "Advance"){
            if ($request->session()->has('client')) {
                $category = "Advance";
                if($id == "all"){
                    $lecture = AdvanceTrainingModel::orderBy('id','asc')->where('vipMember',0)->first();
                }else{
                    $title = str_replace('-',' ',$id);
                    $lecture = AdvanceTrainingModel::where('title',$title)->where('vipMember',0)->first();
                }
                if($lecture){
                    $nextId = $lecture->id + 1;
                    $nextLecture = AdvanceTrainingModel::where('id',$nextId)->where('vipMember',0)->first();
                    $lastId = $lecture->id - 1;
                    $lastLecture = AdvanceTrainingModel::where('id',$lastId)->where('vipMember',0)->first();
                    $comments = AdvanceCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
                    $clientInformation = $request->session()->get('client');
                    $userId = $clientInformation["id"];
                    $commentAllow = AdvanceCommentsModel::where('memberId', $userId)->where('lectureId',$lastId)->first();
                    $Lectures = AdvanceTrainingModel::where('vipMember',0)->get();
                }else{
                    $error = "This Lecture is not exist";
                    $request->session()->put("error",$error);
                    return redirect('/');
                }
            }else {
                $error = "Please! Login first to view this Advance Training.";
                $request->session()->put("error",$error);
                return redirect('/');
            }
            return view('training.advance.advance',compact('Lectures','lecture','lastLecture','nextLecture','category','comments','commentAllow'));
        }elseif ($id1 == "Basic"){
            $category = "Basic";
            if($id == "all"){
                $lecture = BasicTrainingModel::orderBy('id','asc')->first();
            }else{
                $title = str_replace('-',' ',$id);
                $lecture = BasicTrainingModel::where('title',$title)->first();
            }
            if($lecture){
                $nextId = $lecture->id + 1;
                $nextLecture = BasicTrainingModel::where('id',$nextId)->first();
                $lastId = $lecture->id - 1;
                $lastLecture = BasicTrainingModel::where('id',$lastId)->first();
                $Lectures = BasicTrainingModel::all();
                $comments = BasicCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
            }else{
                $error = "This Lecture is not exist";
                $request->session()->put("error",$error);
                return redirect('/');
            }
        }else{
            $category = "Habbit";
            if($id == "all"){
                $lecture = HabbitTrainingModel::orderBy('id','asc')->first();
            }else{
                $title = str_replace('-',' ',$id);
                $lecture = HabbitTrainingModel::where('title',$title)->first();
            }
            if($lecture){
                $nextId = $lecture->id + 1;
                $nextLecture = HabbitTrainingModel::where('id',$nextId)->first();
                $lastId = $lecture->id - 1;
                $lastLecture = HabbitTrainingModel::where('id',$lastId)->first();
                $Lectures = HabbitTrainingModel::all();
                $comments = HabbitCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
            }else{
                $error = "This Lecture is not exist";
                $request->session()->put("error",$error);
                return redirect('/');
            }
        }
        return view('training.advance.advance',compact('Lectures','lecture','lastLecture','nextLecture','category','comments'));
    }

    // Admin Panel

    public function Index(Request $request){
        if (isset($request->fliter) && $request->fliter == "advance") {
            $category = $request->fliter;
            $Lectures = AdvanceTrainingModel::orderBy('id','desc')->get();
        }elseif (isset($request->fliter) && $request->fliter == "habbit") {
            $category = $request->fliter;
            $Lectures = HabbitTrainingModel::orderBy('id','desc')->get();
        }else {
            $category = "basic";
            $Lectures = BasicTrainingModel::orderBy('id','desc')->get();
        }
        return view('admin.training.advance.index',compact('Lectures','category'));
    }
    public function Add(Request $request){
        $category = " none";
        return view('admin.training.advance.add',compact("category"));
    }
    public function AddLecture(Request $request){
        $data = $request->all();
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        if ($request->lectureCategory == "advance"){
            $lecture = new AdvanceTrainingModel;
        }elseif ($request->lectureCategory == "basic"){
            $lecture = new BasicTrainingModel;
        }else{
            $lecture = new HabbitTrainingModel;
        }
        $lecture->fill($data);
        $lecture->save();
        return back();
    }
    public function Edit(Request $request, $id1 , $id){
        if ($id1 == "advance"){
            $lecture = AdvanceTrainingModel::find($id);
        }elseif ($id1 == "basic"){
            $lecture = BasicTrainingModel::find($id);
        }else{
            $lecture = HabbitTrainingModel::find($id);
        }
        $category = $id1;
        return view('admin.training.advance.add',compact("lecture",'category'));
    }
    public function EditLecture(Request $request, $id1, $id){
        $data = $request->all();
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        if ($id1 == "advance"){
            $lecture = AdvanceTrainingModel::find($id);
        }elseif ($id1 == "basic"){
            $lecture = BasicTrainingModel::find($id);
        }else{
            $lecture = HabbitTrainingModel::find($id);
        }
        $lecture->fill($data);
        $lecture->save();
        return back();
    }
    public function Delete(Request $request, $id1, $id){
        if ($id1 == "advance"){
            $lecture = AdvanceTrainingModel::find($id);
        }elseif ($id1 == "basic"){
            $lecture = BasicTrainingModel::find($id);
        }else{
            $lecture = HabbitTrainingModel::find($id);
        }
        $lecture->status = 1;
        $lecture->save();
        return back();
    }
    public function Active(Request $request, $id1, $id){
        if ($id1 == "advance"){
            $lecture = AdvanceTrainingModel::find($id);
        }elseif ($id1 == "basic"){
            $lecture = BasicTrainingModel::find($id);
        }else{
            $lecture = HabbitTrainingModel::find($id);
        }
        $lecture->status = 0;
        $lecture->save();
        return back();
    }
}
