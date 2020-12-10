<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainMenuModel extends Model
{
    protected $table = "mainmenu";
    protected $fillable = ["menu","link"];

}
