<?php

namespace App\Orchid\Screens;

use App\Models\Catformat;
use App\Orchid\Layouts\CatFormatLayoutsScreen;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class CatFormatListScreen extends Screen
{
    public $name = 'Категория форматов';
    public $description = 'Магазин - категория форматов';

    public function query(): array{
        return [
            'catformati' => Catformat::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать ')
                ->icon('plus')
                ->route('platform.catformati.edit')
        ];
    }

    public function layout(): array{
        return [
          CatFormatLayoutsScreen::class
        ];
    }
}
