<?php

namespace App\Orchid\Layouts;

use App\Models\Review;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ReviewListLayout extends Table
{
    protected $target = 'reviews';
    // Name, Text, Active
    protected function columns(): array
    {
        return [
            TD::make('name', 'Имя автора')->render(function (Review $review){
                return Link::make($review->name)->route('platform.review.edit', $review);
            })->filter(TD::FILTER_TEXT),
            TD::make('url', 'URL'),
            TD::make('text', 'Текст')
                ->width('50%')
                ->render(function(Review $review){
                return $review->short_text ?? '-';
            }),
            TD::make('active', 'Показать на сайте')->render(function(Review $review){
                return $review->active ? 'Да' : 'Нет';
            })
        ];
    }
}
