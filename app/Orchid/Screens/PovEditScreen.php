<?php

namespace App\Orchid\Screens;

use App\Models\Povodi;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PovEditScreen extends Screen
{
    public $name = 'Повод';
    public $description = 'CUP - Поводы';
    public $exists = false;

    public function query(Povodi $povodi): array{
        $this->exists = $povodi->exists;
        if($this->exists){
            $this->name = 'Редактировать повод';
        }
        $povodi->load('attachment');
        return [
            'povodi' => $povodi
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
                Group::make([
                    Input::make('povodi.title')
                        ->title('Заголовок')
                        ->placeholder('Заголовок')
                        ->required(),
                    Input::make('povodi.url')
                        ->title('URL - страницы')
                        ->required(),
                ]),
                Group::make([
                    Quill::make('povodi.shortdesc')
                        ->title('Краткое описание'),
                    Quill::make('povodi.desc')
                        ->title('Подробное описание'),
                ]),
                Input::make('povodi.linkvideo')
                    ->title('Ссылка на видео')
                    ->placeholder('ключ видео с ютуб'),
                Switcher::make('povodi.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])->title('Основная информация'),
            Layout::rows([
              Group::make([
                  Upload::make('povodi.attachment')
                      ->title('Фотографии')
                      ->groups('photos'),
                  Cropper::make('povodi.hero')
                      ->targetId()
                      ->title('Фото на анонс')
                      ->width(500)
                      ->height(500)
                      ->help('Размер фото - 500x500'),
              ]),
            ])->title('Фото'),
        ];
    }

    public function createOrUpdate(Povodi $povodi, Request $request){
        $povodi->fill($request->get('povodi'))->save();
        $povodi->attachment()->syncWithoutDetaching(
            $request->input('povodi.attachment', [])
        );
        Alert::info('You have successfully created a povod.');
        return redirect()->route('platform.povodi.list');
    }

    public function remove(Povodi $povodi){
        $povodi->delete();
        Alert::info('You have successfully deleted the povod.');
        return redirect()->route('platform.povodi.list');
    }
}
