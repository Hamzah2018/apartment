<?php

namespace App\Traits;

use App\Models\Image;
trait HasImage
{
    // public static function bootHasImage(){
    //     static::deleting(function ($model){
    //     $model->deleteImage();
    //     });
    // }

    public function Image(){
        return $this->morphOne(Image::class,'Imageable');
        }

    public function storeImage($path)
        {
        $Image = $this->Image()->create(['path' =>$path]);
        return $Image;
        }

        public function updateImage($path)
            {
                if($this->Image){
                    $this->Image->delete();
                }
            $this->storeImage($path);
            }

//             public function deleteImage()
//                 {
//                 if($this->Image){
//                 $this->Image->delete();
//                 }
//                 }
//             public function getImageAttribute()
//                 {
//                 $Image = $this->Image;
//                 if(! $Image){
//                 return null;
//                 }
//                 return asset('storage/' . $Image->path);
//                 }
//

}
