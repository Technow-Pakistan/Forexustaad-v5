<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeaderLeftBannerModel;
use App\Models\HeaderRightBannerModel;

class HeaderBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = HeaderLeftBannerModel::orderBy('id','desc')->get();
        $totalRightData = HeaderRightBannerModel::orderBy('id','desc')->get();
        // print_r($featurebanner);
        // die;
        return view('admin.header-banner',compact('totalData','totalRightData'));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BannerImages");
            $bannerImage = $path;
        }

        $banner = new HeaderLeftBannerModel;
        if (isset($bannerImage)) {
            $banner->banner = $bannerImage;
        }
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->save();
        return back();
    }
    public function deleteLeft(Request $request, $id){
        
        $data = HeaderLeftBannerModel::find($id);
        $data->delete();
        return back();
    }
    public function AddRight(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BannerImages");
            $bannerImage = $path;
        }

        $banner = new HeaderRightBannerModel;
        if (isset($bannerImage)) {
            $banner->banner = $bannerImage;
        }
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->save();
        return back();
    }
    public function deleteRight(Request $request, $id){
        
        $data = HeaderRightBannerModel::find($id);
        $data->delete();
        return back();
    }
}
