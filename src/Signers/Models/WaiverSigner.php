<?php

namespace Sportic\Waiver\Signers\Models;

use Sportic\Waiver\Base\Models\Traits\CommonRecordTrait;
use Nip\Records\Record;

/**
 * Class WaiverSigner
 * @package Sportic\Waiver\Signers\Models
 */
class WaiverSigner extends Record
{
    use WaiverSignerTrait;
    use CommonRecordTrait;


}
