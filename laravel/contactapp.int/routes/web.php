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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'contact' , 'as' => 'contact.'], function(){
    Route::get('add', [App\Http\Controllers\ContactController::class, 'add'])->name('add');
    Route::post('add', [App\Http\Controllers\ContactController::class, 'store'])->name('add.store');
    Route::get('edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('edit.update');

    Route::get('delete/{id}', [App\Http\Controllers\ContactController::class, 'delete'])->name('delete');

});