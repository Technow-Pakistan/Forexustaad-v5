<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiHomeModel extends Model
{
    protected $table = "api_home";
    protected $fillable = ["title","link","area","trash"];
}
