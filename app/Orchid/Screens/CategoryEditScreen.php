<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryEditScreen extends Screen
{
    public $name = 'Категории товаров';
    public $description = 'Shop category';
    public $exists = false;

    public function query(Category $category): array
    {
        $this->exists = $category->exists;
        if($this->exists){
            $this->name = 'Редактировать категорию';
        }
        return [
            'category' => $category
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

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('category.name')
                    ->title('Name')
                    ->placeholder('Category name')
                    ->required()
                    ->help('Specify a short descriptive title for this category.'),
                Input::make('category.url')
                    ->title('URL')
                    ->placeholder('Category URL')
                    ->required()
                    ->help('Category URL in address'),
                Switcher::make('category.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(Category $category, Request $request)
    {
        $category->fill($request->get('category'))->save();
        Alert::info('You have successfully created an category.');
        return redirect()->route('platform.category.list');
    }

    public function remove(Category $category)
    {
        $category->delete();
        Alert::info('You have successfully deleted the category.');
        return redirect()->route('platform.category.list');
    }
}
