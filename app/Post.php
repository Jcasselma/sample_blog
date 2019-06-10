<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'author',
        'title',
        'category',
        'short_description',
        'long_description'
    ];
}
