<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SubMenuModel;

class MainMenuModel extends Model
{
    protected $table = "mainmenu";
    protected $fillable = ["menu","link",'trash','upper'];
    public function GetSubMenu(){
        $get = SubMenuModel::where('mainmenuId',$this->id)->where('trash',0)->get();
        return $get;
    }
}
