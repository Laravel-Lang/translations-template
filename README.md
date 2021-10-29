# Extended Lang Translations Template

<img src="https://preview.dragon-code.pro/andrey-helldar/translations-template.svg?brand=laravel" alt="Extended Lang Translations Template"/>

[![Stable Version][badge_stable]][link_packagist]
[![Unstable Version][badge_unstable]][link_packagist]
[![Total Downloads][badge_downloads]][link_packagist]
[![License][badge_license]][link_license]

## Prepare Template

1. Replace `<your_namespace>` with your package namespace.
2. Replace `your/namespace` in the `composer.json` file to your namespace.
3. Replace `YourNamespace\Translations` with your PSR package namespace.
4. Replace `Extended Lang Translations Template` with your package title.
5. Update tests.
6. Remove this block.

## Installation

To get the latest version of `Extended Lang Translations Template` library, simply require the project using [Composer](https://getcomposer.org):

```
$ composer require <your_namespace> --dev
```

Instead, you may of course manually update your `require` block and run `composer update` if you so choose:

```json
{
    "require": {
        "<your_namespace>": "^1.0"
    }
}
```

## Using

To install files from this repository into your project, you need to install the [andrey-helldar/laravel-lang-publisher](https://github.com/andrey-helldar/laravel-lang-publisher)
version `^10.1` and above and specify the namespace of this project in its configuration.

For example:

```php
// config/lang-publisher.php

<?php

return [
    // ...

    /*
     * Determines from which packages to synchronize localization files.
     */

    'plugins' => [
        \YourNamespace\Translations\Provider::class,
    ],
];
```

[badge_stable]:     https://img.shields.io/github/v/release/<your_namespace>?label=stable&style=flat-square

[badge_unstable]:   https://img.shields.io/badge/unstable-dev--main-orange?style=flat-square

[badge_downloads]:  https://img.shields.io/packagist/dt/<your_namespace>.svg?style=flat-square

[badge_license]:    https://img.shields.io/packagist/l/<your_namespace>.svg?style=flat-square

[link_packagist]:   https://packagist.org/packages/<your_namespace>

[link_license]:     LICENSE
