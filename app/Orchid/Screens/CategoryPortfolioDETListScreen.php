<?php

namespace App\Orchid\Screens;

use App\Models\CategoryStyledet;
use App\Orchid\Layouts\CategoryPortfolioDETListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;



class CategoryPortfolioDETListScreen extends Screen
{
  public $name = 'Стили для детского стола';
  public $description = 'Категории стилей для детского стола';

  public function query(): array
  {
      return [
          'categoriesportdet' => CategoryStyledet::paginate()
      ];
  }

  public function commandBar(): array
  {
      return [
          Link::make('Создать ')
              ->icon('plus')
              ->route('platform.categoryportfoliodet.edit')
      ];
  }

  public function layout(): array
  {
      return [
          CategoryPortfolioDETListLayout::class
      ];
  }
}
