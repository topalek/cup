<?php

namespace App\Orchid\Screens;

use App\Models\Catformat;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CatFormatEditScreen extends Screen
{
    public $name = 'Категория формата';
    public $description = 'Магазин - категория формата';
    public $exists = false;

    public function query(Catformat $catformati): array
    {
        $this->exists = $catformati->exists;
        if($this->exists){
            $this->name = 'Редактировать категорию';
        }
        $catformati->load('attachment');
        return [
            'catformati' => $catformati
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Создать')
                ->icon('save-alt')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Сохранить')
                ->icon('save')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('catformati.title')
                    ->title('Название')
                    ->placeholder('Название категории')
                    ->required(),
                Input::make('catformati.url')
                    ->title('URL')
                    ->placeholder('URL адрес страницы'),
                Quill::make('catformati.desc')
                    ->title('Краткое описание категории'),
                Upload::make('catformati.attachment')
                    ->title('Фотографии')
                    ->groups('photos'),
                Switcher::make('catformati.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(Catformat $catformati, Request $request)
    {
        $catformati->fill($request->get('catformati'))->save();
        $catformati->attachment()->syncWithoutDetaching(
          $request->input('catformati.attachment', [])
        );
        Alert::info('You have successfully created an category.');
        return redirect()->route('platform.catformati.list');
    }

    public function remove(Catformat $catformati)
    {
        $catformati->delete();
        Alert::info('You have successfully deleted the category.');
        return redirect()->route('platform.catformati.list');
    }
}
