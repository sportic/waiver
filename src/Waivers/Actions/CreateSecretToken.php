<?php

namespace Sportic\Waiver\Waivers\Actions;

class CreateSecretToken extends \Sportic\Waiver\Base\Actions\CreateSecretToken
{
    protected function generateData(): array
    {
        return array_merge(
            parent::generateData(),
            [
                'parent_id' => $this->record->parent_id,
                'created' => $this->record->created_at,
            ]
        );
    }
}