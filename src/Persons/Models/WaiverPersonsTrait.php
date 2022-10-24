<?php

namespace Sportic\Waiver\Persons\Models;

use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverPersonsTrait
{
    use TimestampableManagerTrait;


    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::PERSONS, WaiverPersons::TABLE);
    }
}
