<?php

declare(strict_types=1);

namespace YourNamespace\Translations\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use LaravelLang\Publisher\Concerns\BaseServiceProvider;

class AppServiceProvider extends LaravelServiceProvider
{
    public function register()
    {
        if (class_exists(BaseServiceProvider::class)) {
            $this->app->register(PublisherServiceProvider::class);
        }
    }
}
