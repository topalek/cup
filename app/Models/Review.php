<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Review extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public function getShortTextAttribute()
    {
        return Str::limit($this->text, 150, $end = '...');
    }
    public function getHumanDateAttribute()
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

    protected $fillable = [
        'name','text','active','url','h1','title','description','keywords','hero'
    ];

    public function photos(){
      return $this->hasMany(Attachment::class)->where('group','photos');
    }

    public function glimg(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }

    public function portfitems(){
      return $this->belongsToMany(Portfolio::class);
    }
    public function formatel(){
      return $this->belongsToMany(Format::class);
    }
}
