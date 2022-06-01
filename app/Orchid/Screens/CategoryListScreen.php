<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Orchid\Layouts\CategoryListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class CategoryListScreen extends Screen
{
    public $name = 'Category';
    public $description = 'Shop categories';

    public function query(): array
    {
        return [
            'categories' => Category::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.category.edit')
        ];
    }

    public function layout(): array
    {
        return [
            CategoryListLayout::class
        ];
    }
}
