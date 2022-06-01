<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class SEO extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    protected $fillable = [
        'page', 'page_url', 'h1', 'title', 'description','keywords',
        'subtitle','fulldesc','phone','email','city','street','weekdays','weekend','link1',
        'link2','link3','doptitle1','doptxt1','doptitle2','doptxt2','doptxt3','codkarti',
        'codhtml','hero',
    ];
    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }
    public function glimg(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }
}
