<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'short_description',
        'long_description'
    ];

    public function categories() {
        return $this->hasMany(Category::class);
    }
}
