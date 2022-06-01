<?php

namespace App\Orchid\Layouts;

use App\Models\Category;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryListLayout extends Table
{
    protected $target = 'categories';
    protected function columns(): array
    {
        return [
            TD::make('name', 'Name')->render(function (Category $category){
                return Link::make($category->name)->route('platform.category.edit', $category);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('active', 'Active')->render(function(Category $category){
                return $category->active ? 'Active' : 'Inactive';
            })
//            TD::make('created_at','Created'),
//            TD::make('updated_at', 'Last edit'),
        ];
    }
}
