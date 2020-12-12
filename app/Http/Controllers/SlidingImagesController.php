<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SlidingImagesModel;

class SlidingImagesController extends Controller
{
    public function Index(Request $request){
        $images = SlidingImagesModel::all();
        return view('admin.sliding-images',compact("images"));
    }
    public function Add(Request $request){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("SliderImages");
            $SliderImage = $path;
        }
        $image = new SlidingImagesModel;
        $image->image = $SliderImage;
        $image->save();
        $images = SlidingImagesModel::all();
        return view('admin.sliding-images',compact("images"));
    }
    public function Edit(Request $request, $id){
        $image = SlidingImagesModel::where('id',$id)->first();
        return view('admin.edit-slide-img',compact("image"));
    }
    public function ProcessEdit(Request $request, $id){
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("SliderImages");
            $SliderImage = $path;
        }else{
            $preimage = SlidingImagesModel::where('id',$id)->first();
            $SliderImage = $preimage->image;
        }
        $image = SlidingImagesModel::where('id',$id)->first();
        $image->image = $SliderImage;
        $image->title = $request->title;
        $image->link = $request->link;
        $image->description = $request->description;
        $image->save();
        return view('admin.edit-slide-img',compact("image"));
    }
    public function ProcessRemove(Request $request, $id){
        $image = SlidingImagesModel::where('id',$id)->first();
        $image->delete();
        return redirect('admin/sliding-images');
    }
    
}
