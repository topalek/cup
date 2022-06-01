<?php

namespace App\Orchid\Screens;

use App\Models\Povodi;
use App\Orchid\Layouts\PovLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class PovListScreen extends Screen
{
    public $name = 'Поводы';
    public $description = 'CUP - Поводы';

    public function query(): array{
        return [
            'povodi' => Povodi::paginate()
        ];
    }

    public function commandBar(): array{
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.povodi.edit')
        ];
    }

    public function layout(): array{
        return [
            PovLayoutsScreen::class
        ];
    }
}
