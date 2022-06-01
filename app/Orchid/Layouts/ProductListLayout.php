<?php

namespace App\Orchid\Layouts;

use App\Models\Product;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProductListLayout extends Table
{
    protected $target = 'products';
    protected function columns(): array
    {
        return [
            TD::make('id', 'ID')
                ->width('150')
                ->render(function(Product $product){
                    $img = $product->hero()->first();

                return $img ? view('extra.image', ['path' => $product->hero()->first()->url()]) : '';
            }),
            TD::make('name', 'Name')->render(function (Product $product){
                return Link::make($product->name)->route('platform.product.edit', $product);
            })->filter(TD::FILTER_TEXT),
            /*TD::make('category_id', 'Category')->render(function (Product $product){
                return $product->category()->first()->name;
            }),*/
            TD::make('active', 'Active')->render(function (Product $product){
                return $product->active ? 'Active' : 'Inactive';
            }),
        ];
    }
}
