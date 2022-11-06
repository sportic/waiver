<?php

namespace Sportic\Waiver\Signers\Models;

use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverSignersTrait
{
    use TimestampableManagerTrait;


    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::SIGNERS, WaiverSigners::TABLE);
    }
}
