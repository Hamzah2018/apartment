<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasImage;
use Illuminate\Database\Eloquent\SoftDeletes;
class Apartment extends Model
{

    use HasFactory,SoftDeletes, HasImage;
    protected $table ="apartments";
    protected $guarded = [];

// Relation to birng the imagas for apartments
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
// public function apartment_imgs(): HasMany
// {
//     return $this->hasMany(apartment_imgs::class);
// }
    public function user(): BelongsTo
    {
    return $this->belongsTo(User::class);
    }


}
