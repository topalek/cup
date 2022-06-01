<?php

namespace App\Orchid\Screens;

use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class NoticeEditScreen extends Screen
{
    public $name = 'Заказ';
    public $description = 'CUP - Заказы';
    public $exists = false;
    public $order;

    public function query(Order $order): array
    {
        $this->exists = $order->exists;
        $this->order = $order;
        if ($this->exists) {
            $this->name = 'Редактировать заказ: #' . $order->id;
        }
        $order->load('products');
        return [
            'order' => $order
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Создать')
                ->icon('save-alt')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),
            Button::make('Сохранить')
                ->icon('save')
                ->method('createOrUpdate')
                ->canSee($this->exists),
            Button::make('Удалить')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
            Link::make('Назад')
                ->icon('arrow-left')
                ->route('platform.notice.list'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Group::make([
                    Input::make('order.client_name')
                        ->title('Имя')
                        ->required(),
                    Input::make('order.client_phone')
                        ->title('Телефон')
                        ->required(),

                    Select::make('order.status')
                        ->options(Order::getStatusList())
                        ->title('Статус')
                        ->required(),
                    Input::make('order.event_date')
                        ->type('date')
                        ->value(function ($order) {
                            $date = date('Y-m-d');
                            if($order instanceof  Carbon){
                                $date = $order->format('Y-m-d');
                            }
                            return $date;
                        })
                        ->title('Дата')
                        ->required(),

                ]),
                Group::make([
                    Input::make('order.reason')
                        ->title('Повод')
                        ->required(),
                    Input::make('order.format')
                        ->title('Формат')
                        ->required(),
                    Input::make('order.guest_count')
                        ->type('number')
                        ->title('Кол-во гостей'),
                ]),
                Group::make([
                    Input::make('order.city')
                        ->title('Город')
                        ->required(),
                    Input::make('order.street')
                        ->title('Улица')
                        ->required(),
                    Input::make('order.building')
                        ->title('Дом')
                        ->required(),

                    Input::make('order.payment_type')
                        ->title('Способ оплаты')
                        ->required(),
                ])
            ])->title('Основная информация'),
            Layout::view('order.products'),
            Layout::modal('products', [
                Layout::rows([
                    Select::make('product')
                        ->empty('- Выберите товар -')
                        ->fromModel(Product::class,'name','id')
                        ->title('Товар')
                        ->required(),
                    Input::make('count')
                        ->value(1)
                        ->type('number')
                        ->title('Кол-во'),
                    Input::make('id')
                        ->value($this->order->id)
                        ->type('hidden'),
                ]),
            ]),
        ];
    }

    public function createOrUpdate(Order $order, Request $request)
    {
        $order->fill($request->get('order'))->save();
        $order->attachment()->syncWithoutDetaching(
            $request->input('order.attachment', [])
        );
        Alert::info('You have successfully created.');
        return redirect()->route('platform.order.list');
    }

    public function remove(Order $order)
    {
        $order->delete();
        Alert::info('You have successfully deleted.');
        return redirect()->route('platform.order.list');
    }

}
