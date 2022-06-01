<?php

namespace App\Orchid\Screens;

use App\Models\CategoryPortfolio;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryPortfolioEditScreen extends Screen
{
  public $name = 'Categoryedit';
  public $description = 'Категории портфолио';
  public $exists = false;

  public function query(CategoryPortfolio $categoryedit): array
  {
      $this->exists = $categoryedit->exists;
      if($this->exists){
          $this->name = 'Редактировать категорию';
      }
      return [
          'categoryedit' => $categoryedit
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
      ];
  }

  public function layout(): array
  {
      return [
          Layout::rows([
              Input::make('categoryedit.name')
                  ->title('Name')
                  ->placeholder('Category name')
                  ->required()
                  ->help('Specify a short descriptive title for this category.'),
              Input::make('categoryedit.url')
                  ->title('URL')
                  ->placeholder('Category URL')
                  ->required()
                  ->help('Category URL in address'),
              Switcher::make('categoryedit.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
          ])
      ];
  }

  public function createOrUpdate(CategoryPortfolio $categoryedit, Request $request)
  {
      $categoryedit->fill($request->get('categoryedit'))->save();
      Alert::info('You have successfully created an category.');
      return redirect()->route('platform.categoryportfolio.list');
  }

  public function remove(CategoryPortfolio $categoryedit)
  {
      $categoryedit->delete();
      Alert::info('You have successfully deleted the category.');
      return redirect()->route('platform.categoryportfolio.list');
  }
}
