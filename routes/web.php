<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\AdminTaskController;
use \App\Http\Controllers\User\UserTaskController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'is_admin',
        'name' => 'admin.',
    ], function () {
        Route::get('tasks', [AdminTaskController::class, 'index'])->name('admin_tasks.index');
    });
    Route::group([
        'prefix' => 'user',
        'name' => 'user.',
    ], function () {
        Route::get('tasks', [UserTaskController::class, 'index'])->name('user_tasks.index');
    });
});


require __DIR__ . '/auth.php';
