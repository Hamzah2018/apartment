<?php

namespace App\Traits;
use Illuminate\Http\Request;
trait UploadsImageTrait
{
    public function uploadImage(Request $request,$folderName){
        $image = $request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs($folderName,$image,'imageU');
        return $path;
    }
}
