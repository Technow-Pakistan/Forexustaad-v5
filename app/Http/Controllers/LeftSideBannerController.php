<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeftSideBannerModel;

class LeftSideBannerController extends Controller
{
    public function Index(Request $request){
        $totalData = LeftSideBannerModel::orderBy('id','desc')->get();
        return view('admin.Left-side-bar',compact('totalData'));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("WebImages");
            $bannerImage = $path;
        }
        $banner = new LeftSideBannerModel;
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
        $data = LeftSideBannerModel::find($id);
        $data->delete();
        return back();
    }
    public function ProcessEdit(Request $request, $id){
        
        $data = LeftSideBannerModel::find($id);
        $data->fill($request->all());
        $data->save();
        return back();
    }

}
