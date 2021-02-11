<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SponoserAddModel;

class SponoserAddController extends Controller
{
    public function Index(){
        $sponoserData = SponoserAddModel::orderBy('id','desc')->get();
        return view('admin.sponoser.all-sponoser',compact('sponoserData'));
    }
    public function Add(Request $request){
        return view('admin.sponoser.add-sponoser');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $data['image'] = $path;
        }
        $sponoser = new SponoserAddModel;
        $sponoser->fill($data);
        $sponoser->save();
        $success = "This sponoser has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $sponoser = SponoserAddModel::where('id',$id)->first();
        $sponoser->status = 1;
        $sponoser->save();
        $error = "This sponoser has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $sponoser = SponoserAddModel::where('id',$id)->first();
        $sponoser->status = 0;
        $sponoser->save();
        $success = "This sponoser has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = SponoserAddModel::where('id',$id)->first();
        return view('admin.sponoser.edit-sponoser',compact('data'));
    }
    public function EditProcess(Request $request, $id){
        $sponoser = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $sponoser['image'] = $path;
        }
        $data = SponoserAddModel::where('id',$id)->first();
        $data->fill($sponoser);
        $data->save();
        $success = "This sponoser has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    } 
}
