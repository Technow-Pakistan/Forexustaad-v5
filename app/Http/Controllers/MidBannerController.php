<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MidBannerModel;

class MidBannerController extends Controller
{
    public function Index(){
        $midBannerData = MidBannerModel::orderBy('id','desc')->get();
        return view('admin.midBanner.all-midBanner',compact('midBannerData'));
    }
    public function Add(Request $request){
        return view('admin.midBanner.add-midBanner');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $data['image'] = $path;
        }
        if (isset($data['active'])) {
            $midBannerActive = MidBannerModel::where('active',1)->first();
            if($midBannerActive){
                $midBannerActive->active = 0;
                $midBannerActive->save();
            }
        }
        $midBanner = new MidBannerModel;
        $midBanner->fill($data);
        $midBanner->save();
        $success = "This Mid-Banner has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Delete(Request $request, $id){
        $midBanner = MidBannerModel::where('id',$id)->first();
        $midBanner->status = 1;
        $midBanner->save();
        $error = "This Mid-Banner has been deactive successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function Active(Request $request, $id){
        $midBanner = MidBannerModel::where('id',$id)->first();
        $midBanner->status = 0;
        $midBanner->save();
        $success = "This Mid-Banner has been actived successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $data = MidBannerModel::where('id',$id)->first();
        return view('admin.midBanner.edit-midBanner',compact('data'));
    }
    public function EditProcess(Request $request, $id){
        $midBanner = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $midBanner['image'] = $path;
        }
        if (isset($midBanner['active'])) {
            $midBannerActive = MidBannerModel::where('active',1)->first();
            if($midBannerActive){
                $midBannerActive->active = 0;
                $midBannerActive->save();
            }
        }else{
            $midBanner['active'] = 0;
        }
        $data = MidBannerModel::where('id',$id)->first();
        $data->fill($midBanner);
        $data->save();
        $success = "This Mid-Banner has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    } 
}
