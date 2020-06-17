<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable= [
        'title',
        'body',
    ];
    public function image(){
        return $this->hasMany(Image::class);
    }
}
