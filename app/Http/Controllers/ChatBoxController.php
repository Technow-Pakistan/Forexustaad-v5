<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\ChatBoxModel;
use App\Models\ClientRegistrationModel;
use App\Models\PusherModel;

class ChatBoxController extends Controller
{
   public function GetClientMessage(Request $request, $id){
        $data5 = array(); 
        $data1 = ClientRegistrationModel::find($id);
        array_push($data5,$data1);
        $data = ChatBoxModel::where('userId',$id)->get();
        array_push($data5,$data);
        for($i=0; $i < count($data); $i++){
            if ($data[$i]->read == 2) {
                $data[$i]->read = 3;
            }
            $data[$i]->save();
        }
        return json_encode($data5);
   }
   public function GetReadChatLientMessages(Request $request, $id){
        $data5 = array(); 
        $data = ChatBoxModel::where('userId',$id)->get();
        array_push($data5,$data);
        for($i=0; $i < count($data); $i++){
            if ($data[$i]->read == 1) {
                $data[$i]->read = 3;
            }
            $data[$i]->save();
        }
        return json_encode($data5);
   }

   public function ClientMessageSend(Request $request, $id){
        $newMessage = new ChatBoxModel;
        $newMessage->message = $request['data1'];
        $newMessage->userType = 2;
        $newMessage->userId = $id;
        $newMessage->read = 1;
        $newMessage->save();
        $data1 = ClientRegistrationModel::find($id);
        PusherModel::BoardCast($data1->email,"firstEvent12",["message" => $newMessage]);
        return json_encode($newMessage);
   }
   public function AdminMessageSend(Request $request){
        $newMessage = new ChatBoxModel;
        $info = $request->session()->get('client');
        $newMessage->message = $request['data1'];
        $newMessage->userType = 1;
        $newMessage->userId = $info['id'];
        $newMessage->read = 2;
        $newMessage->save();
        PusherModel::BoardCast("AdminChatPush","firstEvent",["message" => $newMessage]);
        return json_encode($newMessage);
   }
   public function GetClientInfo(Request $request, $id){
        $data = ClientRegistrationModel::find($id);
        if($data->image == null){
            $data->image = "https://bootdey.com/img/Content/avatar/avatar7.png";
        }else{
            $data->image = URL::to('storage/app') . "/" . $data->image;
        }
        return json_encode($data);
   }
}
