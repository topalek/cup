<?php

namespace App\Orchid\Layouts;

use App\Models\Notice;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class NoticeListLayout extends Table
{
    protected $target = 'notices';

    protected function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->render(function (Notice $notice) {
                    return Link::make($notice->id)->route('platform.notice.edit', $notice);
                })
                ->sort()
                ->filter(TD::FILTER_TEXT),
            TD::make('title', 'Название')->render(function (Notice $notice) {
                return Link::make($notice->title)->route('platform.notice.edit', $notice);
            })->filter(TD::FILTER_TEXT),

            TD::make('created_at', 'Дата создания')->render(function (Notice $notice) {
                return $notice->created_at->format('d.m.Y H:i');
            }),
        ];
    }
}
