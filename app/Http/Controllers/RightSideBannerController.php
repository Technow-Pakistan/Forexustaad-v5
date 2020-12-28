<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RightSideBannerModel;

class RightSideBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = RightSideBannerModel::orderBy('id','desc')->get();
        return view('admin.right-side-bar',compact('totalData'));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }
        $banner = new RightSideBannerModel;
        if (isset($bannerImage)){
            $banner->banner = $bannerImage;
        }
        $banner->link = $request->link;
        $banner->htmlLink = $request->htmlLink;
        $banner->start = $request->start;
        $banner->end = $request->end;
        $banner->area = $request->area;
        $banner->save();
        return back();
    }
    public function delete(Request $request, $id){
        $data = RightSideBannerModel::find($id);
        $data->delete();
        return back();
    }
    public function ProcessEdit(Request $request, $id){
        $banner = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $banner['banner'] = $path;
        }
        $data = RightSideBannerModel::find($id);
        $data->fill($banner);
        $data->save();
        return back();
    }
}