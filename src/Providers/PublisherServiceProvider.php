<?php

declare(strict_types=1);

namespace YourNamespace\Translations\Providers;

use LaravelLang\Publisher\Concerns\BaseServiceProvider;
use YourNamespace\Translations\Provider;

class PublisherServiceProvider extends BaseServiceProvider
{
    protected function getProvider(): string
    {
        return Provider::class;
    }
}
