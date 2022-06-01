<?php

namespace App\Orchid\Screens;

use App\Models\CategoryPortfolio;
use App\Orchid\Layouts\CategoryPortfolioListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class CategoryPortfolioListScreen extends Screen
{
    public $name = 'Категория портфолио';
    public $description = 'Категория портфолио';

    public function query(): array
    {
        return [
            'categoriesport' => CategoryPortfolio::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать ')
                ->icon('plus')
                ->route('platform.categoryedit.edit')
        ];
    }

    public function layout(): array
    {
        return [
            CategoryPortfolioListLayout::class
        ];
    }
}
