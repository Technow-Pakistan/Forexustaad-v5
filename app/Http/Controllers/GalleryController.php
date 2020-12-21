<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function Index(Request $request, $id){
        $totalData = Storage::files($id);
        return view('admin.galleryImages',compact('totalData','id'));
    }
}
