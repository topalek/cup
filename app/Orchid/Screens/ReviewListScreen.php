<?php

namespace App\Orchid\Screens;

use App\Models\Review;
use App\Orchid\Layouts\ReviewListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class ReviewListScreen extends Screen
{
    public $name = 'Отзывы';
    public $description = 'CUP - Отзывы';

    public function query(): array{
        return [
            'reviews' => Review::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.review.edit')
        ];
    }

    public function layout(): array
    {
        return [
            ReviewListLayout::class
        ];
    }
}
