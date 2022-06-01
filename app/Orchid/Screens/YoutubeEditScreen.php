<?php

namespace App\Orchid\Screens;

use App\Models\Youtube;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class YoutubeEditScreen extends Screen
{
    public $name = 'Видео';
    public $description = 'Магазин - видео';
    public $exists = false;

    public function query(Youtube $video): array
    {
        $this->exists = $video->exists;
        if($this->exists){
            $this->name = 'Редактировать видео';
        }
        return [
            'youtubevideo' => $video
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

                Input::make('youtubevideo.title')
                    ->title('Название')
                    ->placeholder('Название для видео')
                    ->required(),
                Input::make('youtubevideo.link')
                    ->title('Ссылка на видео')
                    ->placeholder('Ключ с адреса ЮТУБ')
                    ->required(),
                Quill::make('youtubevideo.coment')
                    ->title('Описание')
                    ->required(),
                Switcher::make('youtubevideo.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(Youtube $video, Request $request){
        $video->fill($request->get('youtubevideo'))->save();
        Alert::info('You have successfully created a video.');
        return redirect()->route('platform.youtube.list');
    }

    public function remove(Youtube $video)
    {
        $video->delete();
        Alert::info('You have successfully deleted the video.');
        return redirect()->route('platform.youtube.list');
    }
}
