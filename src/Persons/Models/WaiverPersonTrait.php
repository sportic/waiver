<?php

namespace Sportic\Waiver\Persons\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverPersonTrait
 */
trait WaiverPersonTrait
{
    use RecordHasId;
    use TimestampableTrait;
}
