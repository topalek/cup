<?php

namespace App\Orchid\Layouts;

use App\Models\CategoryStylevz;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;

class CategoryPortfolioSTVListLayout extends Table
{
    protected $target = 'categoriesportvz';
    protected function columns(): array
    {
        return [
            TD::make('name', 'Название')->render(function (CategoryStylevz $categoryport){
                return Link::make($categoryport->name)->route('platform.categoryportfoliovz.edit', $categoryport);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('active', 'Active')->render(function(CategoryStylevz $categoryport){
                return $categoryport->active ? 'Active' : 'Inactive';
            })
        ];
    }
}
