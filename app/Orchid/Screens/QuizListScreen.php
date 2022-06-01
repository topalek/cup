<?php

namespace App\Orchid\Screens;

use App\Models\Quiz;
use App\Orchid\Layouts\QuizLayoutsScreen;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class QuizListScreen extends Screen
{
    public $name = 'Quiz';
    public $description = 'CUP - Quiz';

    public function query(): array{
        return [
            'quiz' => Quiz::filters()->defaultSort('id')->paginate()
        ];
    }

    public function commandBar(): array{
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.quiz.edit')
        ];
    }

    public function layout(): array{
        return [
            QuizLayoutsScreen::class
        ];
    }
}
