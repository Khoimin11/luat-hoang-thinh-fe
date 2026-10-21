<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/gioi-thieu', 'pages.about')->name('about');

Route::view('/linh-vuc-hoat-dong', 'pages.practice-areas')->name('practice-areas');

Route::view('/linh-vuc-hoat-dong/luat-dat-dai', 'pages.practice-area-detail')->name('practice-areas.land');

Route::view('/tin-tuc-va-kien-thuc-phap-luat', 'pages.news')->name('news');

Route::view('/doi-ngu-luat-su', 'pages.team')->name('team');

Route::view('/lien-he', 'pages.contact')->name('contact');
