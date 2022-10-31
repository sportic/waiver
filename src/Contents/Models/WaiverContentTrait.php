<?php

namespace Sportic\Waiver\Contents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasId\RecordHasId;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRecordTrait;
use \ByTIC\DataObjects\Behaviors\Timestampable\TimestampableTrait;

/**
 * Trait WaiverContentTrait
 */
trait WaiverContentTrait
{
    use RecordHasId;
    use HasTemplateRecordTrait;
    use TimestampableTrait;

    protected ?string $body = null;
    protected ?int $version = null;
    /**
     * @var string
     */
    protected static $createTimestamps = ['created_at'];

    /**
     * @var string
     */
    protected static $updateTimestamps = [];

    /**
     * @return string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param int|null $version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }
}
