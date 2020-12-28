<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForgetPasswordModel extends Model
{
    protected $table = "forget_password";
    protected $fillable = ["link","time"];
}
