<?php

declare(strict_types=1);

namespace YourNamespace\Translations\Plugins;

use LaravelLang\Publisher\Plugins\BasePlugin;

class Bar extends BasePlugin
{
    public function vendor(): string
    {
        return 'laravel/framework';
    }

    public function files(): array
    {
        return [
            'packages/bar.json' => 'custom/{locale}.json',
        ];
    }
}
