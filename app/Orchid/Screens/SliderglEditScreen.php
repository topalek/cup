<?php

namespace App\Orchid\Screens;

use App\Models\Slidergl;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class SliderglEditScreen extends Screen
{
    public $name = 'Слайдер';
    public $description = 'Shop slider';
    public $exists = false;

    public function query(Slidergl $slider): array{
        $this->exists = $slider->exists;
        if($this->exists){
            $this->name = 'Редактировать слайдер';
        }
        $slider->load('attachment');
        return [
            'sliderel' => $slider
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

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('sliderel.title')
                    ->title('Заголовок')
                    ->placeholder('Заголовок')
                    ->required(),
                Quill::make('sliderel.desc')
                    ->title('Описание')
                    ->required(),
                Input::make('sliderel.datepub')
                    ->title('Дата')
                    ->type('date'),
                Upload::make('sliderel.attachment')
                    ->title('Фотография')
                    ->groups('photos'),
                Switcher::make('sliderel.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(Slidergl $slider, Request $request){
        $slider->fill($request->get('sliderel'))->save();
        $slider->attachment()->syncWithoutDetaching(
            $request->input('sliderel.attachment', [])
        );
        Alert::info('You have successfully created a slider.');
        return redirect()->route('platform.slider.list');

    }

    public function remove(Slidergl $slider)
    {
        $slider->delete();
        Alert::info('You have successfully deleted the slider.');
        return redirect()->route('platform.slider.list');
    }
}
