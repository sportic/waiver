<?php

namespace Sportic\Waiver\Contents\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverContents
 * @package Sportic\Waiver\Contents\Models
 */
class WaiverContents extends RecordManager
{
    use WaiverContentsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_contents';
    public const CONTROLLER = 'spt_waiver_contents';
}
