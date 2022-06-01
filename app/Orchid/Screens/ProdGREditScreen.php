<?php

namespace App\Orchid\Screens;

use App\Models\Cataloggr;
use App\Models\CategoryStyledet;
use App\Models\CategoryStylevz;
use App\Models\Product;
use App\Models\Productgr;
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

class ProdGREditScreen extends Screen
{
  public $name = 'Готовое решение';
  public $description = 'Shop product';
  public $exists = false;

  public function query(Productgr $product): array
  {
      $this->exists = $product->exists;
      if($this->exists){
          $this->name = 'Изменить товар';
      }
      $product->load('attachment');
      return [
          'prodgrel' => $product
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
              Input::make('prodgrel.name')
                  ->title('Название товара')
                  ->placeholder('Название товара')
                  ->required(),
              Select::make('prodgrel.cataloggrel.')
                  ->fromModel(Cataloggr::class, 'name')
                  ->multiple()
                  ->title('Категории готовых решений'),
                  //->required(),
              
              Select::make('prodgrel.stylevzgr.')
                  ->fromModel(CategoryStylevz::class, 'name')
                  ->multiple()
                  ->title('Стили для взрослого стола'),
                  //->required(),

              Select::make('prodgrel.styledetgr.')
                  ->fromModel(CategoryStyledet::class, 'name')
                  ->multiple()
                  ->title('Стили для детского стола'),
                  //->required(),
              Input::make('prodgrel.naborot')
                  ->title('Набор на кол. человек'),
                  //->required(),
              Input::make('prodgrel.url')
                  ->title('Ссылка на товар')
                  ->required(),
              Switcher::make('prodgrel.active')
                  ->sendTrueOrFalse()
                  ->title('Показывать на сайте'),
              Switcher::make('prodgrel.popular')
                  ->sendTrueOrFalse()
                  ->title('Популярный товар'),
              Input::make('prodgrel.countpr')
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
              Upload::make('prodgrel.attachment')
                  ->title('Фотографии карусели')
                  ->groups('photos'),
              Quill::make('prodgrel.description')
                  ->title('Описание товара')
                  ->required(),
              Input::make('prodgrel.price_per_unit')
                  ->title('Цена за единицу')
                  ->type('number')
                  ->required(),
              Input::make('prodgrel.price_full')
                  ->title('Полная стоимость')
                  ->type('number')
                  ->required(),
              Quill::make('prodgrel.composition')
                  ->title('Состав')
                  ->required(),
              Input::make('prodgrel.weight_per_unit')
                  ->title('Вес одной единицы')
                  ->required(),
              Input::make('prodgrel.weight_full')
                  ->title('Полный вес')
                  ->required()
          ]),
          Layout::rows([
            Input::make('prodgrel.sp1')
                ->title('Категория состава 1')
                ->placeholder('Название категории состава 1'),
                //->required(),
            Select::make('prodgrel.products.')
                ->fromModel(Product::class, 'name')
                ->multiple(),
                //->title('Список продуктов 1'),

            Input::make('prodgrel.sp2')
                ->title('Категория состава 2')
                ->placeholder('Название категории состава 2'),
                //->required(),
            Select::make('prodgrel.products2.')
                ->fromModel(Product::class, 'name')
                ->multiple(),
                //->title('Список продуктов 2'),

            Input::make('prodgrel.sp3')
                ->title('Категория состава 3')
                ->placeholder('Название категории состава 3'),
                //->required(),
            Select::make('prodgrel.products3.')
                ->fromModel(Product::class, 'name')
                ->multiple(),
                //->title('Список продуктов 3'),

            Input::make('prodgrel.sp4')
                ->title('Категория состава 4')
                ->placeholder('Название категории состава 4'),
                //->required(),
            Select::make('prodgrel.products4.')
                ->fromModel(Product::class, 'name')
                ->multiple(),
                //->title ('Список продуктов 4'),
            Input::make('prodgrel.sp5')
                ->title('Категория состава 5')
                ->placeholder('Название категории состава 5'),
                //->required(),
            Select::make('prodgrel.products5.')
                ->fromModel(Product::class, 'name')
                ->multiple(),
                //->title('Список продуктов 4'),

          ])->title('Состав'),
          Layout::rows([
              Input::make('prodgrel.protein')->title('Белки'),
              Input::make('prodgrel.fat')->title('Жиры'),
              Input::make('prodgrel.carbohydrates')->title('Углеводы'),
          ])->title('БЖУ'),
          Layout::rows([
              CheckBox::make('prodgrel.tooltip1')
                ->sendTrueOrFalse()
                ->title(__('prodgrel.tooltip_1')),
              CheckBox::make('prodgrel.tooltip2')
                ->sendTrueOrFalse()
                ->title(__('prodgrel.tooltip_2')),
              CheckBox::make('prodgrel.tooltip3')
                ->sendTrueOrFalse()
                ->title(__('prodgrel.tooltip_3')),
              CheckBox::make('prodgrel.tooltip4')
                ->sendTrueOrFalse()
                ->title(__('prodgrel.tooltip_4')),
          ])->title('Тултипы')
      ];
  }

  public function createOrUpdate(Productgr $product, Request $request)
  {
    $product->fill($request->get('prodgrel'))->save();
    Alert::info('You have successfully created.');

    // Удаление новой записи
    $catProfIds = array_filter($request->input('prodgrel.cataloggrel', []), function ($v, $k) {
       return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->cataloggrel()->sync($catProfIds);
    // Удаление существующей записи
    $catProf = array_filter($request->input('prodgrel.cataloggrel', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($catProf) > 0) {
        $CatPortfArr = [];
        foreach ($catProf as $newcatProf) {
            $CatPortfArr[] = new Productgr(['name' => $newcatProf]);
        }
        $product->cataloggrel()->saveMany($CatPortfArr);
    }

    // Удаление новой записи
    $catProfVzIds = array_filter($request->input('prodgrel.stylevzgr', []), function ($v, $k) {
        return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->stylevzgr()->sync($catProfVzIds);
    // Удаление существующей записи
    $StyleVzcatProf = array_filter($request->input('prodgrel.stylevzgr', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($StyleVzcatProf) > 0) {
        $StyleVzPortfArr = [];
        foreach ($StyleVzcatProf as $newStyleVzProf) {
            $StyleVzPortfArr[] = new Productgr(['name' => $newStyleVzProf]);
        }
        $product->stylevzgr()->saveMany($StyleVzPortfArr);
    }

    // Удаление новой записи
    $catProfDetIds = array_filter($request->input('prodgrel.styledetgr', []), function ($v, $k) {
        return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->styledetgr()->sync($catProfDetIds);
    // Удаление существующей записи
    $StyleDetcatProf = array_filter($request->input('prodgrel.styledetgr', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($StyleDetcatProf) > 0) {
        $StyleDetPortfArr = [];
        foreach ($StyleDetcatProf as $newStyleDetProf) {
            $StyleDetPortfArr[] = new Productgr(['name' => $newStyleDetProf]);
        }
        $product->styledetgr()->saveMany($StyleDetPortfArr);
    }

    // Удаление новой записи
    $ProdDetIds = array_filter($request->input('prodgrel.products', []), function ($v, $k) {
      return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->products()->sync($ProdDetIds);
    // Удаление существующей записи
    $ProdDetcatProf = array_filter($request->input('prodgrel.products', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($ProdDetcatProf) > 0) {
        $ProdSpDetPortfArr = [];
        foreach ($ProdDetcatProf as $newProd) {
            $ProdSpDetPortfArr[] = new Productgr(['name' => $newProd]);
        }
        $product->products()->saveMany($ProdSpDetPortfArr);
    }

    // Удаление новой записи
    $Prod2DetIds = array_filter($request->input('prodgrel.products2', []), function ($v, $k) {
      return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->products2()->sync($Prod2DetIds);
    // Удаление существующей записи
    $Prod2DetcatProf = array_filter($request->input('prodgrel.products2', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($Prod2DetcatProf) > 0) {
        $Prod2SpDetPortfArr = [];
        foreach ($Prod2DetcatProf as $newProd2) {
            $Prod2SpDetPortfArr[] = new Productgr(['name' => $newProd2]);
        }
        $product->products2()->saveMany($Prod2SpDetPortfArr);
    }

    // Удаление новой записи
    $Prod3DetIds = array_filter($request->input('prodgrel.products3', []), function ($v, $k) {
      return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->products3()->sync($Prod3DetIds);
    // Удаление существующей записи
    $Prod3DetcatProf = array_filter($request->input('prodgrel.products3', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($Prod3DetcatProf) > 0) {
        $Prod3SpDetPortfArr = [];
        foreach ($Prod3DetcatProf as $newProd3) {
            $Prod3SpDetPortfArr[] = new Productgr(['name' => $newProd3]);
        }
        $product->products3()->saveMany($Prod3SpDetPortfArr);
    }

    // Удаление новой записи
    $Prod4DetIds = array_filter($request->input('prodgrel.products4', []), function ($v, $k) {
      return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->products4()->sync($Prod4DetIds);
    // Удаление существующей записи
    $Prod4DetcatProf = array_filter($request->input('prodgrel.products4', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($Prod4DetcatProf) > 0) {
        $Prod4SpDetPortfArr = [];
        foreach ($Prod4DetcatProf as $newProd4) {
            $Prod4SpDetPortfArr[] = new Productgr(['name' => $newProd4]);
        }
        $product->products4()->saveMany($Prod4SpDetPortfArr);
    }

    // Удаление новой записи
    $Prod5DetIds = array_filter($request->input('prodgrel.products5', []), function ($v, $k) {
      return filter_var($v, FILTER_VALIDATE_INT) !== false;
    }, ARRAY_FILTER_USE_BOTH);
    $product->products5()->sync($Prod5DetIds);
    // Удаление существующей записи
    $Prod5DetcatProf = array_filter($request->input('prodgrel.products5', []), function ($v, $k) {
        return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
    }, ARRAY_FILTER_USE_BOTH);
    // Создать новый продукт
    if (count($Prod5DetcatProf) > 0) {
        $Prod5SpDetPortfArr = [];
        foreach ($Prod5DetcatProf as $newProd5) {
            $Prod5SpDetPortfArr[] = new Productgr(['name' => $newProd5]);
        }
        $product->products5()->saveMany($Prod5SpDetPortfArr);
    }





      $product->attachment()->syncWithoutDetaching(
          $request->input('prodgrel.attachment', [])
      );
      return redirect()->route('platform.prodgr.list');
  }

  public function remove(Productgr $product)
  {
      $product->delete();
      Alert::info('You have successfully deleted product.');
      return redirect()->route('platform.prodgr.list');
  }
}
