<?php

namespace Database\Seeders;

use App\Models\SEO;
use Illuminate\Database\Seeder;

class SEOSeeder extends Seeder
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
                'page' => 'main',
                'page_url' => 'index',
                'h1' => 'Премиум кейтеринг',
                'title' => 'Главная страница',
                'description' => 'Описание главной',
            ],
            [
                'page' => 'contacts',
                'page_url' => 'kontakty',
                'h1' => 'Контакты',
                'title' => 'Контакты',
                'description' => 'Описание Контакты',
            ],
            [
                'page' => 'company',
                'page_url' => 'o-kompanii',
                'h1' => 'О компании',
                'title' => 'О компании',
                'description' => 'Описание О компании',
            ],
            [
                'page' => 'dostavka',
                'page_url' => 'dostavka-oplata',
                'h1' => 'Доставка и оплата',
                'title' => 'Доставка и оплата',
                'description' => 'Описание доставка и оплата',
            ],
            [
                'page' => 'faq',
                'page_url' => 'faq',
                'h1' => 'Вопрос-ответ',
                'title' => 'Вопрос-ответ',
                'description' => 'Описание Вопрос-ответ',
            ],
            [
                'page' => 'reviews',
                'page_url' => 'otzyvy',
                'h1' => 'Отзывы',
                'title' => 'Отзывы',
                'description' => 'Описание отзывы',
            ],
        ];
        SEO::insert($data);
    }
}
