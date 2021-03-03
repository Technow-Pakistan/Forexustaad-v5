<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SignalLikeModel extends Model
{
    protected $table = "signal_like";
    protected $fillable = ["liked","userId","signalId"];
}
