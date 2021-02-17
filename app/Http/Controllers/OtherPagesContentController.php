<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPagesContentModel;

class OtherPagesContentController extends Controller
{
   
    public function Index(Request $request,$id){
        $title = str_replace("-"," ",$id);
        $data  = OtherPagesContentModel::where('link',$id)->first();
        if($data){
            return view('home/other-pages-content',compact('data'));
        }else{
            $error = "This url does not exit.";
            $request->session()->put("error",$error);
            return redirect('/');
        }
    }

    // Admin Panel

    public function All(Request $request){
        $StaticPages  = OtherPagesContentModel::orderBy('id','desc')->get();
        return view('admin.all-static-pages',compact('StaticPages'));
    }
    public function Add(Request $request){
        return view('admin.static-pages');
    }
    public function AddProcess(Request $request){
        $data = $request->all();
        if(isset($request->link)){
            $link = $request->link;
            $permalink = explode("/",$link);
            $linkNum = count($permalink) - 1;
            $data['link'] = $permalink[$linkNum];
        }
        $data['description'] = htmlentities($request->editor1);
        $content = new OtherPagesContentModel;
        $content->fill($data);
        $content->save();
        $success = "Your data save successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request,$id){
        $data = OtherPagesContentModel::find($id);
        return view('admin.static-pages',compact('data'));
    }
    public function SaveChanges(Request $request,$id){
        $data = $request->all();
        if(isset($request->link)){
            $link = $request->link;
            $permalink = explode("/",$link);
            $linkNum = count($permalink) - 1;
            $data['link'] = $permalink[$linkNum];
        }
        $data['description'] = htmlentities($request->editor1);
        $dataSave = OtherPagesContentModel::find($id);
        $dataSave->fill($data);
        $dataSave->save();
        $success = "Your data update successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
