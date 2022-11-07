<?php

namespace Sportic\Waiver\Waivers\Actions;

use Sportic\Waiver\Utility\Hashing;
use Sportic\Waiver\Waivers\Models\Waiver;

class CreateSecretToken
{
    protected Waiver $waiver;

    public static function for($waiver)
    {
        $action = new self();
        $action->waiver = $waiver;
        return $action;
    }

    public function assertSame(string $token): bool
    {
        return $this->generate() === $token;
    }

    public function generate(): string
    {
        return Hashing::secretToken($this->generateData());
    }

    protected function generateData(): array
    {
        return [
            'id' => $this->waiver->getId(),
            'parent_id' => $this->waiver->parent_id,
            'created' => $this->waiver->created_at,
        ];
    }
}