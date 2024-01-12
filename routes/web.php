<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\BusinessUnitController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ProgressReportController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function () {
    Route::resource('developer', DeveloperController::class);
    Route::resource('businessUnit', BusinessUnitController::class);
    Route::resource('manager', ManagerController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('system', SystemController::class);
    Route::resource('progressReport', ProgressReportController::class);


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

    Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('project.index');
    Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('project.create');
    Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/{project}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('project.edit');
    Route::patch('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'update'])->name('project.update');
    Route::get('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'show'])->name('project.show');
    Route::delete('/projects/{project}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/business_units', [App\Http\Controllers\BusinessUnitController::class, 'index'])->name('businessUnit.index');
    Route::get('/business_units/create', [App\Http\Controllers\BusinessUnitController::class, 'create'])->name('businessUnit.create');
    Route::post('/business_units', [App\Http\Controllers\BusinessUnitController::class, 'store'])->name('businessUnit.store');
    Route::get('/business_units/{businessUnit}/edit', [App\Http\Controllers\BusinessUnitController::class, 'edit'])->name('businessUnit.edit');
    Route::patch('/business_units/{businessUnit}', [App\Http\Controllers\BusinessUnitController::class, 'update'])->name('businessUnit.update');
    Route::get('/business_units/{businessUnit}', [App\Http\Controllers\BusinessUnitController::class, 'show'])->name('businessUnit.show');
    Route::delete('/business_units/{businessUnit}', [App\Http\Controllers\BusinessUnitController::class, 'destroy'])->name('businessUnit.destroy');

    Route::get('/systems', [App\Http\Controllers\SystemController::class, 'index'])->name('system.index');
    Route::get('/systems/create', [App\Http\Controllers\SystemController::class, 'create'])->name('system.create');
    Route::post('/systems', [App\Http\Controllers\SystemController::class, 'store'])->name('system.store');
    Route::get('/systems/{system}/edit', [App\Http\Controllers\SystemController::class, 'edit'])->name('system.edit');
    Route::patch('/systems/{system}', [App\Http\Controllers\SystemController::class, 'update'])->name('system.update');
    Route::get('/systems/{system}', [App\Http\Controllers\SystemController::class, 'show'])->name('system.show');
    Route::delete('/systems/{system}', [App\Http\Controllers\SystemController::class, 'destroy'])->name('system.destroy');

    Route::get('/progress_reports', [App\Http\Controllers\ProgressReportController::class, 'index'])->name('progressReport.index');
    Route::get('/progress_reports/create', [App\Http\Controllers\ProgressReportController::class, 'create'])->name('progressReport.create');
    Route::post('/progress_reports', [App\Http\Controllers\ProgressReportController::class, 'store'])->name('progressReport.store');
    Route::get('/progress_reports/{progressReport}/edit', [App\Http\Controllers\ProgressReportController::class, 'edit'])->name('progressReport.edit');
    Route::patch('/progress_reports/{progressReport}', [App\Http\Controllers\ProgressReportController::class, 'update'])->name('progressReport.update');
    Route::get('/progress_reports/{progressReport}', [App\Http\Controllers\ProgressReportController::class, 'show'])->name('progressReport.show');
    Route::delete('/progress_reports/{progressReport}', [App\Http\Controllers\ProgressReportController::class, 'destroy'])->name('progressReport.destroy');

});

