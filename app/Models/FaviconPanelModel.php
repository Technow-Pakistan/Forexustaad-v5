<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaviconPanelModel extends Model
{
    protected $table = "favicon_images";
    protected $fillable = ["favicon","active","trash"];
}
