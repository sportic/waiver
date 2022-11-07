<?php

namespace Sportic\Waiver\Consents\Models\Types;

use ByTIC\Models\SmartProperties\Properties\Statuses\Generic;

abstract class AbstractType extends Generic
{
    public const NAME = null;

    public function canBeCreated(): bool
    {
        return false;
    }

    protected function generateName(): string
    {
        return static::NAME;
    }
}