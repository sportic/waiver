<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordTrait as HasTypesRecordTrait;

/**
 * Trait WaiverSignatureTrait
 */
trait WaiverSignatureTrait
{
    use RecordHasId;
    use TimestampableTrait;
    use HasTypesRecordTrait;

    protected ?string $signature;

    public function getSignature(): ?string
    {
        return $this->signature;
    }
}
