<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvanceTrainingModel;
use App\Models\BasicTrainingModel;
use App\Models\HabbitTrainingModel;
use App\Models\AdvanceCommentsModel;
use App\Models\BasicCommentsModel;
use App\Models\HabbitCommentsModel;
use App\Models\ClientNotificationModel;
use App\Models\PusherModel;
use App\Models\MetaTagsModel;


class AdvanceTrainingController extends Controller
{
    public function ViewAll (Request $request, $id1, $id){
        if ($id1 == "Advance"){
            $meta = MetaTagsModel::where('name_page','Advance-Training')->first();
            if ($request->session()->has('client')) {
                $category = "Advance";
                if($id == "all"){
                    $lecture = AdvanceTrainingModel::orderBy('poistion','asc')->first();
                }else{
                    $title = str_replace('-',' ',$id);
                    $lecture = AdvanceTrainingModel::where('title',$title)->first();
                    if ($lecture->vipMember == 1) {
                        $clientData = $request->session()->get('client');
                        if ($clientData->memberType == 1) {
                            $error = "This Advance Training is for Vip Members.";
                            $request->session()->put("error",$error);
                            return redirect('/');
                        }
                    }
                }
                if($lecture){
                    $nextLecture = AdvanceTrainingModel::orderBy('id','asc')->where('poistion', '>' , $lecture->poistion)->first();
                    $lastLecture = AdvanceTrainingModel::orderBy('id','desc')->where('poistion', '<' , $lecture->poistion)->first();
                    $comments = AdvanceCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
                    $clientInformation = $request->session()->get('client');
                    $userId = $clientInformation["id"];
                    if ($lastLecture) {
                        $commentAllow = AdvanceCommentsModel::where('memberId', $userId)->where('lectureId',$lastLecture->id)->first();
                    }else {
                        $commentAllow = null;
                    }
                    $Lectures = AdvanceTrainingModel::orderBy('poistion','asc')->get();
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
            return view('training.advance.advance',compact('Lectures','lecture','lastLecture','nextLecture','category','comments','commentAllow','meta'));
        }elseif ($id1 == "Basic"){
            $meta = MetaTagsModel::where('name_page','Basic-Training')->first();
            $category = "Basic";
            if($id == "all"){
                $lecture = BasicTrainingModel::orderBy('poistion','asc')->first();
            }else{
                $title = str_replace('-',' ',$id);
                $lecture = BasicTrainingModel::where('title',$title)->first();
            }
            if($lecture){
                $nextId = $lecture->poistion + 1;
                $nextLecture = BasicTrainingModel::where('poistion',$nextId)->first();
                $lastId = $lecture->poistion - 1;
                $lastLecture = BasicTrainingModel::where('poistion',$lastId)->first();
                $Lectures = BasicTrainingModel::orderBy('poistion','asc')->get();
                $comments = BasicCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
            }else{
                $error = "This Lecture is not exist";
                $request->session()->put("error",$error);
                return redirect('/');
            }
        }else{
            $meta = MetaTagsModel::where('name_page','Habbit-Training')->first();
            $category = "Habbit";
            if($id == "all"){
                $lecture = HabbitTrainingModel::orderBy('poistion','asc')->first();
            }else{
                $title = str_replace('-',' ',$id);
                $lecture = HabbitTrainingModel::where('title',$title)->first();
            }
            if($lecture){
                $nextId = $lecture->poistion + 1;
                $nextLecture = HabbitTrainingModel::where('poistion',$nextId)->first();
                $lastId = $lecture->poistion - 1;
                $lastLecture = HabbitTrainingModel::where('poistion',$lastId)->first();
                $Lectures = HabbitTrainingModel::all();
                $comments = HabbitCommentsModel::orderBy('id','desc')->where('lectureId', $lecture->id)->get();
            }else{
                $error = "This Lecture is not exist";
                $request->session()->put("error",$error);
                return redirect('/');
            }
        }
        return view('training.advance.advance',compact('Lectures','lecture','lastLecture','nextLecture','category','comments','meta'));
    }

    // Admin Panel

    public function Order(Request $request){
        $count = count($request->poistion);
        $num = 1;
        for ($i=0; $i <$count ; $i++) {
            if ($request->category == "advance") {
                $lecture = AdvanceTrainingModel::where('id',$request->poistion[$i])->first();
            }elseif ($request->category == "habbit") {
                $lecture = HabbitTrainingModel::where('id',$request->poistion[$i])->first();
            }else {
                $lecture = BasicTrainingModel::where('id',$request->poistion[$i])->first();
            }
            $lecture->poistion = $num;
            $lecture->save();
            $num++;
        }
        $success = "Order of Training has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
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
            $poistion = AdvanceTrainingModel::orderBy('poistion','desc')->first();
            $clientNotilectureCategory = "Advance";
        }elseif ($request->lectureCategory == "basic"){
            $lecture = new BasicTrainingModel;
            $poistion = BasicTrainingModel::orderBy('poistion','desc')->first();
            $clientNotilectureCategory = "Basic";
        }else{
            $lecture = new HabbitTrainingModel;
            $poistion = HabbitTrainingModel::orderBy('poistion','desc')->first();
            $clientNotilectureCategory = "Habbit";
        }
        if ($request->file("thumbnail") != null) {
            $path = $request->file("thumbnail")->store("WebImages");
            $Image = $path;
            $data['thumbnail'] = $Image;
        }
        $data['poistion'] = ++$poistion->poistion;
        $lecture->fill($data);
        $lecture->save();
        $success = "Lecture has been save successfully.";
        $request->session()->put("success",$success);

        // Pusher Notification Start
        $url = str_replace(" ", "-",$lecture->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Added a New $clientNotilectureCategory Training.";
        $messageData['link'] = "training" . "/" . $clientNotilectureCategory . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

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
            $clientNotilectureCategory = "Advance";
        }elseif ($id1 == "basic"){
            $lecture = BasicTrainingModel::find($id);
            $clientNotilectureCategory = "Basic";
        }else{
            $lecture = HabbitTrainingModel::find($id);
            $clientNotilectureCategory = "Habbit";
        }
        if ($request->file("thumbnail") != null) {
            $path = $request->file("thumbnail")->store("WebImages");
            $Image = $path;
            $data['thumbnail'] = $Image;
        }
        $lecture->fill($data);
        $lecture->save();
        $success = "Lecture has been Updated successfully.";
        $request->session()->put("success",$success);
        // Pusher Notification Start
        $url = str_replace(" ", "-",$lecture->title);
        $adminData = $request->session()->get("admin");
        $messageData['userId'] = $adminData['id'];
        $messageData['userType'] = 0;
        $messageData['message'] = "Edit a $clientNotilectureCategory Training.";
        $messageData['link'] = "training" . "/" . $clientNotilectureCategory . "/" . $url;
        $clientNotification = new ClientNotificationModel;
        $clientNotification->fill($messageData);
        $clientNotification->save();
        $messageData['id'] = $clientNotification->id;
        PusherModel::BoardCast("firstChannel1","firstEvent1",["message" => $messageData]);
        // Pusher Notification End

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
        $error = "Lecture has been deactive successfully.";
        $request->session()->put("error",$error);
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
        $success = "Lecture has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function ViewComment1(Request $request,$id){
        $comments = BasicCommentsModel::where('lectureId',$id)->get();
        $category = 1;
        return view('admin.comment.ViewLectureComment',compact('comments','category'));
    }
    public function ViewComment2(Request $request,$id){
        $comments = AdvanceCommentsModel::where('lectureId',$id)->get();
        $category = 2;
        return view('admin.comment.ViewLectureComment',compact('comments','category'));
    }
    public function ViewComment3(Request $request,$id){
        $comments = HabbitCommentsModel::where('lectureId',$id)->get();
        $category = 3;
        return view('admin.comment.ViewLectureComment',compact('comments','category'));
    }
    public function SaveViewCommentReply(Request $request){
        if($request->category == 1){
            $reply = new BasicCommentsModel;
        }elseif($request->category == 2){
            $reply = new AdvanceCommentsModel;
        }elseif($request->category == 3){
            $reply = new HabbitCommentsModel;
        }
        $reply->fill($request->all());
        $reply->save();
        $success = "Your reply has been saved successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
