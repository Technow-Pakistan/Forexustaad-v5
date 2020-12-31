<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlidingImagesModel extends Model
{
    protected $table = "slider_images";
    protected $filable = ["image","title","link","description","trash"];
}
