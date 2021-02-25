<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ClientMemberModel;
use App\Models\ClientAccountDetailModel;
use App\Models\AllCitiesModel;
use App\Models\AllStatesModel;
use App\Models\AllCountriesModel;

class ClientRegistrationModel extends Model
{
    protected $table = "clients_registration";
    protected $fillable = ["email","password","cityId","name","lastName","userName","nickName","image","mobile","city","status","confirmationEmail","description","addMobile","addEmail","social","socialLink"];

    public function GetAccountData(){
        $member = ClientAccountDetailModel::where('clientId',$this->id)->get();
        return $member;
    }
    public function GetMember(){
        $member = ClientMemberModel::where('id',$this->memberType)->first();
        return $member;
    }
    public function GetCitysInfo(){
        $member = AllCitiesModel::where('id',$this->cityId)->first();
        return $member;
    }
    public function GetStateInfo(){
        $member1 = AllCitiesModel::where('id',$this->cityId)->first();
        $member = AllStatesModel::where('id',$member1->state_id)->first();
        return $member;
    }
    public function GetCountryInfo(){
        $member1 = AllCitiesModel::where('id',$this->cityId)->first();
        $member = AllCountriesModel::where('id',$member1->country_id)->first();
        return $member;
    }

}
