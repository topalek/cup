<?php

namespace App\Orchid\Layouts;

use App\Models\Youtube;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class YoutubeLayoutsScreen extends Table
{
    protected $target = 'youtube';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Название')->render(function (Youtube $video){
                return Link::make($video->title)->route('platform.youtube.edit', $video);
            }),
            TD::make('link', 'Ссылка'),
            TD::make('active', 'Показать на сайте')->render(function(Youtube $video){
                return $video->active ? 'Да' : 'Нет';
            })
        ];
    }
}
