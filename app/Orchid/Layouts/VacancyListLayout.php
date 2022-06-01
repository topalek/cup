<?php

namespace App\Orchid\Layouts;

use App\Models\Vacancy;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VacancyListLayout extends Table
{
    protected $target = 'vacancies';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Название')->render(function (Vacancy $vacancy){
                return Link::make($vacancy->title)->route('platform.vacancy.edit', $vacancy);
            })->filter(TD::FILTER_TEXT),
            TD::make('city', 'Город'),
            TD::make('salary_format', 'Зарплата'),
            TD::make('active', 'Показывать на сайте')->render(function(Vacancy $vacancy){
                return $vacancy->active ? 'Да' : 'Нет';
            })
        ];
    }
}
