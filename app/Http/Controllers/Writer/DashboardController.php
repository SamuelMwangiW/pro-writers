<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Writer/Dashboard');
    }
}
