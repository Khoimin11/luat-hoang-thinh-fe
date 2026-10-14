<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/gioi-thieu', 'pages.about')->name('about');
