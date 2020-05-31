<?php

namespace App;

use App\Scopes\ProductScope;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected static function boot()
    {
        parent::boot();
        //static::addGlobalScope(new ProductScope);
    }

    //protected $fillable= ['name','category_id','price','short_description','currency_code','supplier_id','discount','details'];
    protected $guarded = [];

    public function comments(){
        return$this->hasMany('App\Comment');
    }

    public function shares(){
        return $this->morphMany('App\Share','shareable');
    }

    public function tags(){
        return $this->morphToMany('App\Tag','taggable');
    }

    public function sales(){
        return rand(10,50);
    }

    public function scopeDiscount($query){
        return $query->where('discount','>=', 50);
    }

    public function scopeStars($query){
        return $query->where('stars','>=',4);
    }

    public function scopeCurrency($query,$currency){
        return $query->where('currency_code', $currency);
    }

}
