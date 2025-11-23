<?php

namespace Sportic\Waiver;

use ByTIC\PackageBase\BaseBootableServiceProvider;
use Sportic\Waiver\Utility\PackageConfig;

/**
 * Class NewsletterServiceProvider
 * @package Sportic\Waiver
 */
class WaiverServiceProvider extends BaseBootableServiceProvider
{
    public const NAME = 'sportic_waiver';


    public function migrations(): ?string
    {
        if (PackageConfig::shouldRunMigrations()) {
            return dirname(__DIR__) . '/database/migrations/';
        }

        return null;
    }
    protected function translationsPath(): string
    {
        return __DIR__ . '/Bundle/Resources/lang/';
    }

}
