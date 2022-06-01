<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Cataloggr;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class CategoryGREditScreen extends Screen
{
  public $name = 'Категории готовых решений';
  public $description = 'Shop category';
  public $exists = false;

  public function query(Cataloggr $category): array
  {
      $this->exists = $category->exists;
      if($this->exists){
          $this->name = 'Редактировать категорию';
      }
      $category->load('attachment');
      return [
          'categorygred' => $category
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
              Input::make('categorygred.name')
                  ->title('Name')
                  ->placeholder('Category name')
                  ->required()
                  ->help('Specify a short descriptive title for this category.'),
              Input::make('categorygred.url')
                  ->title('URL')
                  ->placeholder('Category URL')
                  ->required()
                  ->help('Category URL in address'),
              Switcher::make('categorygred.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
              Upload::make('categorygred.attachment')
                  ->title('Фотографии портфолио')
                  ->groups('photos'),
          ])
      ];
  }

  public function createOrUpdate(Cataloggr $category, Request $request){
      $category->fill($request->get('categorygred'))->save();
      $category->attachment()->syncWithoutDetaching(
        $request->input('categorygred.attachment', [])
      );
      Alert::info('You have successfully created an category.');
      return redirect()->route('platform.categorygr.list');
  }

  public function remove(Cataloggr $category){
      $category->delete();
      Alert::info('You have successfully deleted the category.');
      return redirect()->route('platform.categorygr.list');
  }
}
