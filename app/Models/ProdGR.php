<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class ProdGR extends Model
{
  use HasFactory, AsSource, Attachable, Filterable;

  public function categoryprodgr(){
      //dd($this->belongsTo(Category::class));
      return $this->belongsTo(CategoryGR::class);
      
  }

  public $timestamps = false;
  protected $fillable = [
      'name','description','url','price_per_unit','price_full','composition','weight_per_unit','weight_full',
      'protein','fat','carbohydrates','tooltip1','tooltip2','tooltip3','tooltip4','active','hero','countpr','popular'
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
}
