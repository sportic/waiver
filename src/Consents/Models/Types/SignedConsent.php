<?php

namespace Sportic\Waiver\Consents\Models\Types;

/**
 *
 */
class SignedConsent extends AbstractType
{
    public const NAME = 'signed';

    public function getColorClass(): string
    {
        return 'success';
    }

    public function getIcon()
    {
        return 'fa-signature';
    }
}