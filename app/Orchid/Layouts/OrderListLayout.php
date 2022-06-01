<?php

namespace App\Orchid\Layouts;

use App\Models\Order;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class OrderListLayout extends Table
{
    protected $target = 'orders';
    protected function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->render(function (Order $order) {
                    return Link::make($order->id)->route('platform.order.edit', $order);
                })
                ->sort()
                ->filter(TD::FILTER_TEXT),
            TD::make('client_name', 'Имя')->render(function (Order $order) {
                return Link::make($order->client_name)->route('platform.order.edit', $order);
            })->filter(TD::FILTER_TEXT),
            TD::make('client_phone', 'Телефон')->render(function (Order $order) {
                return Link::make($order->client_phone)->route('platform.order.edit', $order);
            }),
            TD::make('event_date', 'Дата мероприятия')
                ->render(function (Order $order) {
                    return $order->event_date?->format('d.m.Y');
                })
                ->sort()
                ->filter(TD::FILTER_DATE),
            TD::make('status', 'Статус')
                ->render(function (Order $order) {
                    return $order->status_name;
                })
                ->sort()
                ->filter(TD::FILTER_TEXT),
//            TD::make('id', 'Id')
//                ->sort()
//                ->filter(Input::make()),
//            TD::make('name', 'Имя')->render(function (Order $order) {
//                return Link::make($order->name)->route('platform.orders.editItem', $order);
//            }),
            TD::make('payment_type', 'Способ оплаты')
                ->filter(TD::FILTER_TEXT)
                ->render(function (Order $order) {
                    return '<span class="">' . $order->payment_type . '</span>';
                }),
            TD::make('created_at', 'Дата создания')->render(function (Order $order) {
                return $order->created_at->format('d.m.Y H:i');
            }),
        ];
    }
}
