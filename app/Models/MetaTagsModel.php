<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetaTagsModel extends Model
{
    protected $table = "meta_tags";
    protected $fillable = ["title","description","image","keywordsimp","name_page"];
}
