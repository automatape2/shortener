<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::resource('urls', UrlController::class);