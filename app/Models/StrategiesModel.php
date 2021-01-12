<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategiesModel extends Model
{
    protected $table = "strategies";
    protected $fillable = ["title","image","shortDescription","description","status"];
}
