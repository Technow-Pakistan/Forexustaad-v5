<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SignalPairCategoryModel;

class SignalPairModel extends Model
{
    protected $table = "signal_pairs";
    protected $fillable = ["pair","categoryId"];

    public function getCategory(){
        $category = SignalPairCategoryModel::find($this->categoryId);
        return $category;
    }
}
