<?php

namespace Sportic\Waiver\Persons\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverPersons
 * @package Sportic\Waiver\Persons\Models
 */
class WaiverPersons extends RecordManager
{
    use WaiverPersonsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_persons';
    public const CONTROLLER = 'spt_waiver_persons';
}
