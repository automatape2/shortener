<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('{shortener_url}', [UrlController::class, 'shortenLink'])->name('shortener-url');
 