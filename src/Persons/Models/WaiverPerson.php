<?php

namespace Sportic\Waiver\Persons\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverPerson
 * @package Sportic\Waiver\Persons\Models
 */
class WaiverPerson extends Record
{
    use WaiverPersonTrait;
    use CommonRecordTrait;
}
