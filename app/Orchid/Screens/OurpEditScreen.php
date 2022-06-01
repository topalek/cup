<?php

namespace App\Orchid\Screens;

use App\Models\Ourp;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class OurpEditScreen extends Screen
{
    public $name = 'Наши люди';
    public $description = 'CUP - Наши люди';
    public $exists = false;

    public function query(Ourp $el): array{
        $this->exists = $el->exists;
        if($this->exists){
            $this->name = 'Редактировать';
        }
        $el->load('attachment');
        return [
            'ourpitem' => $el
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
                    Input::make('ourpitem.title')
                        ->title('Имя')
                        ->required(),
                    Input::make('ourpitem.dolzhn')
                        ->title('Должность')
                        ->required(),
                ]),
                TextArea::make('ourpitem.desc')
                    ->title('Описание')
                    ->rows(5),
                Upload::make('ourpitem.attachment')
                    ->title('Фотография')
                    ->groups('photos')
                    ->help('Фото сотрудника'),
                Switcher::make('ourpitem.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])->title('Основная информация'),
        ];
    }

    public function createOrUpdate(Ourp $el, Request $request){
        $el->fill($request->get('ourpitem'))->save();
        $el->attachment()->syncWithoutDetaching(
            $request->input('ourpitem.attachment', [])
        );
        Alert::info('You have successfully created.');
        return redirect()->route('platform.ourp.list');
    }

    public function remove(Ourp $el){
        $el->delete();
        Alert::info('You have successfully deleted.');
        return redirect()->route('platform.ourp.list');
    }
}
