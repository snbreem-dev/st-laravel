<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function products(){
        return $this->morphedByMany('App\Product','taggable');
    }

    public function phones(){
        return $this->morphedByMany('App\Phone','taggable');
    }
}
