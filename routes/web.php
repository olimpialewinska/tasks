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

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\NewController::class, 'index']);

Route::get('settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings');
 
Route::get('addtask', [App\Http\Controllers\AddTaskController::class, 'index'])->name('addtask');

Route::get('adduser', [App\Http\Controllers\AddUserController::class, 'index'])->name('adduser');

Route::get('assignedtask', [App\Http\Controllers\AssignedTaskController::class, 'index'])->name('assignedtask');

Route::post('add-person', [App\Http\Controllers\AddUserController::class, 'add']);

Route::post('add-task', [App\Http\Controllers\AddTaskController::class, 'add']);

Route::get('users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');

Route::get('delete/{task}', [App\Http\Controllers\HomeController::class, 'delete']);

Route::get('deleteassigned/{task}', [App\Http\Controllers\AssignedTaskController::class, 'deleteassigned']);

Route::get('deleterel/{relations}', [App\Http\Controllers\UsersController::class, 'deleterel']);

Route::get('editassigned/{task}', [App\Http\Controllers\AssignedTaskController::class, 'editassigned']);

Route::post('updateassigned/{task}', [App\Http\Controllers\AssignedTaskController::class, 'updateassigned']);

Route::post('update/{task}', [App\Http\Controllers\HomeController::class, 'update']);
Route::get('edit/{task}', [App\Http\Controllers\HomeController::class, 'edit']);

Route::delete('deleteuser', [App\Http\Controllers\SettingsController::class, 'deleteuser']);

Route::post('updateuser', [App\Http\Controllers\SettingsController::class, 'updateuser']);

Route::get('history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');

Route::get('done/{task}', [App\Http\Controllers\HomeController::class, 'done']);

Route::get('description/{task}', [App\Http\Controllers\HistoryController::class, 'description']);





Auth::routes();




