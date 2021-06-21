<?php

use App\Http\Controllers\Writer\DashboardController;
use App\Support\Enum\UserType;
use Illuminate\Support\Facades\Route;

$role = UserType::WRITER;

Route::middleware(['auth:sanctum', 'verified',"role:{$role}"])->group(function (){
    Route::redirect('/', '/writer/dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});
