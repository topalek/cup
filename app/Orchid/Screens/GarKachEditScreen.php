<?php

namespace App\Orchid\Screens;

use App\Models\Garantkachestva;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class GarKachEditScreen extends Screen
{
    public $name = 'Гарантия качества';
    public $description = 'CUP - Гарантия качества';
    public $exists = false;

    public function query(Garantkachestva $el): array{
        $this->exists = $el->exists;
        if($this->exists){
            $this->name = 'Редактировать';
        }
        $el->load('attachment');
        return [
            'garkachitem' => $el
        ];
    }

    public function commandBar(): array{
        return [
            Button::make('Создать')
                ->icon('save-alt')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),
            Button::make('Сохранить')
                ->icon('save')
                ->method('createOrUpdate')
                ->canSee($this->exists),
            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    public function layout(): array{
        return [
            Layout::rows([
              Input::make('garkachitem.title')
                  ->title('Заголовок')
                  ->placeholder('Заголовок')
                  ->required(),
              Cropper::make('garkachitem.hero')
                  ->targetId()
                  ->title('Фото на анонс')
                  ->width(500)
                  ->height(500)
                  ->help('Размер фото - 500x500'),
              Switcher::make('garkachitem.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
            ])->title('Основная информация'),
        ];
    }

    public function createOrUpdate(Garantkachestva $el, Request $request){
        $el->fill($request->get('garkachitem'))->save();
        $el->attachment()->syncWithoutDetaching(
            $request->input('garkachitem.attachment', [])
        );
        Alert::info('You have successfully created.');
        return redirect()->route('platform.garkach.list');
    }

    public function remove(Garantkachestva $el){
        $el->delete();
        Alert::info('You have successfully deleted.');
        return redirect()->route('platform.garkach.list');
    }
}
