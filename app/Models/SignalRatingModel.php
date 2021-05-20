<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalRatingModel extends Model
{
    protected $table = "signal_rating";
    protected $fillable = ["rating","userId","signalId"];
}
