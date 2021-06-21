<?php

namespace App\Support\Utils;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\HtmlString;

class Vite
{

    static function assets(): HtmlString
    {
        if (self::devServerIsRunning()) {
            return self::devScripts();
        }

        return self::productionScripts();
    }

    static function devServerIsRunning(): bool
    {
        if (app()->isLocal()) {
            try {
                Http::get(self::getDevHost());
                return true;
            } catch (\Exception $exception) {
                dd($exception->getMessage());
                //return false;
            }
        }
        return false;
    }

    static function getDevHost(): string
    {
        return env('LARAVEL_SAIL')
            ? "http://host.docker.internal:3000"
            : "http://localhost:3000";
    }

    static function productionScripts(): HtmlString
    {
        $css = self::assetPath('app.css');
        $js = self::assetPath('app.js');

        return new HtmlString("<link rel='stylesheet' href='{$css}'><script type='module' src='{$js}'></script>");
    }

    static function assetPath(string $asset): string
    {
        $glob = self::glob($asset);

        if (sizeof($glob) !== 1) {
            return '';
        }

        return str_replace(public_path(), '', $glob[0]);
    }

    static function devScripts(): HtmlString
    {
        return new HtmlString(<<<HTML
            <script type="module" src="http://localhost:3000/@vite/client"></script>
            <script type="module" src="http://localhost:3000/resources/js/app.js"></script>
        HTML
        );
    }

    protected static function glob(string $asset): array|false
    {
        $asset = str_replace('.', '.*.', $asset);
        return glob(
            public_path("build/assets/{$asset}")
        );
    }
}
