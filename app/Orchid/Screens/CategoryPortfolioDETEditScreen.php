<?php

namespace App\Orchid\Screens;

use App\Models\CategoryStyledet;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryPortfolioDETEditScreen extends Screen
{
  public $name = 'Стили для детского стола';
  public $description = 'Shop category';
  public $exists = false;

  public function query(CategoryStyledet $category): array
  {
      $this->exists = $category->exists;
      if($this->exists){
          $this->name = 'Редактировать категорию';
      }
      $category->load('attachment');
      return [
          'categorydetedit' => $category
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
              Input::make('categorydetedit.name')
                  ->title('Name')
                  ->placeholder('Category name')
                  ->required()
                  ->help('Specify a short descriptive title for this category.'),
              Input::make('categorydetedit.url')
                  ->title('URL')
                  ->placeholder('Category URL')
                  ->required()
                  ->help('Category URL in address'),
              Quill::make('categorydetedit.shortdesc')
                  ->title('Краткое описание')
                  ->required(),
              Quill::make('categorydetedit.desc')
                  ->title('Полное описание')
                  ->required(),
              Upload::make('categorydetedit.attachment')
                  ->title('Фотографии')
                  ->groups('photos'),
              Switcher::make('categorydetedit.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
          ])
      ];
  }

  public function createOrUpdate(CategoryStyledet $category, Request $request)
  {
      $category->fill($request->get('categorydetedit'))->save();
      $category->attachment()->syncWithoutDetaching(
        $request->input('categorydetedit.attachment', [])
      );
      Alert::info('You have successfully created an category.');
      return redirect()->route('platform.categoryportfoliodet.list');
  }

  public function remove(CategoryStyledet $category)
  {
      $category->delete();
      Alert::info('You have successfully deleted the category.');
      return redirect()->route('platform.categoryportfoliodet.list');
  }
}
