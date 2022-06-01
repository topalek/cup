<?php

namespace App\Orchid\Screens;

use App\Models\FAQ;
use App\Orchid\Layouts\FAQListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class FAQListScreen extends Screen
{
    public $name = 'FAQ';
    public $description = 'Shop FAQ';

    public function query(): array
    {
        return [
            'f_a_q_s' => FAQ::paginate()
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.faq.edit')
        ];
    }


    public function layout(): array
    {
        return [
            FAQListLayout::class
        ];
    }
}
