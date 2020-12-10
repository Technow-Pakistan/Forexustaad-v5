<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RightSideBannerModel extends Model
{
    protected $table = "right_side_bar_banner";
    protected $fillable = ["banner","start","end"];
}
