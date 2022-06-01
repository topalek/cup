<?php

namespace App\Orchid\Layouts;

use App\Models\Garantkachestva;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;

class GarKachLayoutsScreen extends Table
{
    protected $target = 'garkach';
    protected function columns(): array{
        return [
            TD::make('id', 'ID')
                ->width('100')
                ->render(function(Garantkachestva $el){
                  $img = $el->glimg()->first();
                if($img!=null){
                  $img = $el->glimg()->first()->url();
                };
                return $img!='' ? view('extra.image', ['path' => $img]) : '';
            }),
            TD::make('title', 'Заголовок')->render(function (Garantkachestva $el){
                return Link::make($el->title)->route('platform.garkach.edit', $el);
            }),
            TD::make('active', 'Отображать на сайте')->render(function(Garantkachestva $el){
                return $el->active ? 'Да' : 'Нет';
            })
        ];
    }
}
