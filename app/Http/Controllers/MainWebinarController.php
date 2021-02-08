<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainWebinarModel;

class MainWebinarController extends Controller
{
    public function Index(){
        $webinarsData = MainWebinarModel::orderBy('id','desc')->get();
        return view('admin.webinar.index',compact('webinarsData'));
    }
    public function Add(Request $request){
        return view('admin.webinar.add');
    }
    public function AddWebinar(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerReviewImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $Review = new MainWebinarModel;
        $Review->fill($data);
        $Review->save();
        $success = "This webinar has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $webinar = MainWebinarModel::find($id);
        return view('admin.webinar.add',compact("webinar"));
    }
    public function EditWebinar(Request $request, $id){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $ReviewImage = $path;
            $data['image'] = $ReviewImage;
        }
        $Review = MainWebinarModel::find($id);
        $Review->fill($data);
        $Review->save();
        $success = "This webinar has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Deactive(Request $request, $id){
        $data = MainWebinarModel::find($id);
        $data->status = 0;
        $data->save();
        $error = "This webinar has been deactived successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $memberData = MainWebinarModel::where('id',$id)->first();
        $memberData->status = 1 ;
        $memberData->save();
        $success = "This webinar has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
