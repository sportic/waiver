<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverConsent
 * @package Sportic\Waiver\WaiverConsents\Models
 */
class WaiverConsent extends Record
{
    use WaiverConsentTrait;
    use CommonRecordTrait;

    /**
     * @var string
     */
    protected static $createTimestamps = ['given_at'];

    /**
     * @var string
     */
    protected static $updateTimestamps = [];
}
