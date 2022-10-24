<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverConsentTrait
 */
trait WaiverConsentTrait
{
    use RecordHasId;
    use HasTemplateRecordTrait;
    use TimestampableTrait;
}
