<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;


class Format extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public $timestamps = false;
    protected $fillable = [
        'id','title','url','shortdesc','desc','linkvideo','active','hero'
    ];
    protected $allowedFilters = [
        'id','title','url','shortdesc','desc','linkvideo','active'
    ];
    protected $allowedSorts = [
        'id','title','url','shortdesc','desc','linkvideo','active'
    ];

    public function glimg(){
      return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }
    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }
    public function catformatel(){
      return $this->belongsToMany(Catformat::class);
    }
    public function revel(){
      return $this->belongsToMany(Review::class);
    }

}
