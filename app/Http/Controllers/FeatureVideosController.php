<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeatureVideosModel;

class FeatureVideosController extends Controller
{
    
    public function Index(Request $request){
        $totalData = FeatureVideosModel::orderBy('id','desc')->get();
        return view('admin.feature.index',compact('totalData'));
    }
    public function Add(Request $request){
        return view('admin.feature.add');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        $video = new FeatureVideosModel;
        if ($request->file("thumbnail") != null) {
            $path = $request->file("thumbnail")->store("WebImages");
            $data['thumbnail'] = $path;
        }
        $video->fill($data);
        $video->save();
        $success = "Video has been save successfully.";
        $request->session()->put("success",$success);

        return back();
    }
    public function Edit(Request $request, $id){
        $video = FeatureVideosModel::find($id);
        return view('admin.feature.edit',compact("video"));
    }
    public function EditProcess(Request $request, $id){
        $data = $request->all();
        $video = FeatureVideosModel::find($id);
        if ($request->file("thumbnail") != null) {
            $path = $request->file("thumbnail")->store("WebImages");
            $data['thumbnail'] = $path;
        }
        $video->fill($data);
        $video->save();
        $success = "Video has been Updated successfully.";
        $request->session()->put("success",$success);

        return back();
    }
    public function Delete(Request $request, $id){
        $video = FeatureVideosModel::find($id);
        $video->status = 1;
        $video->save();
        $error = "Video has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $video = FeatureVideosModel::find($id);
        $video->status = 0;
        $video->save();
        $success = "Video has been active successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
