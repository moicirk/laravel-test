<?php

use App\Http\Controllers\TestsController;
use App\Http\Controllers\UsersController;
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

Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // TODO: get info how to make Tests also available by "/" route
    Route::get('/', [TestsController::class, 'index']);

    Route::resource('tests', TestsController::class);
});
