<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasParentRecord;

use Nip\Records\Record;

/**
 * @method Record getNewsletterOwner()
 */
trait HasParentRecordTrait
{

    protected ?string $parent = null;

    protected ?int $parent_id = null;

    /**
     * @return string|null
     */
    public function getParentName(): ?string
    {
        return $this->parent;
    }

    /**
     * @param string|null $parent
     */
    public function setParentName(?string $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parent_id;
    }

    /**
     * @param int|null $owner_id
     */
    public function setParentId(?int $owner_id): void
    {
        $this->parent_id = $owner_id;
    }
}
