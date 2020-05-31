<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function image(){
        return $this->morphOne('App\Image','imageable');
    }

    public function shares(){
        return $this->morphMany('App\Share','shareable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }
}
