<?php

namespace Sportic\Waiver\Devices\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverDeviceTrait
 */
trait WaiverDeviceTrait
{
    use RecordHasId;
    use TimestampableTrait;
}
