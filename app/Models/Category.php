<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Category extends Model
{
    use AsSource;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
    protected $fillable = ['name', 'url', 'active'];

    public function productel(){
      return $this->belongsToMany(Product::class);
      //return $this->belongsToMany('App\Product','category_product','category_id','product_id');
    }

    /*public function scopeActive(Builder $query){
        return $query->select([ '*' ])->where('active', 1)->get();
    }*/
    /*public function scopeRes(Builder $query, $restaurant) { 
      return $query ->select([ 'menu_categories.*' ]) ->join('restaurants', 'restaurants.id', '=', 'menu_categories.restaurant_id') ->where('restaurants.restaurant_name', '=', $restaurant) ->get(); }*/
}
