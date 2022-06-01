<?php

namespace App\Orchid\Screens;

use App\Models\Portfolio;
use App\Orchid\Layouts\PortfolioListLayout;
use App\Orchid\Layouts\ProductListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;


class PortfolioListScreen extends Screen
{
  public $name = 'Портфолио';
  public $description = 'Портфолио мероприятий';

  public function query(): array
  {
      return [
          'portfolio' => Portfolio::filters()->defaultSort('id')->paginate()
      ];
  }

  public function commandBar(): array
  {
      return [
          Link::make('Создать портфолио')
              ->icon('plus')
              ->route('platform.portfolio.edit')
      ];
  }

  public function layout(): array
  {
      return [
          PortfolioListLayout::class
      ];
  }
}
