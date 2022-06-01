<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Cataloggr;
use App\Orchid\Layouts\CategoryGRListLayout;
use App\Orchid\Layouts\CategoryPortfolioListLayout;
use Orchid\Screen\Actions\Link;

class CategoryGRListScreen extends Screen
{
  public $name = 'Категории готовых решений';
  public $description = 'Категории готовых решений';

  public function query(): array
  {
      return [
          'categoriesgr' => Cataloggr::paginate()
      ];
  }

  public function commandBar(): array
  {
      return [
          Link::make('Создать')
              ->icon('plus')
              ->route('platform.categorygr.edit')
      ];
  }

  public function layout(): array
  {
      return [
          CategoryGRListLayout::class
      ];
  }
}
