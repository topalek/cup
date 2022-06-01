<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Vacancy extends Model
{
    use HasFactory, AsSource;

    public function getPublishedAttribute()
    {
        return date('d.m.Y', strtotime($this->updated_at));
    }
    public function getSalaryFormatAttribute()
    {
        return number_format($this->salary, 0, ',', ' ');
    }

    protected $fillable = [
        'title','experience','workload_short','workload_full',
        'city','salary','responsibility','requirements',
        'conditions','active','datepub','url','description','keywords'
    ];
}
