<?php

namespace Sportic\Waiver\Signers\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverSigners
 * @package Sportic\Waiver\Signers\Models
 */
class WaiverSigners extends RecordManager
{
    use WaiverSignersTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_signers';
    public const CONTROLLER = 'spt_waiver-signers';
}
