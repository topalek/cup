<?php

namespace App\Orchid\Screens;

use App\Models\Productgr;
use App\Orchid\Layouts\ProdGRListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class ProdGRListScreen extends Screen
{
  public $name = 'Готовые решения';
  public $description = 'Shop products';

  public function query(): array
  {
      return [
          'productsgr' => Productgr::filters()->defaultSort('id')->paginate()
      ];
  }

  public function commandBar(): array
  {
      return [
          Link::make('Создать готовое решение')
              ->icon('plus')
              ->route('platform.prodgr.edit')
      ];
  }

  public function layout(): array
  {
      return [
          ProdGRListLayout::class
      ];
  }
}
