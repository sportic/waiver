<?php

namespace Sportic\Waiver\Devices\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverDevice
 * @package Sportic\Waiver\WaiverDevices\Models
 */
class WaiverDevice extends Record
{
    use WaiverDeviceTrait;
    use CommonRecordTrait;
}
