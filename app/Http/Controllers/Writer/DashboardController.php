<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {
        return 'writer dashboard';
    }
}
