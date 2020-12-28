<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImagesDetailModel extends Model
{
    protected $table = "gallery_image_detail";
    protected $fillable = ["title","alt","caption","imgPath"];
}
