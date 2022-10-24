<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverSignatures
 * @package Sportic\Waiver\Signatures\Models
 */
class WaiverSignatures extends RecordManager
{
    use WaiverSignaturesTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_signatures';
    public const CONTROLLER = 'spt_waiver_signatures';
}
