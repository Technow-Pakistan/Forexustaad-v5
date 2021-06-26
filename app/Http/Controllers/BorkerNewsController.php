<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrokerCompanyInformationModel;
use App\Models\BrokerNewsModel;
use App\Models\NotificationModel;
use App\Models\TrashModel;
use App\Models\MetaTagsModel;
use App\Models\MetaKeywordsModel;

class BorkerNewsController extends Controller
{
    public function Index(Request $request){
        $userId = $request->session()->get('admin');
        if($userId->memberId == 6){
            $brokerNews = BrokerNewsModel::orderBy('id','desc')->where('Trash',0)->where('userId',$userId->id)->get();
        }else{
            $brokerNews = BrokerNewsModel::orderBy('id','desc')->where('Trash',0)->get();
        }
        return view('admin.all-broker-news',compact('brokerNews'));
    }
    public function Add(Request $request){
        $newMeta = null;
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        return view('admin.add-broker-news',compact('broker','newMeta'));
    }
    public function AddNews(Request $request){
        $data = $request->all();
        $userID = $request->session()->get('admin');
        $data['userId'] = $userID->id;
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
        }
        $description = htmlentities($request->editor1);
        $data['image'] = $NewsImage;
        $data['description'] = $description;
        if ($userID['memberId'] == 6 ) {
            $data['pending'] = 1;
        }
        $news = new BrokerNewsModel;
        $news->fill($data);
        $news->save();
        $userID = $request->session()->get('admin');
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Add a broker news in $broker1->title";
            $notification->link = "ustaad/brokersNews/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
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
            $newMeta->name_page = "broker_news@" . $news->id;
            $newMeta->description = $news->shortDescription;
            $newMeta->title = $news->NewsTitle;
            $newMeta->image = $news->image;
            $newMeta->keywordsimp = implode(",",$request->metaKeywords);
            $newMeta->save();
        // meta Tags save end

        $success = "This broker news has been added successfully.";
        $request->session()->put("success",$success);
        return back();
    }
    public function Edit(Request $request, $id){
        $broker = BrokerCompanyInformationModel::where('trash',0)->get();
        $brokerNews = BrokerNewsModel::find($id);
        $name_page = "broker_news@" . $id;
        $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
        return view('admin.add-broker-news',compact('broker',"brokerNews","newMeta"));
    }
    public function EditNews(Request $request, $id){
        // meta Tags part1 save start
            for ($i=0; $i < count($request->metaKeywords); $i++) {
                $find = MetaKeywordsModel::where('name',$request->metaKeywords[$i])->first();
                if($find == null){
                    $key = new MetaKeywordsModel;
                    $key->name = $request->metaKeywords[$i];
                    $key->save();
                }
            }
            $name_page = "broker_news@" . $id;
            $newMeta = MetaTagsModel::where('name_page',$name_page)->first();
            if($newMeta == null){
                $newMeta = new MetaTagsModel; 
                $newMeta->name_page = "broker_news@" . $id;
                $newMeta->description = $request->shortDescription;
                $newMeta->title = $request->NewsTitle;
                $newMeta->image = $request->image;
                $newMeta->keywordsimp = implode(",",$request->metaKeywords);
                $newMeta->save();
            }
        // meta Tags part1 save end
        $data = $request->all();
        if ($request->file("file_photo") != null) {
            $path = $request->file("file_photo")->store("BrokerImages");
            $NewsImage = $path;
            $data['image'] = $NewsImage;
        }
        $description = htmlentities($request->editor1);
        $data['description'] = $description;
        $userID = $request->session()->get('admin');
        $news = BrokerNewsModel::find($id);
        if ($userID['memberId'] == 6 && $news->editId == null) {
            if(!isset($data['image'])){
                $data['image'] = $news->image; 
            }
            $editData = new BrokerNewsModel;
            $data['editId'] = $news->id;
            $data['pending'] = 1;
            $data['userId'] = $news->userId;
            $editData->fill($data);
            $editData->save();
            // meta Tags part2 save start
                $newMeta = new MetaTagsModel; 
                $newMeta->name_page = "broker_news@" . $editData->id;
                $newMeta->description = $editData->shortDescription;
                $newMeta->title = $editData->NewsTitle;
                $newMeta->image = $editData->image;
                $newMeta->keywordsimp = implode(",",$request->metaKeywords);
                $newMeta->save();
            // meta Tags part2 save end
        }else{
            $news->fill($data);
            $news->save();
        }
        $broker1 = BrokerCompanyInformationModel::find($news->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Edit a broker news in $broker1->title";
            $notification->link = "ustaad/brokersNews/all/$broker1->id";
            $previousData = NotificationModel::where('link',$notification->link)->first();
            if ($previousData) {
                $previousData->delete(); 
            }
            $notification->save();
        }
        $success = "This broker news has been updated successfully.";
        $request->session()->put("success",$success);
        if ($userID['memberId'] == 6 && $news->editId == null) {
            $url = '/ustaad/brokersNews/edit' . '/' . $editData->id;
            return redirect($url);
        }else {
            return back();
        }
    }
    public function Delete(Request $request, $id){
        $brokerNews = BrokerNewsModel::find($id);
        $brokerNews->delete();
        $Trash = TrashModel::where('deleteId',$id);
        $Trash->delete();
        $error = "This broker news has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function AllowBrokerNewsProcess(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        if ($broker->editId != null) {
            $data =  BrokerNewsModel::where('id',$broker->editId)->first();
            $changeId = $data->id;
            $data->delete();
            $broker->pending  = 0;
            $broker->editId = null;
            $broker->id = $changeId;
            $broker->save();
        }else{
            $broker->pending = 0;
            $broker->save();
        }
        return back();
    }
    public function Trash(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        $broker->trash = 1;
        $broker->save();
        $userID = $request->session()->get('admin');
        $Trash = new TrashModel;
        $Trash->adminTableId = $userID->id;
        $Trash->trashItem = "brokersNews";
        $Trash->category = "Broker News";
        $Trash->deleteId = $id;
        $Trash->deleteTitle = $broker->NewsTitle;
        $Trash->save();
        $broker1 = BrokerCompanyInformationModel::find($broker->brokerId);
        if ($userID['memberId'] == 6 ) {
            $notification = new NotificationModel;
            $notification->userId = $userID->id;
            $notification->text = "Delete a broker news in $broker1->title";
            $notification->link = "ustaad/trash";
            $notification->save();
        }
        $error = "This broker news has been deleted successfully.";
        $request->session()->put("error",$error);
        return back();
    }
    public function TrashRestore(Request $request, $id){
        $broker = BrokerNewsModel::find($id);
        $broker->trash = 0;
        $broker->save();
        $Trash = TrashModel::where('deleteId',$id)->first();
        $Trash->delete();
        $success = "This broker news has been restore successfully.";
        $request->session()->put("success",$success);
        return back();
    }
}
