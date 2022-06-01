<?php

namespace App\Orchid\Layouts;

use App\Models\Cataloggr;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class CategoryGRListLayout extends Table
{
  protected $target = 'categoriesgr';
  protected function columns(): array
  {
      return [
          TD::make('name', 'Название')->render(function (Cataloggr $categoryport){
              return Link::make($categoryport->name)->route('platform.categorygr.edit', $categoryport);
          }),
          TD::make('url', 'URL'),
          TD::make('active', 'Active')->render(function(Cataloggr $categoryport){
              return $categoryport->active ? 'Active' : 'Inactive';
          })
      ];
  }
}
