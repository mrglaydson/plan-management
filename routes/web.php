<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{PlanController, DetailPlanController};

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->group(function() {

        /**
        * Detalhes
        */
        Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');
        Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');
        Route::get('plans/{url}/details/{detailId}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
        
        Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
        Route::put('plans/{url}/details/{detailId}/edit', [DetailPlanController::class, 'update'])->name('details.plan.update');

        /**
        * Planos
        */
        Route::get('plans', [PlanController::class, 'index'])->name('plans.index');
        Route::any('plans/search/', [PlanController::class, 'search'])->name('plans.search');
        Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('plans/store', [PlanController::class, 'store'])->name('plans.store');
        Route::get('plans/{url}/edit/', [PlanController::class, 'edit'])->name('plan.edit');
        Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
        Route::put('plans/{url}', [PlanController::class, 'update'])->name('plan.update');
        Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
});