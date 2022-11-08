<?php

namespace Sportic\Waiver\Base\Actions\Behaviours;

use Nip\Records\Record;
use Sportic\Waiver\Utility\PackageConfig;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;

trait GeneratesRecordUrls
{
    protected Record $record;

    protected string $defaultAction = 'view';

    public static function for(Record $record)
    {
        $action = new self();
        $action->record = $record;
        return $action;
    }

    public function generate($actionName = null, $params = [], $module = null)
    {
        return $this->record->compileURL(
            $actionName ?? $this->defaultAction,
            $this->generateUrlParameters($params),
            $module ?? PackageConfig::moduleFrontend()
        );
    }

    protected function generateUrlParameters($params = []): array
    {
        return array_merge(
            $params,
            [
                'id' => $this->record->getId(),
                'secret' => $this->generateUrlSecret(),
            ],
        );
    }

    abstract protected function generateUrlSecret(): string;
}
