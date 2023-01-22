<?php

namespace Sportic\Waiver\Subjects\Actions;

class CreateSecretToken extends \Sportic\Waiver\Base\Actions\CreateSecretToken
{
    protected function generateData(): array
    {
        return array_merge(
            parent::generateData(),
            [
                'id' => $this->record->id,
                'first_name' => $this->record->getFirstName(),
            ]
        );
    }
}