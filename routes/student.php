<?php

use App\Http\Controllers\DraftOrderController;
use App\Http\Controllers\Student\DashboardController;
use App\Support\Enum\UserType;
use Illuminate\Support\Facades\Route;

$role = UserType::STUDENT;

Route::post('/draft', [DraftOrderController::class,'store'])->name('order.draft');

Route::middleware(['auth:sanctum', 'verified',"role:{$role}"])->group(function (){
    Route::redirect('/', '/student/dashboard');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/order/{order}/draft', [DraftOrderController::class,'edit'])->name('order.from-draft');
});
