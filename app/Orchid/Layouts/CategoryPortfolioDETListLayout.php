<?php

namespace App\Orchid\Layouts;

use App\Models\CategoryStyledet;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;

class CategoryPortfolioDETListLayout extends Table
{
  protected $target = 'categoriesportdet';
  protected function columns(): array
  {
      return [
          TD::make('name', 'Название')->render(function (CategoryStyledet $categoryport){
              return Link::make($categoryport->name)->route('platform.categoryportfoliodet.edit', $categoryport);
          })->filter(TD::FILTER_TEXT),
          TD::make('url', 'URL'),
          TD::make('active', 'Active')->render(function(CategoryStyledet $categoryport){
              return $categoryport->active ? 'Active' : 'Inactive';
          })
      ];
  }
}
