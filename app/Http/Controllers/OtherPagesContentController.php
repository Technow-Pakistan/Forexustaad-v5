<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OtherPagesContentModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;

class OtherPagesContentController extends Controller
{

    public function Index(Request $request,$id){
        $title = str_replace("-"," ",$id);
        $data  = OtherPagesContentModel::where('link',$id)->first();
        $name_page = "StaticPages@" . $data->id;
        $meta = MetaTagsModel::where('name_page',$name_page)->first();
        if($data){
            return view('home/other-pages-content',compact('data','meta'));
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
        $newMeta = null;
        return view('admin.static-pages',compact('newMeta'));
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
        // meta Tags save start
        for ($i=0; $i < count($request->metaKeywords); $i++) {
            $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
            if($find == null){
                $key = new MetaKeywordsModel;
                $key->name = $request->metaKeywords[$i];
                $key->save();
            }
        }
        $newMeta = new MetaTagsModel;
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("WebImages");
            $newMeta->image = $path;
        }
        $newMeta->name_page = "StaticPages@" . $content->id;
        $newMeta->description = $request->metaDescription;
        $newMeta->title = $request->metaTitle;
        $newMeta->keywordsimp = implode(",",$request->metaKeywords);
        $newMeta->save();
    // meta Tags save end
        $success = "Your data save successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request,$id){
        $name_page = "StaticPages@" . $id;
        $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
        $data = OtherPagesContentModel::find($id);
        return view('admin.static-pages',compact('data','newMeta'));
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
        // meta Tags save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $name_page = "StaticPages@" . $id;
            $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
            if($newMeta == null){
                $newMeta = new MetaTagsModel;
            }
            if ($request->file("image") != null) {
                $path = $request->file("image")->store("WebImages");
                $newMeta->image = $path;
            }
            $newMeta->name_page = "StaticPages@" . $id;
            $newMeta->description = $request->metaDescription;
            $newMeta->title = $request->metaTitle;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end
        $success = "Your data update successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
