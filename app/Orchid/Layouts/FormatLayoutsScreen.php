<?php

namespace App\Orchid\Layouts;

use App\Models\Format;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FormatLayoutsScreen extends Table
{
    protected $target = 'formati';
    protected function columns(): array{
        return [
            TD::make('id', 'ID')
                ->width('100')
                ->render(function(Format $el){
                  $img = $el->glimg()->first();
                if($img!=null){
                  $img = $el->glimg()->first()->url();
                };
                return $img!='' ? view('extra.image', ['path' => $img]) : '';
            }),
            TD::make('title', 'Название')->render(function (Format $formati){
                return Link::make($formati->title)->route('platform.formati.edit', $formati);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('active', 'Показывать на сайте')->render(function (Format $formati){
                return $formati->active ? 'Да' : 'Нет';
            }),
        ];
    }
}
