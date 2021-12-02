<?php

declare(strict_types=1);

namespace Tests\InlineOn\Console;

use LaravelLang\Publisher\Exceptions\SourceLocaleDoesntExistsException;
use LaravelLang\Publisher\Facades\Helpers\Locales;
use Tests\InlineOnTestCase;

class ResetTest extends InlineOnTestCase
{
    public function testAcceptConfirmation()
    {
        $this->artisan('lang:reset')
            ->expectsConfirmation('Do you want to reset all localizations?')
            ->expectsChoice('Select localizations to reset (specify the necessary localizations separated by commas):', $this->locale, Locales::installed())
            ->assertExitCode(0)
            ->run();
    }

    public function testUnknownLanguageFromCommand()
    {
        $this->expectException(SourceLocaleDoesntExistsException::class);
        $this->expectExceptionMessage('The source "foo" localization was not found.');

        $locales = 'foo';

        $this->artisan('lang:reset', compact('locales'))->run();
    }

    public function testReset()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('custom.hello'));
        $this->assertSame('Bar', __('custom.world'));
        $this->assertSame('Unknown Foo', __('custom.unknown'));

        $this->assertSame('Foo', __('Hello'));
        $this->assertSame('Bar', __('World'));
        $this->assertSame('Baz', __('Name'));
        $this->assertSame('Baq', __('Email'));
        $this->assertSame('Unknown Foo', __('Unknown'));

        $this->artisan('lang:reset', [
            'locales' => $this->default,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Hello!', __('custom.hello'));
        $this->assertSame('World!', __('custom.world'));
        $this->assertSame('Unknown Foo', __('custom.unknown'));

        $this->assertSame('Foo', __('Hello'));
        $this->assertSame('Bar', __('World'));
        $this->assertSame('Name', __('Name'));
        $this->assertSame('Email', __('Email'));
        $this->assertSame('Unknown Foo', __('Unknown'));
    }

    public function testFull()
    {
        $this->copyFixtures();

        $this->assertSame('Foo', __('custom.hello'));
        $this->assertSame('Bar', __('custom.world'));
        $this->assertSame('Unknown Foo', __('custom.unknown'));

        $this->assertSame('Foo', __('Hello'));
        $this->assertSame('Bar', __('World'));
        $this->assertSame('Baz', __('Name'));
        $this->assertSame('Baq', __('Email'));
        $this->assertSame('Unknown Foo', __('Unknown'));

        $this->artisan('lang:reset', [
            'locales' => $this->default,
            '--full'  => true,
        ])->run();

        $this->refreshLocales();

        $this->assertSame('Hello!', __('custom.hello'));
        $this->assertSame('World!', __('custom.world'));
        $this->assertSame('custom.unknown', __('custom.unknown'));

        $this->assertSame('Hello', __('Hello'));
        $this->assertSame('World', __('World'));
        $this->assertSame('Name', __('Name'));
        $this->assertSame('Email', __('Email'));
        $this->assertSame('Unknown', __('Unknown'));
    }
}
