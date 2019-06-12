<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use NodeTrait;

    protected $guarded = [];

    public function posts() {
        return $this->hasMany(Post::class);
    }
}
