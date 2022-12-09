<?php

use App\Http\Controllers\User\ArtController as UserArtController;
use App\Http\Controllers\Admin\ArtController as AdminArtController;
use App\Http\Controllers\Admin\PatronController as AdminPatronController;
use App\Http\Controllers\User\PatronController as UserPatronController;
use App\Http\Controllers\Admin\StyleController as AdminStyleController;
use App\Http\Controllers\User\StyleController as UserStyleController;


use Illuminate\Support\Facades\Route;
use Database\Seeders\ArtSeeder;
/*
|-------------------------------------------------------- ------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/arts', ArtController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/home/patrons', [App\Http\Controllers\HomeController::class, 'patronIndex'])->name('home.patron.index');
Route::get('/home/styles', [App\Http\Controllers\HomeController::class, 'styleIndex'])->name('home.style.index');

Route::resource('/admin/arts', AdminArtController::class)->middleware(['auth'])->names('admin.arts');
Route::resource('/user/arts', UserArtController::class)->middleware(['auth'])->names('user.arts')->only(['index', 'show']);
Route::resource('/admin/patrons', AdminPatronController::class)->middleware(['auth'])->names('admin.patrons');
Route::resource('/user/patrons', UserPatronController::class)->middleware(['auth'])->names('user.patrons')->only(['index', 'show']);

Route::resource('/admin/styles', AdminStyleController::class)->middleware(['auth'])->names('admin.styles');
Route::resource('/user/styles', UserStyleController::class)->middleware(['auth'])->names('user.styles');
