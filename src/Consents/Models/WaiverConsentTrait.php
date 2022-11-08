<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordTrait as HasTypesRecordTrait;
use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Devices\Models\WaiverDevice;
use Sportic\Waiver\Signatures\Models\WaiverSignature;
use Sportic\Waiver\Signers\Models\WaiverSigner;
use Sportic\Waiver\Waivers\Models\Waiver;

/**
 * Trait WaiverConsentTrait
 * @method Waiver getWaiver()
 * @method WaiverSigner getWaiverSigner()
 * @method WaiverContent getWaiverContent()
 * @method WaiverSignature getWaiverSignature()
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

    public function getName()
    {
        return $this->getManager()->getLabel('title.singular')
            . ' ' . $this->getType()->getLabel()
            . ' #' . md5($this->getId());
    }
}
