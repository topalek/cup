<?php

namespace App\Orchid\Screens;

use App\Models\Quiz;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class QuizEditScreen extends Screen
{
    public $name = 'Quiz';
    public $description = 'CUP - Quiz';
    public $exists = false;

    public function query(Quiz $el): array
    {
        $this->exists = $el->exists;
        if($this->exists){
            $this->name = 'Редактировать';
        }
        return [
            'quizitem' => $el
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
                Input::make('quizitem.title')
                    ->title('Заголовок')
                    ->placeholder('Фуршет')
                    ->required(),
                Input::make('quizitem.name')
                    ->title('Системное название')
                    ->required(),
                Input::make('quizitem.price')
                    ->title('Цена')
                    ->required(),
                Switcher::make('quizitem.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(Quiz $el, Request $request){
        $el->fill($request->get('quizitem'))->save();
        Alert::info('You have successfully created a quizitem.');
        return redirect()->route('platform.quiz.list');
    }

    public function remove(Quiz $el){
        $el->delete();
        Alert::info('You have successfully deleted the quizitem.');
        return redirect()->route('platform.quiz.list');
    }
}
