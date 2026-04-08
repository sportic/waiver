<?php

namespace Sportic\Waiver\Consents\SignerRelations;

use ByTIC\Models\SmartProperties\Properties\Types\Generic;

abstract class AbstractType extends Generic
{
    public const NAME = null;

    protected function generateName(): string
    {
        return static::NAME;
    }

    public function getLabel($short = false): ?string
    {
        return translator()->trans('spt_waiver-consents.signer_relations.' . static::NAME);
    }
}
