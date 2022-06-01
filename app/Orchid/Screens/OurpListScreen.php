<?php

namespace App\Orchid\Screens;

use App\Models\Ourp;
use App\Orchid\Layouts\OurpLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class OurpListScreen extends Screen
{
    public $name = 'Наши люди';
    public $description = 'CUP - Наши люди';

    public function query(): array{
        return [
            'ourp' => Ourp::paginate()
        ];
    }

    public function commandBar(): array{
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.ourp.edit'),
        ];
    }

    public function layout(): array{
        return [
            OurpLayoutsScreen::class
        ];
    }
}
