<?php

namespace Sportic\Waiver\Consents\Models\Types;

use ByTIC\Models\SmartProperties\Properties\Statuses\Generic;

abstract class AbstractType extends Generic
{
    public const NAME = null;

    protected function generateName(): string
    {
        return static::NAME;
    }
}