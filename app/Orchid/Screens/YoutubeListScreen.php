<?php

namespace App\Orchid\Screens;

use App\Models\Youtube;
use App\Orchid\Layouts\YoutubeLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;


class YoutubeListScreen extends Screen
{
    public $name = 'Видео';
    public $description = 'Магазин - видео';

    public function query(): array{
        return [
            'youtube' => Youtube::paginate()
        ];
    }

    public function commandBar(): array{
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.youtube.edit')
        ];
    }

    public function layout(): array{
        return [
            YoutubeLayoutsScreen::class
        ];
    }
}
