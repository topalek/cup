<?php

namespace App\Orchid\Layouts;

use App\Models\Ourp;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;


class OurpLayoutsScreen extends Table
{
    protected $target = 'ourp';
    protected function columns(): array{
        return [
            TD::make('id', 'ID')
                ->width('100')
                ->render(function(Ourp $el){
                  $img = $el->attachment()->first();
                if($img!=null){
                  $img = $el->attachment()->first()->url();
                };
                return $img!='' ? view('extra.image', ['path' => $img]) : '';
            }),
            TD::make('title', 'Имя')->render(function (Ourp $el){
                return Link::make($el->title)->route('platform.ourp.edit', $el);
            }),
            TD::make('active', 'Отображать на сайте')->render(function(Ourp $el){
                return $el->active ? 'Да' : 'Нет';
            })
        ];
    }
}
