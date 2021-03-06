<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $data = [
            [
                'title' => 'Какова средняя стоимость мероприятия?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => 'Можно заказать у вас постные или вегетарианские блюда?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => 'У вас в меню нет блюда, которое я хотел бы видеть на столе. Вы приготовите его, если закажу?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => 'У вас можно заказать торт с фотографиями и надписями?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => 'Можно продегустировать блюда?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => 'Что входит в стоимость мероприятия?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
            [
                'title' => ' За сколько дней до мероприятия нужно подтвердить меню?',
                'body' => 'Зависит от типа мероприятия, количества гостей и множества других факторов. На данный вопрос менеджер ответит только после получения вводной информации о планируемом проекте.',
            ],
        ];
        FAQ::insert($data);
    }
}
