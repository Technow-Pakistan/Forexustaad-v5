<?php

namespace App\Models;
use App\Models\ClientRegistrationModel;

use Illuminate\Database\Eloquent\Model;

class ClientMemberModel extends Model
{
    protected $table = "client_member";
    protected $fillable = ["member"];

    public function GetNumberOfClient(){
        $get = ClientRegistrationModel::where('memberType',$this->id)->get();
        return count($get);
    }
}
