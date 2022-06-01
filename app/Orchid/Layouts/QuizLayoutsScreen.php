<?php

namespace App\Orchid\Layouts;

use App\Models\Quiz;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class QuizLayoutsScreen extends Table
{
    protected $target = 'quiz';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Заголовок')->render(function (Quiz $el){
                return Link::make($el->title)->route('platform.quiz.edit', $el);
            })->filter(TD::FILTER_TEXT),
            TD::make('name', 'Системное название'),
            TD::make('price', 'Цена'),
            TD::make('active', 'Показать на сайте')->render(function(Quiz $el){
                return $el->active ? 'Да' : 'Нет';
            })
        ];
    }
}
