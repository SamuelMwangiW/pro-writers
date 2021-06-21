<?php

namespace App\Models;

use App\Support\Contracts\HasDashboardRoute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Parental\HasParent;

class Student extends User implements HasDashboardRoute
{
    use HasFactory;
    use HasParent;

    public $guarded = [];

    function dashboard(): string
    {
        return route('student.dashboard');
    }
}