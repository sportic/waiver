<?php

namespace Sportic\Waiver\Base\Models\Traits;

use ByTIC\Records\Behaviors\HasForms\HasFormsRecordTrait;

/**
 * Trait CommonRecordTrait
 * @package Sportic\Waiver\Models\AbstractModels
 */
trait CommonRecordTrait
{
    use HasFormsRecordTrait;
    public function getRegistry()
    {
    }

}
