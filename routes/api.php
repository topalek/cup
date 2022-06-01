<?php

//use App\Http\Controllers\API\FAQController;
//use App\Http\Controllers\API\ReviewController;
//use App\Http\Controllers\API\SEOController;
//use App\Http\Controllers\API\VacancyController;

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
//
//Route::resources([
//    'faq' => FAQController::class,
//    'seo' => SEOController::class,
//    'review' => ReviewController::class,
//    'vacancy' => VacancyController::class,
//]);

Route::get('apiquiz', [FrontendController::class, 'renderAPIQuiz']);


Route::prefix('auth')->group(function () {
     Route::post('register', 'AuthController@register');
     Route::post('login', 'AuthController@login');
     Route::get('refresh', 'AuthController@refresh');

     Route::group(['middleware' => 'auth:api'], function () {
         Route::get('user', 'AuthController@user');
         Route::post('logout', 'AuthController@logout');
     });
});

 Route::group(['middleware' => 'auth:api'], function () {
     // Users
     Route::get('users', 'UserController@index')->middleware('isAdmin');
     Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
 });

 Route::get('menuprod/{url}', [FrontendController::class, 'renderMenuProductAPI']);