<?php

namespace App\Orchid\Layouts;

use App\Models\CategoryPortfolio;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryPortfolioListLayout extends Table
{
    protected $target = 'categoriesport';
    protected function columns(): array
    {
        return [
            TD::make('name', 'Название')->render(function (CategoryPortfolio $categoryport){
                return Link::make($categoryport->name)->route('platform.categoryedit.edit', $categoryport);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('active', 'Active')->render(function(CategoryPortfolio $categoryport){
                return $categoryport->active ? 'Active' : 'Inactive';
            })
        ];
    }
}
