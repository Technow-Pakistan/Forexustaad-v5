<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentPagesModel extends Model
{
    protected $table = "comment_pages";
    protected $fillable = ["page","page_name","admin_panel_page_name","admin_panel_page_url"];
}
