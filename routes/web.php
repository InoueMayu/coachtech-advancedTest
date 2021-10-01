<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');

Route::post('confirm', [App\Http\Controllers\ContactController::class, 'confirm'])->name('contact.confirm');

Route::post('process', [App\Http\Controllers\ContactController::class, 'process'])->name('contact.process');

Route::get('thanks', [App\Http\Controllers\ContactController::class, 'thanks'])->name('contact.thanks');

Route::get('search', [App\Http\Controllers\ContactController::class, 'search'])->name('contact.search');

Route::delete('delete/{id}', [App\Http\Controllers\ContactController::class,'destroy'])->name('contact.destroy');
