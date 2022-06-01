<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;

class Catformat extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public $timestamps = false;
    protected $fillable = ['title','desc','url','active'];
    public function hero(){
      return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }
    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }
    public function formatel(){
      return $this->belongsToMany(Format::class);
    }
}
