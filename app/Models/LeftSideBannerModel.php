<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeftSideBannerModel extends Model
{
    protected $table = "left_side_bar_banner";
    protected $fillable = ["banner","start","end","area"];
}
