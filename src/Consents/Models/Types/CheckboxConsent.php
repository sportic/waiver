<?php

namespace Sportic\Waiver\Consents\Models\Types;

/**
 *
 */
class CheckboxConsent extends AbstractType
{
    public const NAME = 'checkbox';

    public function getColorClass(): string
    {
        return 'info';
    }

    public function getIcon()
    {
        return 'fa-check-circle';
    }
}