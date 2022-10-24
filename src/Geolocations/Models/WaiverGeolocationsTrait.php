<?php

namespace Sportic\Waiver\Geolocations\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverGeolocationsTrait
{
    use TimestampableManagerTrait;


    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::GEOLOCATIONS, WaiverGeolocations::TABLE);
    }
}
