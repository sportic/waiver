<?php

namespace Sportic\Waiver\Persons\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasHash\RecordHasHash;
use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverPersonTrait
 */
trait WaiverPersonTrait
{
    use RecordHasId;
    use RecordHasHash;
    use TimestampableTrait;
}
