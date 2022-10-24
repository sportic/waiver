<?php

namespace Sportic\Waiver\Contents\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverContent
 * @package Sportic\Waiver\Contents\Models
 */
class WaiverContent extends Record
{
    use WaiverContentTrait;
    use CommonRecordTrait;

    /**
     * @var string
     */
    protected static $createTimestamps = ['created_at'];

    /**
     * @var string
     */
    protected static $updateTimestamps = [];
}
