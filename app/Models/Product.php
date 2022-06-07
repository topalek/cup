<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * @property $id
 * @property $name
 * @property $description
 * @property $url
 * @property $price_per_unit
 * @property $price_full
 * @property $composition
 * @property $weight_per_unit
 * @property $weight_full
 * @property $protein
 * @property $fat
 * @property $carbohydrates
 * @property $tooltip1
 * @property $tooltip2
 * @property $tooltip3
 * @property $tooltip4
 * @property $active
 * @property $hero
 * @property $countpr
 * @property $popular
*/

class Product extends Model
{
    use HasFactory, AsSource, Attachable, Filterable;

    public function category(){
        //dd($this->belongsTo(Category::class));
        return $this->belongsTo(Category::class);

    }

    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'description',
        'url',
        'price_per_unit',
        'price_full',
        'composition',
        'weight_per_unit',
        'weight_full',
        'protein',
        'fat',
        'carbohydrates',
        'tooltip1',
        'tooltip2',
        'tooltip3',
        'tooltip4',
        'active',
        'hero',
        'countpr',
        'popular'
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

    public function hero(){
        return $this->hasOne(Attachment::class, 'id', 'hero')->withDefault();
    }

    public function photos(){
        return $this->hasMany(Attachment::class)->where('group','photos');
    }

    public function categoryel()
    {
        return $this->belongsToMany(Category::class);
        //return $this->belongsToMany('App\Category','category_product','product_id','category_id');
    }

    public function prodgr()
    {
        return $this->belongsToMany(Productgr::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_products', 'parent_id', 'product_id')->with('hero');
    }

    public function parents()
    {
        return $this->belongsToMany(Product::class, 'product_products', 'product_id', 'parent_id')->with('hero');
    }

    public function getList(bool $includeSelf = false): array
    {
        $list = Product::whereNotIn('id', [$this->id])->pluck('name', 'id')->all();
        if ($includeSelf) {
            $list[$this->id] = $this->name;
        }
        ksort($list);
        return $list;
    }

    public function scopeNotSelf(Builder $query, $selfId)
    {
        return $query->whereNotIn('id', [$selfId]);
    }

}
