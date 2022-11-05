<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasHash;

trait RecordHasHash
{
    protected ?string $hash = null;

    public function getHash(): ?string
    {
        return $this->hash;
    }

}
