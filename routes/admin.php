<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Support\Enum\UserType;
use Illuminate\Support\Facades\Route;

$role = UserType::ADMIN;

Route::middleware(['auth:sanctum', 'verified', "role:{$role}"])->group(function () {
    Route::redirect('/', '/writer/dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
