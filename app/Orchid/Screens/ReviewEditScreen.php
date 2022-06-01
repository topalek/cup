<?php

namespace App\Orchid\Screens;

use App\Models\Format;
use App\Models\Portfolio;
use App\Models\Review;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ReviewEditScreen extends Screen
{
    public $name = 'Отзыв';
    public $description = 'CUP - Отзывы';
    public $exists = false;

    public function query(Review $el): array{
        $this->exists = $el->exists;
        if($this->exists){
            $this->name = 'Редактировать отзыв';
        }
        $el->load('attachment');
        return [
            'review' => $el
        ];
    }

    public function commandBar(): array{
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
                Group::make([
                    Input::make('review.name')
                        ->title('Имя автора')
                        ->placeholder('Иван')
                        ->required(),
                    Select::make('review.portfitems.')
                        ->fromModel(Portfolio::class, 'name')
                        ->multiple()
                        ->title('Портфолио')
                        ->help('Указать только одно портфолио'),
                    Select::make('review.formatel.')
                        ->fromModel(Format::class, 'title')
                        ->multiple()
                        ->title('Формат')
                        ->help('Указать только одно формат'),
                ]),
                Quill::make('review.text')
                    ->title('Текст отзыва')
                    ->required(),
                Switcher::make('review.active')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])->title('Основная информация'),
            Layout::rows([
                Group::make([
                    Input::make('review.url')
                        ->title('url страницы')
                        ->required(),
                    Input::make('review.h1')
                        ->title('h1'),
                    Input::make('review.title')
                        ->title('title'),
                ]),
                Group::make([
                    TextArea::make('review.description')
                        ->title('description')
                        ->rows(5),
                    TextArea::make('review.keywords')
                        ->title('keywords')
                        ->rows(5),
                ]),
            ])->title('SEO'),
            Layout::rows([
                Group::make([
                    Upload::make('review.attachment')
                      ->title('Гаерея')
                      ->groups('photos')
                      ->help('Добавлять набор фото до 4-х'),
                    Cropper::make('review.hero')
                        ->targetId()
                        ->title('Основная фотография')
                        ->width(500)
                        ->height(500)
                        ->help('Размер фото - 500x500'),
                ]),
            ])->title('Фото'),
        ];
    }
    public function createOrUpdate(Review $el, Request $request)
    {
        $el->fill($request->get('review'))->save();

        // Удаление новой записи
        $catProdIds = array_filter($request->input('review.portfitems', []), function ($v, $k) {
            return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);

        $el->portfitems()->sync($catProdIds);

        // Удаление существующей записи
        $CatProd = array_filter($request->input('review.portfitems', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);

        // Создать новый
        if (count($CatProd) > 0) {
            $CatProdArr = [];
            foreach ($CatProd as $newCatProd) {
                $CatProdArr[] = new Portfolio(['name' => $newCatProd]);
            }
            $el->portfitems()->saveMany($CatProdArr);
        }



        // Удаление новой записи
        $catProdIds = array_filter($request->input('review.formatel', []), function ($v, $k) {
          return filter_var($v, FILTER_VALIDATE_INT) !== false;
        }, ARRAY_FILTER_USE_BOTH);
        $el->formatel()->sync($catProdIds);
        // Удаление существующей записи
        $CatProd = array_filter($request->input('review.formatel', []), function ($v, $k) {
            return is_string($v) && filter_var($v, FILTER_VALIDATE_INT) === false;
        }, ARRAY_FILTER_USE_BOTH);
        // Создать новый
        if (count($CatProd) > 0) {
            $CatProdArr = [];
            foreach ($CatProd as $newCatProd) {
                $CatProdArr[] = new Format(['title' => $newCatProd]);
            }
            $el->formatel()->saveMany($CatProdArr);
        }

        $el->attachment()->syncWithoutDetaching(
          $request->input('review.attachment', [])
        );
        Alert::info('You have successfully created an review.');
        return redirect()->route('platform.review.list');
    }

    public function remove(Review $el)
    {
        $el->delete();
        Alert::info('You have successfully deleted the review.');
        return redirect()->route('platform.review.list');
    }
}
