<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');