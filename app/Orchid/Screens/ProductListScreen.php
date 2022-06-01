<?php

namespace App\Orchid\Screens;

use App\Models\Product;
use App\Orchid\Layouts\ProductListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class ProductListScreen extends Screen
{
    public $name = 'Продукты';
    public $description = 'Shop products';

    public function query(): array
    {
        return [
            'products' => Product::filters()->defaultSort('id')->paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать продукт')
                ->icon('plus')
                ->route('platform.product.edit'),
        ];
    }

    public function layout(): array
    {
        return [
            ProductListLayout::class
        ];
    }
}
