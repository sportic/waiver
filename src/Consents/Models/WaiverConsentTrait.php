<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordTrait as HasTypesRecordTrait;

/**
 * Trait WaiverConsentTrait
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
