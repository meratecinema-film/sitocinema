<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', 'HomeController@index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single', [App\Http\Controllers\HomeController::class, 'single'])->name('single');

Route::get('/info-sala', function () {
    return view('info-sala');
})->name('info-sala');

Route::get('/biglietti-promo', function () {
    return view('biglietti-promo');
})->name('biglietti-promo');

Route::get('/dove-siamo', function () {
    return view('dove-siamo');
})->name('dove-siamo');

Route::get('/contatti', function () {
    return view('contatti');
})->name('contatti');

//Route::get('/lunessai', function () {
//    return view('lunessai');
//})->name('lunessai');

Route::get('/storico', function () {
    return view('storico');
})->name('storico');