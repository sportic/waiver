<?php

namespace Sportic\Waiver\Consents\Actions;

use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Contents\Models\WaiverContent;
use Sportic\Waiver\Devices\Actions\Create\FindOrCreateDevice;
use Sportic\Waiver\Signatures\Models\WaiverSignature;
use Sportic\Waiver\Signers\Models\WaiverSigner;
use Sportic\Waiver\Waivers\Models\Waiver;
use Symfony\Component\HttpFoundation\Request;

class RecordConsent
{
    use Behaviours\HasRepository;

    protected Waiver $waiver;
    protected WaiverContent $waiverContent;

    protected ?string $type = null;

    protected ?WaiverSigner $signer = null;
    protected ?WaiverSignature $signature = null;

    protected ?Request $request = null;

    public static function forWaiver(Waiver $waiver): static
    {
        $self = new self();
        $self->waiver = $waiver;
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

    public function withSigner(WaiverSigner $signer): static
    {
        $this->signer = $signer;
        return $this;
    }

    public function withSignature(WaiverSignature $signature): static
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * @return \Nip\Records\AbstractModels\Record
     */
    public function record(WaiverContent $waiverContent, $type = null)
    {
        $this->withType($type);
        $this->waiverContent = $waiverContent;

        $data = [];
        $this->checkDevice($data);
        $record = $this->createRecord($data);
        return $record;
    }

    protected function createRecord($data = []): WaiverConsent
    {
        $data = $this->createRecordData($data);

        /** @var WaiverConsent $record */
        $record = $this->repository->getNewRecord($data);
        $record->saveRecord();
        return $record;
    }

    protected function checkDevice(array &$data = [])
    {
        if (false === $this->hasRequest()) {
            return;
        }
        $device = FindOrCreateDevice::fromRequest($this->request)
            ->save();
        $data['device_id'] = $device->id;
    }

    protected function createRecordData($data = []): array
    {
        return array_merge($data, [
            'content_id' => $this->waiverContent->id,
            'waiver_id' => $this->waiver->id,
            'signer_id' => $this->signer?->id,
            'signature_id' => $this->signature?->id,
            'type' => $this->type
        ]);
    }

    protected function hasRequest(): bool
    {
        return $this->request instanceof Request;
    }
}
