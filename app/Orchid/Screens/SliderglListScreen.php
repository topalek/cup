<?php

namespace App\Orchid\Screens;

use App\Models\Slidergl;
use App\Orchid\Layouts\SliderglLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class SliderglListScreen extends Screen
{
    public $name = 'Слайдер';
    public $description = 'Shop slider';

    public function query(): array
    {
        return [
            'slidergl' => Slidergl::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.slider.edit')
        ];
    }

    public function layout(): array
    {
        return [
            SliderglLayoutsScreen::class
        ];
    }
}
