<?php

namespace App\Orchid\Screens;

use App\Models\Catformat;
use App\Models\Format;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FormatEditScreen extends Screen
{
    public $name = 'Формат';
    public $description = 'CUP - Форматы';
    public $exists = false;

    public function query(Format $formati): array{
        $this->exists = $formati->exists;
        if($this->exists){
            $this->name = 'Редактировать формат';
        }
        $formati->load('attachment');
        return [
            'formati' => $formati
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
                    Input::make('formati.title')
                        ->title('Название формата')
                        ->placeholder('Название формата')
                        ->required(),
                    Input::make('formati.url')
                        ->title('URL адрес страницы')
                        ->required(),
                ]),
                Select::make('formati.catformatel.')
                    ->fromModel(Catformat::class, 'title')
                    ->multiple()
                    ->title('Категории форматов'),
                Group::make([
                    Quill::make('formati.shortdesc')
                        ->title('Краткое описание формата'),
                    Quill::make('formati.desc')
                        ->title('Подробное описание формата'),
                ]),
                Input::make('formati.linkvideo')
                    ->title('Ссылка на видео')
                    ->placeholder('Ключ видео с ютуб'),
                Switcher::make('formati.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])->title('Основная информация'),
            Layout::rows([
                Group::make([
                    Upload::make('formati.attachment')
                        ->title('Фотографии')
                        ->groups('photos'),
                    Cropper::make('formati.hero')
                        ->targetId()
                        ->title('Фото на анонс')
                        ->width(500)
                        ->height(500)
                        ->help('Размер фото - 500x500'),
                ]),
            ])->title('Фото'),
        ];
    }

    public function createOrUpdate(Format $formati, Request $request)
    {
        $formati->fill($request->get('formati'))->save();
        Alert::info('You have successfully created.');

        // Удаление новой записи
        $catProdIds = array_filter($request->input('formati.catformatel', []), function ($v, $k) {
            return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);

        $formati->catformatel()->sync($catProdIds);

        // Удаление существующей записи
        $CatProd = array_filter($request->input('formati.catformatel', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);

        // Создать новый продукт
        if (count($CatProd) > 0) {
            $CatProdArr = [];
            foreach ($CatProd as $newCatProd) {
                $CatProdArr[] = new Format(['title' => $newCatProd]);
            }
            $formati->catformatel()->saveMany($CatProdArr);
        }
        $formati->attachment()->syncWithoutDetaching(
            $request->input('formati.attachment', [])
        );
        return redirect()->route('platform.formati.list');
    }

    public function remove(Format $formati){
        $formati->delete();
        Alert::info('You have successfully deleted format.');
        return redirect()->route('platform.formati.list');
    }
}
