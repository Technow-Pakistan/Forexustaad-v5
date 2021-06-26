<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainMenuModel;

class SubMenuModel extends Model
{
    protected $table = "sub_menu";
    protected $fillable = ["submenu","link","mainmenuId","trash"];
    public function GetMainMenu(){
        $get = MainMenuModel::where('id',$this->mainmenuId)->first();
        return $get;
    }
}
