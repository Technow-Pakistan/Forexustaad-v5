<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientMemberModel;

class ClientRegistrationModel extends Model
{
    protected $table = "clients_registration";
    protected $fillable = ["email","password","name","mobile","city","status"];

    
    public function GetMember(){
        $member = ClientMemberModel::where('id',$this->memberType)->first();
        return $member;
    }

}
