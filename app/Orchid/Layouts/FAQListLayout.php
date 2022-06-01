<?php

namespace App\Orchid\Layouts;

use App\Models\FAQ;
use Carbon\Carbon;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class FAQListLayout extends Table
{
    protected $target = 'f_a_q_s';
    protected function columns(): array
    {
        return [
            TD::make('title', 'Title')
                ->render(function (FAQ $faq){
                    return Link::make($faq->title)->route('platform.faq.edit', $faq);
                })->filter(TD::FILTER_TEXT),
            TD::make('enabled', 'Enabled')->render(function(FAQ $faq){
                return $faq->enabled ? 'Enabled' : 'Disabled';
            }),
            TD::make('created_at', 'Created')->render(function(FAQ $faq){
                return $faq->created_at ? Carbon::parse($faq->created_at)->diffForHumans() : '-';
            }),
            TD::make('update_at', 'Latest update')->render(function(FAQ $faq){
                return $faq->updated_at ? Carbon::parse($faq->updated_at)->diffForHumans() : '-';
            }),
        ];
    }
}
