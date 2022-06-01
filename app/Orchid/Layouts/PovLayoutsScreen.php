<?php

namespace App\Orchid\Layouts;

use App\Models\Povodi;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PovLayoutsScreen extends Table{
    protected $target = 'povodi';
    protected function columns(): array{
        return [
            TD::make('id', 'ID')
                ->width('100')
                ->render(function(Povodi $el){
                  $img = $el->glimg()->first();
                if($img!=null){
                  $img = $el->glimg()->first()->url();
                };
                return $img!='' ? view('extra.image', ['path' => $img]) : '';
            }),
            TD::make('title', 'Заголовок')->render(function (Povodi $povodi){
                return Link::make($povodi->title)->route('platform.povodi.edit', $povodi);
            }),
            TD::make('url', 'URL'),
            TD::make('active', 'Отображать на сайте')->render(function(Povodi $povodi){
                return $povodi->active ? 'Да' : 'Нет';
            })
        ];
    }
}
