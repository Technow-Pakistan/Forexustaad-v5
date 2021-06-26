<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;
use App\Models\SignalPairModel;
use App\Models\BrokerCompanyInformationModel;

class MetaTagsController extends Controller
{

    public function Index(Request $request) {
        $totalData = MetaTagsModel::where('main',1)->get();
        return view('admin.meta-tags.meta_tags',compact('totalData'));
    }
    public function Edit(Request $request,$id) {
        $data = MetaTagsModel::find($id);
        $MetaKeywords = MetaKeywordsModel::all();
        return view('admin.meta-tags.edit',compact('data','MetaKeywords'));
    }
    public function EditProcess(Request $request,$id) {
        $data1 = $request->all();
        for ($i=0; $i < count($request->metaKeywords); $i++) {
            $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
            if($find == null){
                $key = new MetaKeywordsModel;
                $key->name = $request->metaKeywords[$i];
                $key->save();
            }
        }
        $newMeta = MetaTagsModel::find($id);
        $newMeta->description = $request->metaDescription;
        $newMeta->title = $request->metaTitle;
        $newMeta->keywordsimp = implode(",",$request->metaKeywords);
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("WebImages");
            $newMeta->image = $path;
        }
        $newMeta->save();
        $success = "This Data has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    // Signal Pair Metas Function
    public function AddSignalPairMeta(Request $request,$id) {
        $signalPair = SignalPairModel::find($id);
        $name_page = "signalPair@" . $id;
        $data = MetaTagsModel::where('name_page',$name_page)->first();
        $MetaKeywords = MetaKeywordsModel::all();
        return view('admin.signals.edit-meta-tags',compact('data','MetaKeywords','signalPair'));
    }
    public function AddSignalPairMetaProcess(Request $request,$id) {
        $data1 = $request->all();
        for ($i=0; $i < count($request->metaKeywords); $i++) {
            $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
            if($find == null){
                $key = new MetaKeywordsModel;
                $key->name = $request->metaKeywords[$i];
                $key->save();
            }
        }
        $newMeta = MetaTagsModel::find($id);
        if($newMeta != null){
            $newMeta = new MetaTagsModel;
            $newMeta->main = 0;
            $newMeta->name_page = "signalPair@" . $id;
        }
        $newMeta->description = $request->metaDescription;
        $newMeta->title = $request->metaTitle;
        $newMeta->keywordsimp = implode(",",$request->metaKeywords);
        if ($request->file("image") != null) {
            $path = $request->file("image")->store("WebImages");
            $newMeta->image = $path;
        }
        $newMeta->save();
        $success = "This Data has been updated successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    // broker New Page Metas Function
    public function BrokerPageMetas(Request $request,$id) {
        $broker = BrokerCompanyInformationModel::find($id);
        $name_page = "@" . $broker->title;
        $totalData = MetaTagsModel::where('name_page','LIKE','%'.$name_page.'%')->get();
        return view('admin.meta-tags.meta_tags',compact('totalData'));
    }
}
