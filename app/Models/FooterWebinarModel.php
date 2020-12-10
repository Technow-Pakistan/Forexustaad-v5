<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterWebinarModel extends Model
{
    protected $table = "footer_webinar";
    protected $fillable = ["webinar","area"];
}
