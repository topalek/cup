<?php

namespace App\Orchid\Screens;

use App\Models\Garantkachestva;
use App\Orchid\Layouts\GarKachLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class GarKachListScreen extends Screen
{
  public $name = 'Гарантия качества';
  public $description = 'CUP - Гарантия качества';

  public function query(): array{
      return [
          'garkach' => Garantkachestva::paginate()
      ];
  }

  public function commandBar(): array{
      return [
          Link::make('Создать')
              ->icon('plus')
              ->route('platform.garkach.edit'),
      ];
  }

  public function layout(): array{
      return [
          GarKachLayoutsScreen::class
      ];
  }
}