<?php

namespace Sportic\Waiver\Base\Actions\Behaviours;

use Nip\Records\AbstractModels\Record;
use Nip\Records\AbstractModels\RecordManager;

trait HasRepository
{
    protected RecordManager $repository;

    /**
     * @param $repository
     */
    public function __construct($repository = null)
    {
        $this->initRepository($repository);
    }

    protected function initRepository($repository = null): void
    {
        $this->repository = $repository ?? $this->generateRepository();
    }

    protected function createRecord($data): Record
    {
        $contact = $this->generateNewRecord($data);
        $contact->save();
        return $contact;
    }

    protected function generateNewRecord($data): Record
    {
        return $this->repository->getNewRecord($data);
    }

    abstract protected function generateRepository(): RecordManager;

}