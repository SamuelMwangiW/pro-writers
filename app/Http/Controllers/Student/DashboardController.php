<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;

class DashboardController
{
    public function __invoke(Request $request)
    {
        return 'student dashboard';
    }
}
