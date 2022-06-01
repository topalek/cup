<?php

namespace App\Orchid\Screens;

use App\Models\Format;
use App\Orchid\Layouts\FormatLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class FormatListScreen extends Screen
{
    public $name = 'Форматы';
    public $description = 'CUP - Форматы';

    public function query(): array{
        return [
            'formati' => Format::filters()->defaultSort('id')->paginate()
        ];
    }

    public function commandBar(): array{
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.formati.edit'),
        ];
    }

    public function layout(): array{
        return [
            FormatLayoutsScreen::class
        ];
    }
}
