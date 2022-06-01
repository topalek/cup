<?php

namespace App\Orchid\Screens;

use App\Models\Vacancy;
use App\Orchid\Layouts\VacancyListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class VacancyListScreen extends Screen
{
    public $name = 'Вакансии';
    public $description = 'CUP - Вакансии';

    public function query(): array
    {
        return [
            'vacancies' => Vacancy::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.vacancy.edit')
        ];
    }

    public function layout(): array
    {
        return [
            VacancyListLayout::class
        ];
    }
}
