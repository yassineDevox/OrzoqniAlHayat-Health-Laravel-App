<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'imgName',
    ];

    public function post(){
        return $this->hasOne(Post::class);
    }
}
