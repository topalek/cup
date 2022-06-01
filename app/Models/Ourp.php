<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Ourp extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $fillable = [
        'title','dolzhn','desc','hero','active'
    ];

    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }

    public function glimg(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }
}


