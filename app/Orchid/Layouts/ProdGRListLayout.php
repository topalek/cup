<?php

namespace App\Orchid\Layouts;

use App\Models\Productgr;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class ProdGRListLayout extends Table
{
  protected $target = 'productsgr';
  protected function columns(): array
  {
      return [
          TD::make('id', 'ID')
              ->width('150')
              ->render(function(Productgr $product){
                  $img = $product->hero4()->first();

              return $img ? view('extra.image', ['path' => $product->hero4()->first()->url()]) : '';
          }),
          TD::make('name', 'Name')->render(function (Productgr $product){
              return Link::make($product->name)->route('platform.prodgr.edit', $product);
          })->filter(TD::FILTER_TEXT),
          /*TD::make('cataloggr_id', 'CategoryGR')->render(function (Productgr $product){
              return $product->cataloggr()->first()->name;
          }),*/
          TD::make('active', 'Active')->render(function (Productgr $product){
              return $product->active ? 'Active' : 'Inactive';
          }),
      ];
  }
}
