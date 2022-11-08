<?php

namespace Sportic\Waiver\Consents\Actions;

class CreateSecretToken extends \Sportic\Waiver\Base\Actions\CreateSecretToken
{
    protected function generateData(): array
    {
        return array_merge(
            parent::generateData(),
            [
                'given_at' => $this->record->created_at,
            ]
        );
    }
}