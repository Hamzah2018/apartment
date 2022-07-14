<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


class Image extends Model
{
    // use HasFactory,SoftDeletes;

    public $fillable = ['filename','imageable_id','imageable_type'];
    public function imageable()
    {
        return $this->morphTo();
    }
    // public function apartment(): BelongsTo
    // {
    //     return $this->belongsTo(Apartment::class);
    // }
}
