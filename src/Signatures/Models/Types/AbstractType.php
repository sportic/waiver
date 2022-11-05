<?php

namespace Sportic\Waiver\Signatures\Models\Types;

use ByTIC\Models\SmartProperties\Properties\Statuses\Generic;

abstract class AbstractType extends Generic
{
    public const NAME = null;

    protected function generateName(): string
    {
        return static::NAME;
    }
}