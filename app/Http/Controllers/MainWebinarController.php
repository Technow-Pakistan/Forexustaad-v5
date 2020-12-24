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
        return back();
    }
}
