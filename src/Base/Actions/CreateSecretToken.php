<?php

namespace Sportic\Waiver\Base\Actions;

use Nip\Records\Record;
use Sportic\Waiver\Utility\Hashing;

class CreateSecretToken
{
    protected Record $record;

    public static function for($waiver)
    {
        $action = new self();
        $action->record = $waiver;
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
        $id = method_exists($this->record, 'getId') ? $this->record->getId() : $this->record->id;
        $id = (string)$id;
        return [
            'id' => $id,
        ];
    }
}