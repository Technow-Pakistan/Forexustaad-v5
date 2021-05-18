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
    protected $fillable = ["email","password","cityId","name","lastName","userName","nickName","image","mobile","city","status","confirmationEmail","description","addMobile","addEmail","social","socialLink","online","keywords"];

    public function GetAccountData(){
        $member = ClientAccountDetailModel::where('clientId',$this->id)->get();
        return $member;
    }
    public function GetAccountsDetail(){
        $data = [];
        $data1 = ClientAccountDetailModel::where('clientId',$this->id)->count();
        array_push($data,$data1);
        $data2 = ClientAccountDetailModel::where('clientId',$this->id)->where('verified',1)->count();
        array_push($data,$data2);
        $data3 = ClientAccountDetailModel::where('clientId',$this->id)->where('verified',2)->count();
        array_push($data,$data3);
        $data4 = ClientAccountDetailModel::where('clientId',$this->id)->where('verified',0)->count();
        array_push($data,$data4);
        return $data;
    }
    public function GetAccountsDepositDetail(){
        $data = [];
        $data1 = ClientAccountDetailModel::where('clientId',$this->id)->get();
        $amount = 0;
        foreach ($data1 as $da) {
            $amount += (float)$da->accountdeposit;
        }
        array_push($data,$amount);
        $data2 = ClientAccountDetailModel::where('clientId',$this->id)->where('depositConfirm',1)->get();
        $amount = 0;
        foreach ($data2 as $daa) {
            $amount += (float)$daa->accountdeposit;
        }
        array_push($data,$amount);
        $data3 = ClientAccountDetailModel::where('clientId',$this->id)->where('depositConfirm',2)->get();
        $amount = 0;
        foreach ($data3 as $daaa) {
            $amount += (float)$daaa->accountdeposit;
        }
        array_push($data,$amount);
        $data4 = ClientAccountDetailModel::where('clientId',$this->id)->where('depositConfirm',0)->get();
        $amount = 0;
        foreach ($data4 as $daaaa) {
            $amount += (float)$daaaa->accountdeposit;
        }
        array_push($data,$amount);
        return $data;
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
