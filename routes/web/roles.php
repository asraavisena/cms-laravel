<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');