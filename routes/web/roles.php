<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::delete('/admin/{role}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
