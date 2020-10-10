<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $table="post";

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
