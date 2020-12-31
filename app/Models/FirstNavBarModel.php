<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstNavBarModel extends Model
{
    protected $table = "firstnavbar";
    protected $fillable = ["iconName","link","trash"];
}
