<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', 'HomeController@index');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/single', [App\Http\Controllers\HomeController::class, 'single'])->name('single');

Route::get('/info', function () {
    return view('infoedoc');
})->name('info');

Route::get('/lunessai', function () {
    return view('lunessai');
})->name('lunessai');

Route::get('/contatti', function () {
    return view('contattiemappa');
})->name('contatti');

Route::get('/storico', function () {
    return view('storico');
})->name('storico');