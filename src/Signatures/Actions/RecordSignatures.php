<?php

namespace Sportic\Waiver\Signatures\Actions;

use Sportic\Waiver\Signatures\Models\Types\TypedSignature;
use Sportic\Waiver\Signatures\Models\WaiverSignature;

class RecordSignatures
{
    use Behaviours\HasRepository;

    protected ?string $type = null;
    protected ?string $signature = null;

    public static function typed(string $signature): static
    {
        return self::with($signature, TypedSignature::NAME);
    }

    public static function with($signature = null, string $type = null): static
    {
        $self = new self();
        $self->signature = $signature;
        $self->withType($type);
        return $self;
    }

    public function withType(string $type = null): static
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return WaiverSignature
     */
    public function create()
    {
        $data = [
            'signature' => $this->signature,
            'type' => $this->type,
        ];
        $record = $this->createRecord($data);
        return $record;
    }

    protected function createRecord($data = []): WaiverSignature
    {
        /** @var WaiverSignature $record */
        $record = $this->repository->getNewRecord($data);
        $record->saveRecord();
        return $record;
    }
}
