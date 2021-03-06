<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class CategoryGR extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public $timestamps = false;
    protected $fillable = ['name', 'url', 'active'];

    public function hero3()
    {
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }

    public function photos()
    {
        return $this->hasMany(Attachment::class)->where('group', 'photos');
    }
}
