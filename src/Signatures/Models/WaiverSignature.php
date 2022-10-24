<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverSignature
 * @package Sportic\Waiver\Signatures\Models
 */
class WaiverSignature extends Record
{
    use WaiverSignatureTrait;
    use CommonRecordTrait;
}
