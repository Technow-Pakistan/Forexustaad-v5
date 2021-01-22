<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BrokerCategoryModel extends Model
{
    protected $table="broker_categories";
    protected $fillable = ["category","active"];
}
