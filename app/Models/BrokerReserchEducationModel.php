<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerReserchEducationModel extends Model
{
    protected $table="broker_research_education";
    protected $fillable = ["commentary","news","autochartist","tradingCentral","delkos","acuity","webinars","education","calendar","brokerId","editId","pending"];


    public function GetPendingReserchEducation(){
        $data = BrokerReserchEducationModel::where('editId',$this->id)->first();
        return $data;
    }
    public function GetAllowReserchEducation(){
        $data = BrokerReserchEducationModel::where('id',$this->editId)->first();
        return $data;
    }
}
