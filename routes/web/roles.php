<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');
Route::post('/admin/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::delete('/admin/{role}/delete', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/admin/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');
Route::patch('/admin/{role}/update', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');

Route::put('/admin/{role}/attach', [App\Http\Controllers\RoleController::class, 'attach_permission'])->name('role.permission.attach');
Route::put('/admin/{role}/detach', [App\Http\Controllers\RoleController::class, 'detach_permission'])->name('role.permission.detach');
