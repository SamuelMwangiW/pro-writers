<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class HomepageController
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
//            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'dashboardUrl' => $request->user()->dashboard(),
//            'academicLevels' => $this->collect(AcademicLevel::all()),
//            'paperTypes' => $this->collect(PaperType::all()),
//            'deadlines' => OrderDeadline::all(),
        ]);
    }

    private function collect(Collection $collection): Collection
    {
        return $collection
            ->mapWithKeys(fn($item)=>[$item->id=>$item->name]);
    }
}