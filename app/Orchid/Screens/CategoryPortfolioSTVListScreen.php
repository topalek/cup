<?php

namespace App\Orchid\Screens;

use App\Models\CategoryStylevz;
use App\Orchid\Layouts\CategoryPortfolioSTVListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class CategoryPortfolioSTVListScreen extends Screen
{
    public $name = 'Стили для взрослого стола';
    public $description = 'Категории стилей для взрослого стола';

    public function query(): array
    {
        return [
            'categoriesportvz' => CategoryStylevz::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать ')
                ->icon('plus')
                ->route('platform.categoryportfoliovz.edit')
        ];
    }

    public function layout(): array
    {
        return [
            CategoryPortfolioSTVListLayout::class
        ];
    }
}
