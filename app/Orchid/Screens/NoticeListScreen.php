<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Orchid\Layouts\OrderListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class NoticeListScreen extends Screen
{
    public $name = 'Заказы';
    public $description = 'CUP - Заказы';

    public function query(): array
    {
        return [
            'notices' => Order::filters()->defaultSort('id')->paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать заказ')
                ->icon('plus')
                ->route('platform.notice.edit')
        ];
    }

    public function layout(): array
    {
        return [
            OrderListLayout::class,
        ];
    }
}
