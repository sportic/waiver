<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverTemplate
 * @package Sportic\Waiver\Templates\Models
 */
class WaiverTemplate extends Record
{
    use WaiverTemplateTrait;
    use CommonRecordTrait;
}
