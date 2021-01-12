<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserContactModel;
use App\Models\ComposeEmailModel;


class ContactController extends Controller
{
    public function contact(Request $request){
        return view('home.contact');
    }
    public function Index(Request $request){
        $totalData = UserContactModel::orderBy("id","desc")->get();
        $totalCompose = ComposeEmailModel::orderBy("id","desc")->get();
        return view('admin.emailInbox',compact("totalData","totalCompose"));
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
        $data = UserContactModel::where('id',$id)->first();
        if($data->read == 0){
            $data->read = 1;
        }
        $data->save();
        return view("admin.emailRead",compact("data"));
    }
    public function SelectedTrash(Request $request){
        if (isset($request->inbox)) {
            $data = $request->inbox;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = UserContactModel::where('id',$data[$i])->first();
                $data->trashMail = 1;
                $data->save();
            }
        }elseif (isset($request->sent)){
            $data = $request->sent;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = ComposeEmailModel::where('id',$data[$i])->first();
                $data->trashMail = 1;
                $data->save();
            }
        }elseif (isset($request->inboxTrash)) {
            $data = $request->inboxTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = UserContactModel::where('id',$data[$i])->first();
                $data->delete();
            }
        }elseif (isset($request->sentTrash)){
            $data = $request->sentTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = ComposeEmailModel::where('id',$data[$i])->first();
                $data->delete();
            }
        }
        return back();
    }
    public function UnTrash(Request $request){
        if (isset($request->inboxTrash)) {
            $data = $request->inboxTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = UserContactModel::where('id',$data[$i])->first();
                $data->trashMail = 0;
                $data->save();
            }
        }elseif (isset($request->sentTrash)){
            $data = $request->sentTrash;
            $count = count($data);
            for ($i=0; $i <$count ; $i++) { 
                $data = ComposeEmailModel::where('id',$data[$i])->first();
                $data->trashMail = 0;
                $data->save();
            }
        }
        return back();
    }
}
