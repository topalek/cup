<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;

class CategoryStylevz extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public $timestamps = false;
    protected $fillable = ['name','url','active','shortdesc','desc'];

    public function hero3(){
      return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }

    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }

    public function portfolioel(){
      return $this->belongsToMany(Portfolio::class);
      //return $this->belongsToMany('App\Product','category_product','category_id','product_id');
    }
    public function grel(){
      return $this->belongsToMany(Productgr::class);
    }
}
