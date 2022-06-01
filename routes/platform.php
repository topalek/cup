<?php

declare(strict_types=1);

use App\Orchid\Screens\CategoryEditScreen;
use App\Orchid\Screens\CategoryGREditScreen;
use App\Orchid\Screens\CategoryGRListScreen;
use App\Orchid\Screens\CategoryListScreen;
use App\Orchid\Screens\CategoryPortfolioDETEditScreen;
use App\Orchid\Screens\CategoryPortfolioDETListScreen;
use App\Orchid\Screens\CategoryPortfolioEditScreen;
use App\Orchid\Screens\CategoryPortfolioListScreen;
use App\Orchid\Screens\CategoryPortfolioSTVEditScreen;
use App\Orchid\Screens\CategoryPortfolioSTVListScreen;
use App\Orchid\Screens\CatFormatEditScreen;
use App\Orchid\Screens\CatFormatListScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\FAQEditScreen;
use App\Orchid\Screens\FAQListScreen;
use App\Orchid\Screens\FormatEditScreen;
use App\Orchid\Screens\FormatListScreen;
use App\Orchid\Screens\GarKachEditScreen;
use App\Orchid\Screens\GarKachListScreen;
use App\Orchid\Screens\NoticeEditScreen;
use App\Orchid\Screens\NoticeListScreen;
use App\Orchid\Screens\OrderEditScreen;
use App\Orchid\Screens\OrderListScreen;
use App\Orchid\Screens\OurpEditScreen;
use App\Orchid\Screens\OurpListScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\PortfolioEditScreen;
use App\Orchid\Screens\PortfolioListScreen;
use App\Orchid\Screens\PovEditScreen;
use App\Orchid\Screens\PovListScreen;
use App\Orchid\Screens\ProdGREditScreen;
use App\Orchid\Screens\ProdGRListScreen;
use App\Orchid\Screens\ProductEditScreen;
use App\Orchid\Screens\ProductListScreen;
use App\Orchid\Screens\QuizEditScreen;
use App\Orchid\Screens\QuizListScreen;
use App\Orchid\Screens\ReviewEditScreen;
use App\Orchid\Screens\ReviewListScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\SEOEditScreen;
use App\Orchid\Screens\SEOListScreen;
use App\Orchid\Screens\SliderglEditScreen;
use App\Orchid\Screens\SliderglListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use App\Orchid\Screens\VacancyEditScreen;
use App\Orchid\Screens\VacancyListScreen;
use App\Orchid\Screens\YoutubeEditScreen;
use App\Orchid\Screens\YoutubeListScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{roles}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen');
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

// Site Cupcatering

Route::screen('categories', CategoryListScreen::class)
    ->name('platform.category.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Category List', route('platform.category.list'));
    });

Route::screen('category/{category?}', CategoryEditScreen::class)
    ->name('platform.category.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.category.list')
            ->push('Category');
    });

Route::screen('orders', OrderListScreen::class)
    ->name('platform.order.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Order List', route('platform.order.list'));
    });


Route::screen('order/{order?}', OrderEditScreen::class)
    ->name('platform.order.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.order.list')
            ->push('Order');
    });

Route::screen('notice', NoticeListScreen::class)
    ->name('platform.notice.list')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Notice List', route('platform.notice.list'));
    });


Route::screen('notice/{notice?}', NoticeEditScreen::class)
    ->name('platform.notice.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.notice.list')
            ->push('Notice');
    });



Route::screen('faqs', FAQListScreen::class)
    ->name('platform.faq.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('FAQ List', route('platform.faq.list'));
    });
Route::screen('faq/{faq?}', FAQEditScreen::class)
    ->name('platform.faq.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.faq.list')
            ->push('FAQ');
    });

Route::screen('reviews', ReviewListScreen::class)
    ->name('platform.review.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Reviews', route('platform.review.list'));
    });
Route::screen('review/{review?}', ReviewEditScreen::class)
    ->name('platform.review.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.review.list')
            ->push('Review');
    });

Route::screen('vacancies', VacancyListScreen::class)
    ->name('platform.vacancy.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Vacancies', route('platform.vacancy.list'));
    });
Route::screen('vacancy/{vacancy?}', VacancyEditScreen::class)
    ->name('platform.vacancy.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.vacancy.list')
            ->push('Vacancy');
    });
// youtube
Route::screen('youtube', YoutubeListScreen::class)
    ->name('platform.youtube.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Youtubes', route('platform.youtube.list'));
    });
Route::screen('youtubevideo/{youtubevideo?}', YoutubeEditScreen::class)
    ->name('platform.youtube.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.youtube.list')
            ->push('Youtubevideo');
    });

// слайдер на главной странице
Route::screen('slider', SliderglListScreen::class)
->name('platform.slider.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Sliders', route('platform.slider.list'));
});
Route::screen('sliderel/{sliderel?}', SliderglEditScreen::class)
->name('platform.slider.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.slider.list')
        ->push('Sliderel');
});



