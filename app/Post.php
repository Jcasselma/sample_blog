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
        'long_description',
        'img_name'
    ];

    public function categories() {
        return $this->hasMany(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
