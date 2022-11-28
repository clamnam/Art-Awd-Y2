<?php

use App\Http\Controllers\user\ArtController as UserArtController;
use App\Http\Controllers\admin\ArtController as AdminArtController;

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ArtController;

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

Route::get('/', function () {
    return view('welcome');
});



//Route::resource('/arts', ArtController::class)->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');


Route::resource('/admin/arts', AdminArtController::class)->middleware(['auth'])->names('admin.arts');


Route::resource('/user/arts', UserArtController::class)->middleware(['auth'])->names('user.arts')->only(['index', 'show']);
