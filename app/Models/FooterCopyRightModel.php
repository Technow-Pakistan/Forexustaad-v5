<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterCopyRightModel extends Model
{
    protected $table = "footer_copy_right";
    protected $fillable = ["description","description2"];
}
