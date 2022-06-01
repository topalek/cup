<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;


class Quiz extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'title','name','price','active'
    ];
    protected $allowedFilters = [
        'title','name','price'
    ];
    protected $allowedSorts = [
        'title','name','price'
    ];
}


