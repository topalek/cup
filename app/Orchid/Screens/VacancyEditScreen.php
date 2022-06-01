<?php

namespace App\Orchid\Screens;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class VacancyEditScreen extends Screen
{
    public $name = 'Вакансия';
    public $description = 'CUP - Вакансии';
    public $exists = false;

    public function query(Vacancy $vacancy): array
    {
        $this->exists = $vacancy->exists;
        if($this->exists){
            $this->name = 'Редактировать вакансию';
        }
        return [
            'vacancy' => $vacancy
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
                Group::make([
                    Input::make('vacancy.title')
                        ->title('Заголовок')
                        ->placeholder('Заголовок вакансии')
                        ->required(),
                    Input::make('vacancy.url')
                        ->title('URL - страницы')
                        ->required(),
                ]),
                Group::make([
                    TextArea::make('vacancy.description')
                        ->title('Описание - description')
                        ->rows(5),
                    TextArea::make('vacancy.keywords')
                        ->title('Ключевые слова - Keywords')
                        ->rows(5)
                        ->placeholder('Ключевые слова'),
                ]),
            ])->title('SEO'),
            Layout::rows([
                Group::make([
                    DateTimer::make('vacancy.datepub')
                        ->title('Дата публикации')
                        ->format('Y-m-d'),
                    Input::make('vacancy.experience')
                        ->title('Опыт')
                        ->placeholder('Опыт работы')
                        ->required(),
                    Input::make('vacancy.workload_short')
                        ->title('Занятость кратко')
                        ->required(),
                ]),
                Group::make([
                    Input::make('vacancy.workload_full')
                        ->title('Занятость подробно')
                        ->required(),
                    Input::make('vacancy.city')
                        ->title('Город')
                        ->required(),
                    Input::make('vacancy.salary')
                        ->title('Заработная плата')
                        ->help('Числом, например: 100000')
                        ->type('number')
                        ->required(),
                ]),
                Group::make([
                    Quill::make('vacancy.responsibility')
                        ->title('Обязанности')
                        ->required(),
                    Quill::make('vacancy.requirements')
                        ->title('Требования')
                        ->required(),
                    Quill::make('vacancy.conditions')
                        ->title('Условия')
                        ->required(),
                ]),
                Switcher::make('vacancy.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])->title('Основная информация')
        ];
    }

    public function createOrUpdate(Vacancy $vacancy, Request $request){
        $vacancy->fill($request->get('vacancy'))->save();
        Alert::info('You have successfully created a vacancy.');
        return redirect()->route('platform.vacancy.list');
    }

    public function remove(Vacancy $vacancy)
    {
        $vacancy->delete();
        Alert::info('You have successfully deleted the vacancy.');
        return redirect()->route('platform.vacancy.list');
    }
}
