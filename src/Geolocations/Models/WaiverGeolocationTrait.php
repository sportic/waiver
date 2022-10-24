<?php

namespace Sportic\Waiver\Geolocations\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverGeolocationTrait
 */
trait WaiverGeolocationTrait
{
    use RecordHasId;
    use TimestampableTrait;
}
