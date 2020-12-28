<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AdminModel;

class TrashModel extends Model
{
    protected $table = "trash";
    protected $fillable = ["adminTableId","trashItem","deleteId","category","deleteTitle"];
    
    public function GetMember(){
        $member = AdminModel::where('id',$this->adminTableId)->first();
        return $member;
    }
}
