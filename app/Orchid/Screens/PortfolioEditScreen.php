<?php

namespace App\Orchid\Screens;

use App\Models\CategoryPortfolio;
use App\Models\CategoryStyledet;
use App\Models\CategoryStylevz;
use App\Models\Portfolio;
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
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class PortfolioEditScreen extends Screen
{
    public $name = 'Портфолио';
    public $description = 'Shop product';
    public $exists = false;

    public function query(Portfolio $portfolio): array
    {
        $this->exists = $portfolio->exists;
        if($this->exists){
            $this->name = 'Изменить портфолио';
        }
        $portfolio->load('attachment');
        return [
            'portfolioel' => $portfolio
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
                Input::make('portfolioel.name')
                    ->title('Название портфолио')
                    ->placeholder('Название портфолио')
                    ->required(),

                Quill::make('portfolioel.doptxt')
                    ->title('Допонительный текст')
                    ->rows(5)
                    ->placeholder('Текст...'),
                    //->required(),

                Select::make('portfolioel.categoryelportf.')
                    ->fromModel(CategoryPortfolio::class, 'name')
                    ->multiple()
                    ->title('Категории портфолио'),
                    //->required(),
                
                Select::make('portfolioel.stylevzportf.')
                    ->fromModel(CategoryStylevz::class, 'name')
                    ->multiple()
                    ->title('Стили для взрослого стола'),
                    //->required(),

                Select::make('portfolioel.styledetportf.')
                    ->fromModel(CategoryStyledet::class, 'name')
                    ->multiple()
                    ->title('Стили для детского стола'),
                    //->required(),

                /*Relation::make('portfolioel.category_portfolio_id')
                    ->fromModel(CategoryPortfolio::class, 'name')
                    ->title('Категория портфолио')
                    ->required(),
                
                Relation::make('portfolioel.category_stylevz_id')
                    ->fromModel(CategoryStylevz::class, 'name')
                    ->title('Стиль взрослого стола')
                    ->required(),

                Relation::make('portfolioel.category_styledet_id')
                    ->fromModel(CategoryStyledet::class, 'name')
                    ->title('Стиль дет стола')
                    ->required(),*/

                Input::make('portfolioel.url')
                    ->title('Ссылка на портфолио'),
                   // ->required(),

                Input::make('portfolioel.linkvideo')
                   ->title('Ссылка на видео'),
                  // ->required(),
                
                Input::make('portfolioel.kolperson')
                    ->title('Количество персон')
                    ->type('number'),
                    //->required(),
                Input::make('portfolioel.dataprov')
                    ->title('Дата проведения')
                    ->type('date'),
                    //->required(),
                Input::make('portfolioel.mestoprov')
                    ->title('Место проведения'),
                    //->required(),
                Input::make('portfolioel.formatprov')
                    ->title('Формат проведения'),
                    //->required(),
                Upload::make('portfolioel.attachment')
                    ->title('Фотографии портфолио')
                    ->groups('photos'),
                Switcher::make('portfolioel.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),

                Switcher::make('portfolioel.oncenterslider')
                    ->sendTrueOrFalse()
                    ->title('Отображать на главном слайдере'),
                
                Switcher::make('portfolioel.onstyleslider')
                    ->sendTrueOrFalse()
                    ->title('Отображать в стилях'),
                
                /*Cropper::make('portfolioel.hero')
                    ->title('Превью изображение для каталога')
                    ->maxCanvas(400)
                    ->maxWidth(400)
                    ->maxHeight(400)
                    ->targetId(),
               /*Upload::make('portfolio.attachment')
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
                    ->required()*/
            ]),
            /*Layout::rows([
                Input::make('product.protein')->title('Белки'),
                Input::make('product.fat')->title('Жиры'),
                Input::make('product.carbohydrates')->title('Углеводы'),
            ])->title('БЖУ'),
            Layout::rows([
                CheckBox::make('product.tooltip1')->title(__('product.tooltip_1')),
                CheckBox::make('product.tooltip2')->title(__('product.tooltip_2')),
                CheckBox::make('product.tooltip3')->title(__('product.tooltip_3')),
                CheckBox::make('product.tooltip4')->title(__('product.tooltip_4')),
            ])->title('Тултипы')*/
        ];
    }


    public function createOrUpdate(Portfolio $portfolio, Request $request)
    {
        $portfolio->fill($request->get('portfolioel'))->save();
        Alert::info('You have successfully created.');


        
        // Удаление новой записи
        $catProfIds = array_filter($request->input('portfolioel.categoryelportf', []), function ($v, $k) {
            return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        $portfolio->categoryelportf()->sync($catProfIds);

        // Удаление существующей записи
        $catProf = array_filter($request->input('portfolioel.categoryelportf', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);

        // Создать новый продукт
        if (count($catProf) > 0) {
            $CatPortfArr = [];
            foreach ($catProf as $newcatProf) {
                $CatPortfArr[] = new Portfolio(['name' => $newcatProf]);
            }
            $portfolio->categoryelportf()->saveMany($CatPortfArr);
        }


        // Удаление новой записи
        $catProfVzIds = array_filter($request->input('portfolioel.stylevzportf', []), function ($v, $k) {
            return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        $portfolio->stylevzportf()->sync($catProfVzIds);

        // Удаление существующей записи
        $StyleVzcatProf = array_filter($request->input('portfolioel.stylevzportf', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);

        // Создать новый продукт
        if (count($StyleVzcatProf) > 0) {
            $StyleVzPortfArr = [];
            foreach ($StyleVzcatProf as $newStyleVzProf) {
                $StyleVzPortfArr[] = new Portfolio(['name' => $newStyleVzProf]);
            }
            $portfolio->stylevzportf()->saveMany($StyleVzPortfArr);
        }




        // Удаление новой записи
        $catProfDetIds = array_filter($request->input('portfolioel.styledetportf', []), function ($v, $k) {
            return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        $portfolio->styledetportf()->sync($catProfDetIds);
        // Удаление существующей записи
        $StyleDetcatProf = array_filter($request->input('portfolioel.styledetportf', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);

        // Создать новый продукт
        if (count($StyleDetcatProf) > 0) {
            $StyleDetPortfArr = [];
            foreach ($StyleDetcatProf as $newStyleDetProf) {
                $StyleDetPortfArr[] = new Portfolio(['name' => $newStyleDetProf]);
            }
            $portfolio->styledetportf()->saveMany($StyleDetPortfArr);
        }
    
      

        $portfolio->attachment()->syncWithoutDetaching(
            $request->input('portfolioel.attachment', [])
        );
        return redirect()->route('platform.portfolio.list');
    }

    public function remove(Portfolio $portfolio)
    {
        $portfolio->delete();
        Alert::info('You have successfully deleted portfolio.');
        return redirect()->route('platform.portfolio.list');
    }
}
