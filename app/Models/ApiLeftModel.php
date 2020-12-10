<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLeftModel extends Model
{
    protected $table = "api_left";
    protected $fillable = ["title","link","area"];
}
