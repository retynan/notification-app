<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [NotificationController::class, 'index'])->name('notification.index');
Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notification.create');
Route::post('/notifications', [NotificationController::class, 'store'])->name('notification.store');
Route::get('/notifications/{notification}', [NotificationController::class, 'show'])->name('notification.show');
Route::get('/notifications/{notification}/edit', [NotificationController::class, 'edit'])->name('notification.edit');
Route::put('/notifications/{notification}', [NotificationController::class, 'update'])->name('notification.update');
Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');
