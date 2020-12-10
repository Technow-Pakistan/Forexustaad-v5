<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogoPanelModel extends Model
{
    protected $table = "logo_images";
    protected $fillable = ["logo","active"];
}