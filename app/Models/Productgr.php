<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Productgr extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public function cataloggr(){
        //dd($this->belongsTo(Cataloggr::class));
        return $this->belongsTo(Cataloggr::class);
        
    }
  
    public $timestamps = false;
    protected $fillable = [
        'name','description','url','price_per_unit','price_full','composition','weight_per_unit','weight_full',
        'protein','fat','carbohydrates','tooltip1','tooltip2','tooltip3','tooltip4','active','hero','countpr','popular',
        'sp1','sp2','sp3','sp4','sp5','naborot'
        
    ];
    protected $allowedFilters = [
        'id', 'name', 'price_per_unit', 'price_full', 'active'
    ];
  
    /**
     * @var array
     */
    protected $allowedSorts = [
        'id', 'name', 'price_per_unit', 'price_full','active'
    ];
  
    public function hero4(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }
    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }
    public function cataloggrel(){
        return $this->belongsToMany(Cataloggr::class);
    }
    public function stylevzgr(){
      return $this->belongsToMany(CategoryStylevz::class);
    }
    public function styledetgr(){
      return $this->belongsToMany(CategoryStyledet::class);
    }
    public function products(){
      return $this->belongsToMany(Product::class,'product_productgr');
    }
    public function products2(){
        return $this->belongsToMany(Product::class,'product_productgr_2');
    }
    public function products3(){
        return $this->belongsToMany(Product::class,'product_productgr_3');
    }
    public function products4(){
        return $this->belongsToMany(Product::class,'product_productgr_4');
    }
    public function products5(){
      return $this->belongsToMany(Product::class,'product_productgr_5');
  }
}
