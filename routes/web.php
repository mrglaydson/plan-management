<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/plans', [PlanController::class, 'index'])->name('plans.index');

Route::any('admin/plans/search/', [PlanController::class, 'search'])->name('plans.search');

Route::get('admin/plans/create', [PlanController::class, 'create'])->name('plans.create');

Route::post('admin/plans/store', [PlanController::class, 'store'])->name('plans.store');

Route::get('admin/plans/{url}/edit/', [PlanController::class, 'edit'])->name('plan.edit');

Route::get('admin/plans/{url}', [PlanController::class, 'show'])->name('plans.show');

Route::put('admin/plans/{url}', [PlanController::class, 'update'])->name('plan.update');

Route::delete('admin/plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');