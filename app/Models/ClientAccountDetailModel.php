<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BrokerCompanyInformationModel;

class ClientAccountDetailModel extends Model
{
    protected $table = "client_account_detail";
    protected $fillable = ["brokerId","clientId","accountNumber","accountemail","accountdeposit","accountName","verified","depositConfirm","clientAccountId"];

    public function getBroker(){
        $data = BrokerCompanyInformationModel::where('id',$this->brokerId)->first();
        return $data;
    }
}
