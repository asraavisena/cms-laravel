<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
Route::post('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'store'])->name('permissions.store');
Route::get('/admin/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
Route::delete('/admin/permissions/{permission}/delete', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');

Route::patch('/admin/permissions/{permission}/update', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');