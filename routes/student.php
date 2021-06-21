<?php

use App\Http\Controllers\Student\DashboardController;
use App\Support\Enum\UserType;
use Illuminate\Support\Facades\Route;

$role = UserType::STUDENT;

Route::middleware(['auth:sanctum', 'verified',"role:{$role}"])->group(function (){
    Route::redirect('/', '/student/dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
