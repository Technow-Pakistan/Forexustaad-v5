<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiRightModel extends Model
{
    protected $table = "api_right";
    protected $fillable = ["title","link","area"];
}
