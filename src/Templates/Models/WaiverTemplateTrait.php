<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;

/**
 * Trait WaiverTemplateTrait
 */
trait WaiverTemplateTrait
{
    use RecordHasId;
    use HasParentRecordTrait;
    use TimestampableTrait;


    protected ?string $name = null;

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

}
