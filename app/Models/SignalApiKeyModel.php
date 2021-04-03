<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalApiKeyModel extends Model
{
    protected $table = "signal_api_key";
    protected $fillable = ["apiKey"];
}
