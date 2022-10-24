<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverSignatureTrait
 */
trait WaiverSignatureTrait
{
    use RecordHasId;
    use TimestampableTrait;
}
