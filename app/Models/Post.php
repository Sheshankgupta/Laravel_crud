<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->morphOne(image::class, 'imageable');
    }

    public function images()
    {
        return $this->morphMany(image::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(tag::class, 'taggable');
    }
}
