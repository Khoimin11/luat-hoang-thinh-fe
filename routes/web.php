<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeAreaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ArticleController;

Route::view('/', 'pages.home')->name('home');

Route::view('/gioi-thieu', 'pages.about')->name('about');

Route::view('/linh-vuc-hoat-dong', 'pages.practice-areas')->name('practice-areas');

Route::get('/linh-vuc-hoat-dong/{slug}', [PracticeAreaController::class, 'show'])->name('practice-areas.show');

Route::get('/tin-tuc-va-kien-thuc-phap-luat', [NewsController::class, 'show'])->name('news');
Route::get('/tin-tuc-va-kien-thuc-phap-luat/{slug}', [NewsController::class, 'show'])->name('news.category');

Route::get('/bai-viet-chi-tiet', [ArticleController::class, 'show'])->name('article-detail');

Route::view('/doi-ngu-luat-su', 'pages.team')->name('team');

Route::view('/lien-he', 'pages.contact')->name('contact');
