<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

Route::resource('urls', UrlController::class);

Route::get('version', function () {
    return response()->json(['version' => '2.0.0']);
});
