<?php

namespace App\Orchid\Screens;

use App\Models\CategoryStylevz;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryPortfolioSTVEditScreen extends Screen
{
  public $name = 'Стили для взрослого стола';
  public $description = 'Shop category';
  public $exists = false;

  public function query(CategoryStylevz $category): array
  {
      $this->exists = $category->exists;
      if($this->exists){
          $this->name = 'Редактировать категорию';
      }
      return [
          'categoryvzedit' => $category
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
              Input::make('categoryvzedit.name')
                  ->title('Name')
                  ->placeholder('Category name')
                  ->required()
                  ->help('Specify a short descriptive title for this category.'),
              Input::make('categoryvzedit.url')
                  ->title('URL')
                  ->placeholder('Category URL')
                  ->required()
                  ->help('Category URL in address'),
              Quill::make('categoryvzedit.shortdesc')
                  ->title('Краткое описание')
                  ->required(),
              Quill::make('categoryvzedit.desc')
                  ->title('Полное описание')
                  ->required(),
              Upload::make('categoryvzedit.attachment')
                  ->title('Фотографии')
                  ->groups('photos'),
              Switcher::make('categoryvzedit.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
          ])
      ];
  }

  public function createOrUpdate(CategoryStylevz $category, Request $request)
  {
      $category->fill($request->get('categoryvzedit'))->save();
      $category->attachment()->syncWithoutDetaching(
        $request->input('categoryvzedit.attachment', [])
      );
      Alert::info('You have successfully created an category.');
      return redirect()->route('platform.categoryportfoliovz.list');
  }

  public function remove(CategoryStylevz $category)
  {
      $category->delete();
      Alert::info('You have successfully deleted the category.');
      return redirect()->route('platform.categoryportfoliovz.list');
  }
}
