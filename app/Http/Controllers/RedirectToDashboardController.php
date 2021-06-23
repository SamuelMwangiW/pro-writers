<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectToDashboardController
{
    public function __invoke(Request $request): RedirectResponse
    {
        return redirect()->to($request->user()->dashboard());
    }
}
