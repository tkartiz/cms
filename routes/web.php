<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\DeletedAnnounceController;


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

// アプリ用
Route::resource('announces', AnnounceController::class)
->middleware(['auth']);

Route::resource('deleted_announces', DeletedAnnounceController::class)
->middleware(['auth']);




Route::get('/', function () {
    return view('m-shonanchigasaki');
})->name('home');

Route::get('/cms', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
