<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->group(function(){
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
        Route::any('plans/search/', [PlanController::class, 'search'])->name('plans.search');
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans/{url}/edit/', [PlanController::class, 'edit'])->name('plan.edit');
        Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
        Route::put('plans/{url}', [PlanController::class, 'update'])->name('plan.update');
        Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
});