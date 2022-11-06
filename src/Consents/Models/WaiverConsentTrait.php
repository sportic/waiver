<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordTrait as HasTypesRecordTrait;
use Sportic\Waiver\Devices\Models\WaiverDevice;
use Sportic\Waiver\Signers\Models\WaiverSigner;

/**
 * Trait WaiverConsentTrait
 * @method WaiverSigner getWaiverSigner()
 * @method WaiverDevice getWaiverDevice()
 */
trait WaiverConsentTrait
{
    use RecordHasId;
    use HasTemplateRecordTrait;
    use \ByTIC\DataObjects\Behaviors\Timestampable\TimestampableTrait;
    use HasTypesRecordTrait;

    /**
     * @var string
     */
    protected static $createTimestamps = ['given_at'];

    /**
     * @var string
     */
    protected static $updateTimestamps = [];
}
