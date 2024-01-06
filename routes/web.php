<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/developers', [App\Http\Controllers\DeveloperController::class, 'index'])->name('developer.index');
Route::get('/developers/create', [App\Http\Controllers\DeveloperController::class, 'create'])->name('developer.create');
Route::post('/developers', [App\Http\Controllers\DeveloperController::class, 'store'])->name('developer.store');
Route::get('/developers/{developer}/edit', [App\Http\Controllers\DeveloperController::class, 'edit'])->name('developer.edit');
Route::patch('/developers/{developer}', [App\Http\Controllers\DeveloperController::class, 'update'])->name('developer.update');
Route::get('/developers/{developer}', [App\Http\Controllers\DeveloperController::class, 'show'])->name('developer.show');
Route::delete('/developers/{developer}', [App\Http\Controllers\DeveloperController::class, 'destroy'])->name('developer.destroy');

Route::get('/managers', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager.index');
Route::get('/managers/create', [App\Http\Controllers\ManagerController::class, 'create'])->name('manager.create');
Route::post('/managers', [App\Http\Controllers\ManagerController::class, 'store'])->name('manager.store');
Route::get('/managers/{manager}/edit', [App\Http\Controllers\ManagerController::class, 'edit'])->name('manager.edit');
Route::patch('/managers/{manager}', [App\Http\Controllers\ManagerController::class, 'update'])->name('manager.update');
Route::get('/managers/{manager}', [App\Http\Controllers\ManagerController::class, 'show'])->name('manager.show');
Route::delete('/managers/{manager}', [App\Http\Controllers\ManagerController::class, 'destroy'])->name('manager.destroy');

Route::get('/project', [App\Http\Controllers\ProjectController::class, 'index']);
Route::get('/project/create', [App\Http\Controllers\ProjectController::class, 'create']);
Route::post('/project', [App\Http\Controllers\ProjectController::class, 'store']);
