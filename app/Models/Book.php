<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $fillable = [
        'title',
        'slug',
        'author',
        'description',
        'price',
        'stock',
        'cover_image',
        'category_id'
        ];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
