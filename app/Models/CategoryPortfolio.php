<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class CategoryPortfolio extends Model
{
  use AsSource;

  public function portfolio(){
      return $this->hasMany(Portfolio::class);
  }

  public $timestamps = false;
  protected $fillable = ['name', 'url', 'active'];

  public function portfolioel(){
    return $this->belongsToMany(Portfolio::class);
    //return $this->belongsToMany('App\Product','category_product','category_id','product_id');
  }
}
