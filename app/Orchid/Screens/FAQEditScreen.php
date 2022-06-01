<?php

namespace App\Orchid\Screens;

use App\Models\FAQ;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class FAQEditScreen extends Screen
{
    public $name = 'FAQ';
    public $description = 'Shop FAQ';
    public $exists = false;

    public function query(FAQ $faq): array
    {
        $this->exists = $faq->exists;
        if($this->exists){
            $this->name = 'Редактировать FAQ';
        }
        return [
            'faq' => $faq
        ];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Создать FAQ')
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
                ->canSee($this->exists)
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('faq.title')
                    ->title('Title')
                    ->placeholder('FAQ title')
                    ->required()
                    ->help('Message for help'),
                TextArea::make('faq.body')
                    ->title('Text')
                    ->placeholder('FAQ Text')
                    ->rows(4)
                    ->required()
                    ->help('FAQ Question Text'),
                Switcher::make('faq.enabled')
                    ->sendTrueOrFalse()
                    ->title('Показывать на сайте'),
            ])
        ];
    }

    public function createOrUpdate(FAQ $faq, Request $request)
    {
        $faq->fill($request->get('faq'))->save();
        Alert::info('You have successfully created an FAQ.');
        return redirect()->route('platform.faq.list');
    }

    public function remove(FAQ $faq)
    {
        $faq->delete();
        Alert::info('You have successfully deleted the FAQ.');
        return redirect()->route('platform.faq.list');
    }
}

