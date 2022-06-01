<?php

namespace App\Orchid\Layouts;

use App\Models\Slidergl;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class SliderglLayoutsScreen extends Table
{
    protected $target = 'slidergl';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Заголовок')->render(function (Slidergl $slider){
                return Link::make($slider->title)->route('platform.slider.edit', $slider);
            }),
            TD::make('active', 'Показывать на сайте')->render(function(Slidergl $slider){
                return $slider->active ? 'Да' : 'Нет';
            })
        ];
    }
}
