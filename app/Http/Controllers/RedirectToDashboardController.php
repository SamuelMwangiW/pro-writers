<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectToDashboardController
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->to(auth()->user()->dashboard());
    }
}
