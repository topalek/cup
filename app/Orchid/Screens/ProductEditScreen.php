<?php

namespace App\Orchid\Screens;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ProductEditScreen extends Screen
{
    public $name = 'Товар';
    public $description = 'Shop product';
    public $exists = false;

    public function query(Product $product): array
    {
        $this->exists = $product->exists;
        if($this->exists){
            $this->name = 'Изменить товар';
        }
        $product->load('attachment');
        return [
            'product' => $product
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
                Input::make('product.name')
                    ->title('Название товара')
                    ->placeholder('Название товара')
                    ->required(),
                /*Relation::make('product.category_id')
                    ->fromModel(Category::class, 'name')
                    ->title('Категория')
                    ->required(),*/
                /*Relation::make('product.category_id')
                    ->fromModel(Category::class, 'name')
                    ->title('Категория')
                    ->required(),*/

                Select::make('product.categoryel.')
                    ->fromModel(Category::class, 'name')
                    ->multiple()
                    ->title('Категории'),
                    //->required(),
                
                Input::make('product.url')
                    ->title('Ссылка на товар')
                    ->required(),
                Switcher::make('product.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
                Switcher::make('product.popular')
                    ->sendTrueOrFalse()
                    ->title('Популярный товар'),
                Input::make('product.countpr')
                    ->title('Количество от')
                    ->value(1)
                    ->mask([
                      'numericInput' => true
                     ])
                    ->required(),
                /*Cropper::make('product.hero')
                    ->title('Превью изображение для каталога')
                    ->maxCanvas(400)
                    ->maxWidth(400)
                    ->maxHeight(400)
                    ->targetId(),*/
                Upload::make('product.attachment')
                    ->title('Фотографии карусели')
                    ->groups('photos'),
                Quill::make('product.description')
                    ->title('Описание товара')
                    ->required(),
                Input::make('product.price_per_unit')
                    ->title('Цена за единицу')
                    ->type('number')
                    ->required(),
                Input::make('product.price_full')
                    ->title('Полная стоимость')
                    ->type('number')
                    ->required(),
                Quill::make('product.composition')
                    ->title('Состав')
                    ->required(),
                Input::make('product.weight_per_unit')
                    ->title('Вес одной единицы')
                    ->required(),
                Input::make('product.weight_full')
                    ->title('Полный вес')
                    ->required()
            ]),
            Layout::rows([
                Input::make('product.protein')->title('Белки'),
                Input::make('product.fat')->title('Жиры'),
                Input::make('product.carbohydrates')->title('Углеводы'),
            ])->title('БЖУ'),
            Layout::rows([
                CheckBox::make('product.tooltip1')
                  ->sendTrueOrFalse()
                  ->title(__('product.tooltip_1')),
                CheckBox::make('product.tooltip2')
                  ->sendTrueOrFalse()
                  ->title(__('product.tooltip_2')),
                CheckBox::make('product.tooltip3')
                  ->sendTrueOrFalse()
                  ->title(__('product.tooltip_3')),
                CheckBox::make('product.tooltip4')
                  ->sendTrueOrFalse()
                  ->title(__('product.tooltip_4')),
            ])->title('Тултипы')
        ];
    }

    public function createOrUpdate(Product $product, Request $request)
    {
        $product->fill($request->get('product'))->save();
        Alert::info('You have successfully created.');

        
      // Удаление новой записи
      $catProdIds = array_filter($request->input('product.categoryel', []), function ($v, $k) {
          return filter_var($v, FILTER_VALIDATE_INT) !== false;
      }, ARRAY_FILTER_USE_BOTH);

      $product->categoryel()->sync($catProdIds);

      // Удаление существующей записи
      $CatProd = array_filter($request->input('product.categoryel', []), function ($v, $k) {
          return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
      }, ARRAY_FILTER_USE_BOTH);

      // Создать новый продукт
      if (count($CatProd) > 0) {
          $CatProdArr = [];
          foreach ($CatProd as $newCatProd) {
              $CatProdArr[] = new Product(['name' => $newCatProd]);
          }
          $product->categoryel()->saveMany($CatProdArr);
      }
     

        $product->attachment()->syncWithoutDetaching(
            $request->input('product.attachment', [])
        );
        return redirect()->route('platform.product.list');
    }

    public function remove(Product $product)
    {
        $product->delete();
        Alert::info('You have successfully deleted product.');
        return redirect()->route('platform.product.list');
    }
}
