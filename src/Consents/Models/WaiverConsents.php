<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordsTrait;
use Nip\Records\RecordManager;

/**
 * Class WaiverConsents
 * @package Sportic\Waiver\Consents\Models
 */
class WaiverConsents extends RecordManager
{
    use WaiverConsentsTrait;
    use CommonRecordsTrait;

    public const TABLE = 'spt_waiver_consents';
    public const CONTROLLER = 'spt_waiver_consents';


}
