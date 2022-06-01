<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Portfolio;
use Orchid\Screen\Actions\Link;


class PortfolioListLayout extends Table
{
  protected $target = 'portfolio';
  protected function columns(): array
  {
      return [
          /*TD::make('id', 'ID')
              ->width('150')
              ->render(function(Portfolio $portfolio){
                  $img = $portfolio->hero2()->first();

              return $img ? view('extra.image', ['path' => $portfolio->hero2()->first()->url()]) : '';
          }),*/
          TD::make('name', 'Name')->render(function (Portfolio $portfolio){
              return Link::make($portfolio->name)->route('platform.portfolio.edit', $portfolio);
          })->filter(TD::FILTER_TEXT),
          /*TD::make('category_portfolio_id', 'Category')->render(function (Portfolio $portfolio){
              return $portfolio->category_portfolio()->first()->name;
          }),*/
          TD::make('active', 'Active')->render(function (Portfolio $portfolio){
              return $portfolio->active ? 'Active' : 'Inactive';
          }),
      ];
  }
}
