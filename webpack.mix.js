const mix = require('laravel-mix');

require('laravel-mix-imgmin');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

//mix.js('resources/js/admin/app.js', 'public/js/admin/app.js').vue({ version: 2 });

//mix.js('resources/js/app.js', 'public/js');

/*mix.js([
    'resources/assets/js/main.js',
    'resources/assets/js/menu.js',
    'resources/assets/js/mobileMenu.js',
    'resources/assets/js/tabs.js',
  ], 'public/js/script.js')*/

mix.js('resources/assets/js/main.js', 'public/js/main.js');
mix.js('resources/assets/js/menu.js', 'public/js/menu.js');
mix.js('resources/assets/js/mobileMenu.js', 'public/js/mobileMenu.js');
mix.js('resources/assets/js/tabs.js', 'public/js/tabs.js');
mix.js('resources/assets/js/basket.js', 'public/js/basket.js');
mix.js('resources/assets/js/service.js', 'public/js/service.js');



//mix.js('resources/js/quiz.js', 'public/js/quiz.js');
//mix.js('resources/js/nova.js', 'public/js/nova.js');

mix.styles([
    'resources/css/normalize.css',
    'resources/css/fonts.css',
    'resources/css/global.css',
    'resources/css/feedback.css',
    'resources/css/header.css',
    'resources/css/footer.css',
], 'public/css/styles.css');

mix.js('resources/js/quiz/app.js', 'public/js/quiz/app.js').vue({ version: 2 });
mix.js('resources/js/solution-catalog/app.js', 'public/js/solution-catalog/app.js').vue({ version: 2 });

mix.styles(['resources/css/pagemain.css'], 'public/css/mainpage/styles.css')

mix.styles(['resources/css/page-contacts.css'], 'public/css/contacts/styles.css')
mix.styles(['resources/css/page-menu.css'], 'public/css/menu/styles.css')
mix.styles(['resources/css/productscard.css'], 'public/css/menu/detail/styles.css')
mix.styles(['resources/css/menu-section.css'], 'public/css/menu/section/styles.css')
mix.styles(['resources/css/menu-section-detail.css'], 'public/css/menu/section/detail/styles.css')

mix.styles(['resources/css/service.css'], 'public/css/service/styles.css')

mix.styles(['resources/css/error.css'], 'public/css/error/styles.css')

mix.styles(['resources/css/page-delivery.css'], 'public/css/dostavka/styles.css')
mix.styles(['resources/css/oformlenie.css'], 'public/css/oformlenie/styles.css')
mix.styles(['resources/css/oformlenie-detail.css'], 'public/css/oformlenie/detail/styles.css')
mix.styles(['resources/css/aboutcompany.css'], 'public/css/company/styles.css')
mix.styles(['resources/css/page-portfolio.css'], 'public/css/portfolio/styles.css')
mix.styles(['resources/css/page-portfolio-detail.css'], 'public/css/portfolio/detail/styles.css')
mix.styles(['resources/css/page-question.css'], 'public/css/faq/styles.css')

mix.styles(['resources/css/page-reviews.css'], 'public/css/reviews/styles.css')
mix.styles(['resources/css/reviews-detail.css'], 'public/css/reviews/detail/styles.css')

mix.styles(['resources/css/vacancies.css'], 'public/css/vacancies/styles.css')
mix.styles(['resources/css/vacancies-detail.css'], 'public/css/vacancies/detail/styles.css')

mix.styles(['resources/css/personal-area.css'], 'public/css/profile/styles.css')
mix.styles(['resources/css/personal-area-detail.css'], 'public/css/profile/inner/styles.css')

mix.styles(['resources/css/policy.css'], 'public/css/policy/styles.css')

mix.styles(['resources/css/settings.css'], 'public/css/settings/styles.css')
mix.styles(['resources/css/history-order.css'], 'public/css/history-order/styles.css')
mix.styles(['resources/css/notifications.css'], 'public/css/notifications/styles.css')



mix.styles(['resources/css/basket.css'], 'public/css/basket/styles.css')

mix.styles(['resources/css/wedding.css'], 'public/css/wedding/styles.css')

mix.styles(['resources/css/welcom.css'], 'public/css/welcom/styles.css')

.copy(
  'resources/assets/img',
  'public/assets/img'
)

// mix.imgmin({
//     input: 'resources/assets/img',
//     publicPath: 'public',
//     output: 'assets/img',
//     tinyPngKey: null,
//     debug: true
// });











