<?php

namespace Sportic\Waiver\Waivers\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverTrait
 */
trait WaiverTrait
{
    use RecordHasId;
    use HasTemplateRecordTrait;
    use HasParentRecordTrait;
    use TimestampableTrait;
}
