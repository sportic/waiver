<?php

namespace Sportic\Waiver\Geolocations\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverGeolocations
 * @package Sportic\Waiver\Geolocations\Models
 */
class WaiverGeolocations extends RecordManager
{
    use WaiverGeolocationsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_geolocations';
    public const CONTROLLER = 'spt_waiver_geolocations';
}
