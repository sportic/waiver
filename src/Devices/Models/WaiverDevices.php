<?php

namespace Sportic\Waiver\Devices\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverDevices
 * @package Sportic\Waiver\Devices\Models
 */
class WaiverDevices extends RecordManager
{
    use WaiverDevicesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_devices';
    public const CONTROLLER = 'spt_waiver-devices';
}
