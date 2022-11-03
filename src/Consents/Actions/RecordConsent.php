<?php

namespace Sportic\Waiver\Consents\Actions;

use Sportic\Waiver\Consents\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Waivers\Models\Waiver;
use Symfony\Component\HttpFoundation\Request;

class RecordConsent
{
    use HasRepository;

    protected Waiver $waiver;
    protected ?string $type = null;

    protected ?Request $request = null;

    public static function forWaiver(Waiver $waiver): static
    {
        $self = new self($waiver);
        return $self;
    }

    public function withType(string $type = null): static
    {
        $this->type = $type;
        return $this;
    }
    public function withRequest(Request $request): static
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return \Nip\Records\AbstractModels\Record
     */
    public function record()
    {
        $record = $this->createRecord();
        return $record;
    }

    protected function createRecord(): WaiverContent
    {
        $data = $this->createRecordData();

        /** @var WaiverContent $record */
        $record = $this->repository->getNewRecord($data);
        $record->saveRecord();
        return $record;
    }

    protected function createRecordData($data = []): array
    {
        return array_merge($data, [
            'waiver_id' => $this->waiver->id,
            'type' => $this->type
        ]);
    }
}
