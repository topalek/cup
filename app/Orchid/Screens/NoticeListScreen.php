<?php

namespace App\Orchid\Screens;

use App\Models\Notice;
use App\Orchid\Layouts\NoticeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NoticeListScreen extends Screen
{
    public $name = 'Уведомления';
    public $description = 'CUP - уведомления';

    public function query(): array
    {
        return [
            'notices' => Notice::filters()->defaultSort('id')->paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать уведомление')
                ->icon('plus')
                ->route('platform.notice.edit')
        ];
    }

    public function layout(): array
    {
        return [
            NoticeListLayout::class,
        ];
    }
}
