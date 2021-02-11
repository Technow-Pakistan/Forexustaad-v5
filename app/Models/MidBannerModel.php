<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MidBannerModel extends Model
{
    protected $table = "mid_banner";
    protected $fillable = ["image","link","status","active"];
}
