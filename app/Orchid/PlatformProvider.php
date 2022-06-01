<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Товары')
                ->icon('database')
                ->route('platform.product.list')
                ->title('Shop'),
            Menu::make('Категории')
                ->icon('list')
                ->route('platform.category.list'),
            Menu::make('Заказы')
                ->icon('basket-loaded')
                ->route('platform.order.list'),
            Menu::make('Вакансии')
                ->icon('user')
                ->route('platform.vacancy.list'),
            Menu::make('FAQ')
                ->icon('question')
                ->route('platform.faq.list'),
            Menu::make('Отзывы')
                ->icon('bubble')
                ->route('platform.review.list'),
            Menu::make('Уведомления')
                ->icon('bell')
                ->route('platform.notice.list'),

            Menu::make('Стили для взрослого стола')
                ->icon('diamond')
                ->route('platform.categoryportfoliovz.list'),

            Menu::make('Стили для детского стола')
                ->icon('diamond')
                ->route('platform.categoryportfoliodet.list'),

            Menu::make('Категории для портфолио')
                ->icon('list')
                ->route('platform.categoryportfolio.list'),

            Menu::make('Портфолио')
                ->icon('notebook')
                ->route('platform.portfolio.list'),

            Menu::make('Категории для готовых решений')
                ->icon('list')
                ->route('platform.categorygr.list'),

            Menu::make('Готовые решения')
                ->icon('drawer')
                ->route('platform.prodgr.list'),

            Menu::make('Видео')
                ->icon('drawer')
                ->route('platform.youtube.list'),

            Menu::make('Слайдер')
                ->icon('drawer')
                ->route('platform.slider.list'),

            Menu::make('Поводы')
                ->icon('drawer')
                ->route('platform.povodi.list'),

            /*Menu::make('Категория форматов')
                ->icon('drawer')
                ->route('platform.catformati.list'),*/

            Menu::make('Форматы')
                ->icon('drawer')
                ->route('platform.formati.list'),

            Menu::make('Гарантия качества')
                ->icon('drawer')
                ->route('platform.garkach.list'),

            Menu::make('Наши люди')
                ->icon('drawer')
                ->route('platform.ourp.list'),

            Menu::make('SEO')
                ->icon('crome')
                ->route('platform.seo.list'),

            Menu::make('QUIZ')
                ->icon('crome')
                ->route('platform.quiz.list')
                ->divider(),

            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),

            Menu::make('DEVs')
                ->title('ONLY FOR DEVELOPERS')
                ->icon('code')
                ->list([
                    Menu::make('Example screen')->icon('monitor')->route('platform.example')->badge(function () {return 6;}),
                    Menu::make('Basic Elements')->icon('note')->route('platform.example.fields'),
                    Menu::make('Advanced Elements')->icon('briefcase')->route('platform.example.advanced'),
                    Menu::make('Text Editors')->icon('list')->route('platform.example.editors'),
                    Menu::make('Overview layouts')->icon('layers')->route('platform.example.layouts'),
                    Menu::make('Chart tools')->icon('bar-chart')->route('platform.example.charts'),
                    Menu::make('Cards')->icon('grid')->route('platform.example.cards'),
                    Menu::make('Documentation')->icon('docs')->url('https://orchid.software/en/docs'),
                    Menu::make('Changelog')->icon('shuffle')->url('https://github.com/orchidsoftware/platform/blob/master/CHANGELOG.md')->target('_blank')->badge(function () {return Dashboard::version();}, Color::DARK()),
                ]),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
