<?php

namespace App\Orchid\Layouts;

use App\Models\Catformat;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;

class CatFormatLayoutsScreen extends Table
{
    protected $target = 'catformati';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Название')->render(function (Catformat $catformati){
                return Link::make($catformati->title)->route('platform.catformati.edit', $catformati);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('active', 'Показывать на сайте')->render(function(Catformat $catformati){
                return $catformati->active ? 'Да' : 'Нет';
            })
        ];
    }
}
