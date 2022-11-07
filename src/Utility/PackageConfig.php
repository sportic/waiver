<?php

namespace Sportic\Waiver\Utility;

use Exception;
use Sportic\Waiver\WaiverServiceProvider;
use Nip\Utility\Traits\SingletonTrait;

/**
 * Class PackageConfig
 * @package Sportic\Waiver\Utility
 */
class PackageConfig extends \ByTIC\PackageBase\Utility\PackageConfig
{
    use SingletonTrait;

    protected $name = WaiverServiceProvider::NAME;

    public static function configPath(): string
    {
        return __DIR__ . '/../../config/sportic_waiver.php';
    }

    public static function tableName($name, $default = null)
    {
        return static::instance()->get('tables.' . $name, $default);
    }

    /**
     * @return string|null
     * @throws Exception
     */
    public static function databaseConnection(): ?string
    {
        return (string)static::instance()->get('database.connection');
    }

    public static function shouldRunMigrations(): bool
    {
        return static::instance()->get('database.migrations', false) !== false;
    }

    public static function moduleFrontend(): string
    {
        return static::instance()->get('modules.frontend', 'frontend');
    }
}
