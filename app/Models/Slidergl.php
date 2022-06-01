<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Slidergl extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    
    protected $fillable = [
        'title', 'desc', 'datepub', 'active'
    ];

    public function hero3(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
      }
  
      public function photos(){
          return $this->hasMany(Attachment::class)->where('group','photos');
      }

}
