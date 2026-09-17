<?php

namespace App\Providers;

use App\Services\SiteSettingsService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SiteSettingsService::class, function () {
            return new SiteSettingsService();
        });
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $settingsService = app(SiteSettingsService::class);
            $view->with('globalSettings', $settingsService->getSettings());
            $view->with('globalProfile', $settingsService->getProfile());
        });
    }
}