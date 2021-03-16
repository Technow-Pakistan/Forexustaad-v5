<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientRegistrationModel;

class ChatBoxModel extends Model
{
    protected $table = "chat_box";
    protected $fillable = ["message","userType","userId","read"];

    public function GetClientDetail(){
        $data = ClientRegistrationModel::where('id',$this->userId)->first();
        return $data;
    }
    public function GetUnRead(){
        $returnArray = array();
        $data = ChatBoxModel::where('userId',$this->userId)->get();
        for ($i=0; $i < count($data) ; $i++) { 
            if ($data[$i]->read != 1 && $data[$i]->read != 3 ){
                array_push($returnArray,$data[$i]);
            }
        }
        return $returnArray;
    }
    public function GetTotalUnRead(){
        $returnArray = array();
        $data = ChatBoxModel::all();
        for ($i=0; $i < count($data) ; $i++) { 
            if ($data[$i]->read != 1 && $data[$i]->read != 3 ){
                array_push($returnArray,$data[$i]);
            }
        }
        return $returnArray;
    }
    public function GetTotalUnReadAM(){
        $returnArray = array();
        $data = ChatBoxModel::all();
        for ($i=0; $i < count($data) ; $i++) { 
            if ($data[$i]->read != 2 && $data[$i]->read != 3 ){
                array_push($returnArray,$data[$i]);
            }
        }
        return $returnArray;
    }
}
