<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderRightBannerModel extends Model
{
    protected $table = "header_right_banner";
    protected $fillable = ["banner","start","end","link","htmlLink","trash","active"];
}
