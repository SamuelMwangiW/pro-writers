<?php

namespace App\Providers;

use App\Support\Utils\Vite;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class ViteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('vite_assets', fn()=>Vite::assets());
    }
}
