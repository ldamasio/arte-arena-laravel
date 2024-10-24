<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Conta;
use App\Policies\ContaPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    protected $policies = [
        Conta::class => ContaPolicy::class,
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
    }
}
