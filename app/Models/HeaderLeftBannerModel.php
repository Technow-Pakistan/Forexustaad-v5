<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeaderLeftBannerModel extends Model
{
    protected $table = "header_left_banner";
    protected $fillable = ["banner","start","end","link","htmlLink"];
}
