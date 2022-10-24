<?php

namespace Sportic\Waiver\Base\Models\Traits;

use Sportic\Waiver\Utility\PackageConfig;
use Nip\Database\Connections\Connection;

use function app;

/**
 * Trait HasDatabaseConnectionTrait
 * @package Sportic\Waiver\Models\AbstractModels
 */
trait HasDatabaseConnectionTrait
{

    /**
     * @return Connection
     */
    protected function newDbConnection()
    {
        return app('db')->connection(PackageConfig::databaseConnection());
    }
}

