<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalApiRecordModel extends Model
{
    protected $table = "signal_api_pair";
    protected $fillable = ["pair","categoryId"];

}
