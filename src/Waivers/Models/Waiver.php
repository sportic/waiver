<?php

namespace Sportic\Waiver\Waivers\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class Waiver
 * @package Sportic\Waiver\Waivers\Models
 */
class Waiver extends Record
{
    use WaiverTrait;
    use CommonRecordTrait;
}
