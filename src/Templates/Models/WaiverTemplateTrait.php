<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRecordTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableTrait;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Contents\Models\WaiverContent;

/**
 * Trait WaiverTemplateTrait
 *
 * @method WaiverContent getContentLast
 */
trait WaiverTemplateTrait
{
    use RecordHasId;
    use HasParentRecordTrait;
    use TimestampableTrait;


    protected ?string $name = null;

    protected ?int $content_last_id = null;

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

    /**
     * @return int|null
     */
    public function getContentLastId(): ?int
    {
        return $this->content_last_id;
    }

    /**
     * @param int|null $content_last_id
     */
    public function setContentLastId(?int $content_last_id): void
    {
        $this->content_last_id = $content_last_id;
    }
}
