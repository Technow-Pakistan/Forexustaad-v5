<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminModel;

class TrashGalleryModel extends Model
{
    protected $table = "trash_gallery";
    protected $fillable = ["image","belongs","adminTableId"];
    
    public function GetMember(){
        $member = AdminModel::where('id',$this->adminTableId)->first();
        return $member;
    }
}
