<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserContactModel;
use App\Models\ComposeEmailModel;

class ContactController extends Controller
{
    public function Index(Request $request){
        $totalData = UserContactModel::orderBy("id","desc")->get();
        $totalCompose = ComposeEmailModel::orderBy("id","desc")->get();
        $totalInboxNumber = UserContactModel::where('trashMail',0)->count();
        return view('admin.emailInbox',compact("totalData","totalCompose","totalInboxNumber"));
    }
    public function Add(Request $request){
        $data = new UserContactModel;
        $data->fill($request->all());
        $data->save();
        return back();
    }
    public function StarMessage(Request $request, $id){
        $data = UserContactModel::where('id',$id)->first();
        if($data->star == 1){
            $data->star = 0;
        }else{
            $data->star = 1;
        }
        $data->save();
        return back();
    }
    public function EmailRead(Request $request, $id){
        $urlDelete = "emailRead/delete";
        $data = UserContactModel::where('id',$id)->first();
        if($data->read == 0){
            $data->read = 1;
        }
        $data->save();
        $data = UserContactModel::where('id',$id)->first();
        $totalData = UserContactModel::orderBy("id","desc")->get();
        $totalCompose = ComposeEmailModel::orderBy("id","desc")->get();
        return view('admin.sendEmailRead',compact('data',"totalData","totalCompose","urlDelete"));
    }
    public function emailReadDelete(Request $request, $id){
        $data = UserContactModel::where('id',$id)->first();
        $data->trashMail = 1;
        $data->save();
        return redirect('ustaad/contact');
    }
    public function sendEmailReadDelete(Request $request, $id){
        $data = ComposeEmailModel::where('id',$id)->first();
        $data->trashMail = 1;
        $data->save();
        return redirect('ustaad/contact');
    }
    public function SelectedTrash(Request $request){
        if (isset($request->inbox)) {
            $data = $request->inbox;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = UserContactModel::where('id',$data[$i])->first();
                $data12->trashMail = 1;
                $data12->save();
            }
        }elseif (isset($request->sent)){
            $data = $request->sent;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = ComposeEmailModel::where('id',$data[$i])->first();
                $data12->trashMail = 1;
                $data12->save();
            }
        }elseif (isset($request->inboxTrash)) {
            $data = $request->inboxTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = UserContactModel::where('id',$data[$i])->first();
                $data12->delete();
            }
        }elseif (isset($request->sentTrash)){
            $data = $request->sentTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = ComposeEmailModel::where('id',$data[$i])->first();
                $data12->delete();
            }
        }
        return back();
    }
    public function UnTrash(Request $request){
        if (isset($request->inboxTrash)) {
            $data = $request->inboxTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = UserContactModel::where('id',$data[$i])->first();
                $data12->trashMail = 0;
                $data12->save();
            }
        }elseif (isset($request->sentTrash)){
            $data = $request->sentTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) {
                $data12 = ComposeEmailModel::where('id',$data[$i])->first();
                $data12->trashMail = 0;
                $data12->save();
            }
        }
        return back();
    }
}
