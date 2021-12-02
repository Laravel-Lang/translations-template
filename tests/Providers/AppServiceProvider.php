<?php

declare(strict_types=1);

namespace Tests\Providers;

use LaravelLang\Publisher\Concerns\BaseServiceProvider;

class AppServiceProvider extends BaseServiceProvider
{
    protected function getProvider(): string
    {
        return AppProvider::class;
    }
}
