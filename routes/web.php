<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'renderMain'])->name('mainpage');
Route::get('/kontakty', [FrontendController::class, 'renderContacts']);
Route::get('/o-kompanii', [FrontendController::class, 'renderAboutCompany']);
Route::get('/dostavka-oplata', [FrontendController::class, 'renderDelivery']);
Route::get('/faq', [FrontendController::class, 'renderFAQ']);
Route::get('/otzyvy', [FrontendController::class, 'renderReviews']);
Route::get('/otzyvy/{url}', [FrontendController::class, 'renderReviewsDetail']);
Route::get('/vakansii', [FrontendController::class, 'renderVacancy']);
Route::get('/vakansii/{url}', [FrontendController::class, 'renderVacancyDetail']);
Route::get('/menu', [FrontendController::class, 'renderMenu'])->name('menu');
Route::get('/menu/{slug}', [FrontendController::class, 'renderMenuCategory']);
Route::get('/menu/{category}/{product}', [FrontendController::class, 'renderMenuProduct']);

Route::get('/portfolio', [FrontendController::class, 'renderPortf'])->name('portfolio');
Route::get('/portfolio/{elem}', [FrontendController::class, 'renderPortfCategory']);
Route::get('/portfolio/{catelem}/{prof}', [FrontendController::class, 'renderPortfCategoryEl']);

Route::get('/oformlenie', [FrontendController::class, 'renderOrf'])->name('oformlenie');
Route::get('/oformlenie/{elemof}', [FrontendController::class, 'renderOrfEl']);
Route::get('/oformleniedet/{elemofdet}', [FrontendController::class, 'renderOrfElDet']);

Route::get('/uslugi', [FrontendController::class, 'renderMenuUslugi'])->name('uslugi');

Route::get('/basket', [CartController::class, 'basket'])->name('basket');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('addToCart');

Route::post('/remove-to-cart', [CartController::class, 'removeCart'])->name('removeCart');
Route::post('/clear', [CartController::class, 'clearAllCart'])->name('clearAllCart');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('updateCart');
Route::post('/addToCartGot', [CartController::class, 'addToCartGotResh'])->name('addToCartGot');

Route::post('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::delete('/order/{order}/delete/{product}', [OrderController::class, 'deleteProduct'])->name('order.delete.product');


Route::get('/format/{elem}', [FrontendController::class, 'renderFormatelem']);
Route::get('/povod/{elem}', [FrontendController::class, 'renderPovodEl']);

Route::get('/politics', [FrontendController::class, 'renderPolitics']);
Route::get('/agreement', [FrontendController::class, 'renderAgreement']);




Route::get('/menu/1', function () {
    return view('menu.detail', ['title' => 'Menu detail']);
});

Route::get("/menu/section/", function () {
    return view('menu.section.index', ['title' => 'Детское меню']);
});

Route::get('/menu/gotovie', function () {
    return view('menu.ready.index', ['title' => 'Готовые решения']);
});

Route::get('/cabinet', function () {
    return view('cabinet.index', ['title' => 'Личный кабинет']);
});
Route::get('/cabinet/personal', function () {
    return view('cabinet.personal.index', ['title' => 'Личные данные']);
});


/* Отправка почты*/
Route::post('sendEmail', [MailController::class, 'sendEmail'])->name('sendEmail');
Route::post('send-form', [MailController::class, 'sendEmailFb'])->name('send.form');
Route::post('send-form-2', [MailController::class, 'sendEmailFb2'])->name('send.form.2');

Route::post('send-modal', [MailController::class, 'sendModalZakMer'])->name('send.modal');
Route::post('send-modal-2', [MailController::class, 'sendModalRevVak'])->name('send.modal.2');
Route::post('send-modal-3', [MailController::class, 'sendModalFaq'])->name('send.modal.3');
Route::post('send-modal-4', [MailController::class, 'sendModalRevVak2'])->name('send.modal.4');
Route::post('send-modal-5', [MailController::class, 'sendModalZakZvonka'])->name('send.modal.5');


/* Авторизация и регистрация */
Route::name('user.')->group(function(){


    /********** Кабинет ***********/
    Route::get('/kabinet', [UserController::class, 'EnterKabUsers'])->name('kabinet');
    Route::get('/kabinet/settings', [UserController::class, 'KabinetSet'])->name('settings');
    Route::get('/kabinet/history-order', [UserController::class, 'KabinetHistOrd'])->name('history');
    Route::get('/kabinet/order/{order}', [UserController::class, 'order'])->name('order');
    Route::get('/kabinet/order/{order}/download', [UserController::class, 'orderDownload'])->name(
        'order.download'
    );
    Route::get('/kabinet/notifications', [UserController::class, 'KabinetNot'])->name(
        'notifications'
    );
    Route::get('/kabinet/personal-area', [UserController::class, 'KabinePersArea'])->name('personal');
    Route::post('/kabinet/personal-area', [UserController::class, 'KabinePersSaveArea'])->name('savedata');
    Route::post('/kabinet/settings', [UserController::class, 'KabineSavePass'])->name('setsavepas');


    Route::get('/login', [UserController::class, 'FormLoginUsers'])->name('login');
    Route::post('/login', [UserController::class, 'LoginUsers']);

    Route::get('/logout', function(){
      Auth::logout();
      return redirect(route('mainpage'));
    })->name('logout');


    Route::get('/registration', [UserController::class, 'FormRegUsers']);

    Route::post('/registration', [UserController::class, 'RegUsers'])->name('registration');

    Route::get('/restore', [UserController::class, 'FormRestUsers'])->middleware('guest')->name('restore');

    Route::post('/restore', [UserController::class, 'FormGoRestUsers'])->name('restorex');

    Route::post('/reset-password', [UserController::class, 'UpdatePasUsers'])->middleware('guest')->name('updatepas');



});

Route::get('/reset-password/{token}', [UserController::class, 'FormGoRestTokenUsers'])->middleware('guest')->name('password.reset');
