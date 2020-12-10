<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCompanyInformationModel extends Model
{
    protected $table="broker_company_information";
    protected $fillable = ["image","title","regulations","headquaters","foundation","traded","employees","start","end"];
}
