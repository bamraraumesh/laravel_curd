<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormController;

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

// Route::get('/home', function () {
//     return view('index');
// });



Route::get('/home', [HomeController::class, 'test'])->name('test.home');


// Route::post('/contact',[ContactController::class, 'store'])->name('contact.store');

Route::get('/contact',[ContactController::class, 'showcontact'])->name('contact.store');
Route::post('/contact',[ContactController::class, 'submitContect'])->name('submit.contact');

Route::get('/form', [FormController::class, 'showForm'])->name('show.form');
Route::post('/form', [FormController::class, 'submitForm'])->name('submit.form');

Route::get('/display',[ContactController::class,'index'])->name('index.display');
Route::get('/display/{id}',[ContactController::class,'show']);

Route::get('/contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
// Route::put('contacts/update/{id}', 'ContactController@update')->name('contacts.update');

// Route::put('contacts/update/{id}', 'ContactController@update')->name('contacts.update');
Route::delete('/display/delete/{id}', [ContactController::class, 'destroy'])->name('display.destroy');

