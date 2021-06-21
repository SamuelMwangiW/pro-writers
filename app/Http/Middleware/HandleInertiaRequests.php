<?php

namespace App\Http\Middleware;

use App\Support\Enum\UserType;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request)
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        if ($this->isRegisterRoute($request)){
            return $this->registerSharedData($request);
        }

        return $this->defaultSharedData($request);
    }

    private function isRegisterRoute(Request $request): bool
    {
        return $request->routeIs('register');
    }

    private function registerSharedData(Request $request): array
    {
        return array_merge(parent::share($request), [
            'types' => UserType::registrable(),
        ]);
    }

    private function defaultSharedData(Request $request): array
    {
        return array_merge(parent::share($request), [

        ]);
    }
}
