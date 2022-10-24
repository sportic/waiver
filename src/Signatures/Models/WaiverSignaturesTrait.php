<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverSignaturesTrait
{
    use TimestampableManagerTrait;


    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::SIGNATURES, WaiverSignatures::TABLE);
    }
}
