<?php

namespace Sportic\Waiver\Geolocations\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverGeolocation
 * @package Sportic\Waiver\Geolocations\Models
 */
class WaiverGeolocation extends Record
{
    use WaiverGeolocationTrait;
    use CommonRecordTrait;
}
