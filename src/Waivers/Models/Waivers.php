<?php

namespace Sportic\Waiver\Waivers\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class Waivers
 * @package Sportic\Waiver\Waivers\Models
 */
class Waivers extends RecordManager
{
    use WaiversTrait, CommonRecordsTrait {
        WaiversTrait::generateFilterManagerClass insteadof CommonRecordsTrait;
        WaiversTrait::getFormClassName insteadof CommonRecordsTrait;
    }

    public const TABLE = 'spt_waiver_waivers';
    public const CONTROLLER = 'spt_waiver-waivers';
}
