<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;


class Portfolio extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public function category_portfolio(){
      return $this->belongsTo(CategoryPortfolio::class);
    }

    public $timestamps = false;


    protected $fillable = [
      'name','url','kolperson','mestoprov','dataprov','formatprov',
      'linkvideo','active','oncenterslider','onstyleslider','doptxt'
    ];
    protected $allowedFilters = [
      'id', 'name', 'kolperson', 'mestoprov', 'dataprov','active','oncenterslider','onstyleslider'
    ];

    protected $allowedSorts = [
      'id', 'name', 'kolperson', 'mestoprov', 'dataprov','active'
    ];

    public function hero(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }

    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }

    public function categoryelportf(){
      return $this->belongsToMany(CategoryPortfolio::class);
      //return $this->belongsToMany('App\Category','category_product','product_id','category_id');
    }

    public function stylevzportf(){
      return $this->belongsToMany(CategoryStylevz::class);
    }
    public function styledetportf(){
      return $this->belongsToMany(CategoryStyledet::class);
    }

    public function revitems(){
      return $this->belongsToMany(Review::class);
    }

    /*public function attachment(){
      return $this->hasOne(Attachment::class)->withDefault();
  }*/
}
