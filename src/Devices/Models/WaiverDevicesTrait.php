<?php

namespace Sportic\Waiver\Devices\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverDevicesTrait
{
    use TimestampableManagerTrait;


    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::DEVICES, WaiverDevices::TABLE);
    }
}
