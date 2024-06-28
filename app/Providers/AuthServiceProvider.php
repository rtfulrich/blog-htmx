<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\User\User;
use App\Support\Enums\User\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{App, Gate};
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerDevToolsAuthorizations();

        $this->defineGates();
    }

    private function registerDevToolsAuthorizations(): void
    {
        LogViewer::auth(function (Request $request) {
            /** @var ?User $user */
            $user = $request->user();

            return App::isLocal() ? true : (bool) $user?->hasAnyRole([RoleEnum::SUPERADMIN]);
        });
    }

    private function defineGates(): void
    {
        Gate::before(fn (User $user, string $ability) => $user->hasRole(RoleEnum::SUPERADMIN) ? true : null);
    }
}