//портфолио
Route::screen('portfolio', PortfolioListScreen::class)
    ->name('platform.portfolio.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Portfolio', route('platform.portfolio.list'));
    });
Route::screen('portfolioel/{portfolioel?}', PortfolioEditScreen::class)
    ->name('platform.portfolio.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.portfolio.list')
            ->push('Portfolioel');
    });

//категории портфолио
Route::screen('categoryportfolio', CategoryPortfolioListScreen::class)
    ->name('platform.categoryportfolio.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('CategoryPortfolio', route('platform.categoryportfolio.list'));
    });
Route::screen('categoryedit/{categoryedit?}', CategoryPortfolioEditScreen::class)
    ->name('platform.categoryedit.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.categoryportfolio.list')
            ->push('Categoryedit');
    });

//категории стилей для взрос стола
Route::screen('categoryportfoliovz', CategoryPortfolioSTVListScreen::class)
->name('platform.categoryportfoliovz.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('CategoryPortfoliovz', route('platform.categoryportfoliovz.list'));
});
Route::screen('categoryvzedit/{categoryvzedit?}', CategoryPortfolioSTVEditScreen::class)
    ->name('platform.categoryportfoliovz.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.categoryportfoliovz.list')
            ->push('Categoryvzedit');
});

//категории для готовых решений
Route::screen('categorygr', CategoryGRListScreen::class)
->name('platform.categorygr.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('CategoryGR', route('platform.categorygr.list'));
});
Route::screen('categorygred/{categorygred?}', CategoryGREditScreen::class)
    ->name('platform.categorygr.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.categorygr.list')
            ->push('Categorygredit');
});

//готовые решения
Route::screen('prodgr', ProdGRListScreen::class)
    ->name('platform.prodgr.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Prodgr', route('platform.prodgr.list'));
    });
Route::screen('prodgrel/{prodgrel?}', ProdGREditScreen::class)
    ->name('platform.prodgr.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.prodgr.list')
            ->push('Prodgrel');
    });


//категории стилей для взрос стола
Route::screen('categoryportfoliodet', CategoryPortfolioDETListScreen::class)
->name('platform.categoryportfoliodet.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('CategoryPortfoliodet', route('platform.categoryportfoliodet.list'));
});
Route::screen('categorydetedit/{categorydetedit?}', CategoryPortfolioDETEditScreen::class)
    ->name('platform.categoryportfoliodet.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.categoryportfoliodet.list')
            ->push('Categorydetedit');
});

Route::screen('seos', SEOListScreen::class)
    ->name('platform.seo.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('SEO', route('platform.seo.list'));
    });
Route::screen('seo/{seo?}', SEOEditScreen::class)
    ->name('platform.seo.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.seo.list')
            ->push('SEO');
    });

Route::screen('products', ProductListScreen::class)
    ->name('platform.product.list')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.index')
            ->push('Products', route('platform.product.list'));
    });
Route::screen('product/{product?}', ProductEditScreen::class)
    ->name('platform.product.edit')
    ->breadcrumbs(function (Trail $trail){
        return $trail
            ->parent('platform.product.list')
            ->push('Product');
    });

// Поводы
Route::screen('povodi', PovListScreen::class)
->name('platform.povodi.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Povodi', route('platform.povodi.list'));
});
Route::screen('povod/{povod?}', PovEditScreen::class)
->name('platform.povodi.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.povodi.list')
        ->push('Povod');
});


// Категория форматов
Route::screen('catformati', CatFormatListScreen::class)
->name('platform.catformati.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Сatformati', route('platform.catformati.list'));
});
Route::screen('catformat/{catformat?}', CatFormatEditScreen::class)
->name('platform.catformati.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.catformati.list')
        ->push('Catformat');
});


// Форматы
Route::screen('formati', FormatListScreen::class)
->name('platform.formati.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Formati', route('platform.formati.list'));
});
Route::screen('format/{format?}', FormatEditScreen::class)
->name('platform.formati.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.formati.list')
        ->push('Format');
});


// QUIZ
Route::screen('quiz', QuizListScreen::class)
->name('platform.quiz.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Quiz', route('platform.quiz.list'));
});
Route::screen('quizitem/{quizitem?}', QuizEditScreen::class)
->name('platform.quiz.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.quiz.list')
        ->push('Quizitem');
});


// Гарантия качества
Route::screen('garkach', GarKachListScreen::class)
->name('platform.garkach.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Garkach', route('platform.garkach.list'));
});
Route::screen('garkachitem/{garkachitem?}', GarKachEditScreen::class)
->name('platform.garkach.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.garkach.list')
        ->push('Garkachitem');
});


// Наши люди
Route::screen('ourp', OurpListScreen::class)
->name('platform.ourp.list')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.index')
        ->push('Ourp', route('platform.ourp.list'));
});
Route::screen('ourpitem/{ourpitem?}', OurpEditScreen::class)
->name('platform.ourp.edit')
->breadcrumbs(function (Trail $trail){
    return $trail
        ->parent('platform.ourp.list')
        ->push('Ourpitem');
});
