<?php

namespace Sportic\Waiver\Waivers\Actions\Url;

use Nip\Records\Record;
use Sportic\Waiver\Subjects\Actions\CreateSecretToken;
use Sportic\Waiver\Utility\PackageConfig;
use Sportic\Waiver\Waivers\Actions\Behaviours\HasRepository;

class CreateWaiverForSubject
{
    use HasRepository;

    protected Record $subject;

    public function __construct($repository = null)
    {
        $this->initRepository($repository);
    }
    public static function for(Record $subject, $consentType = null)
    {
        $action = new self();
        $action->subject = $subject;
        return $action->generate(null, ['consentType' => $consentType]);
    }

    public function generate($actionName = null, $params = [], $module = null)
    {
        return $this->repository->compileURL(
            $actionName ?? 'createForSubject',
            $this->generateUrlParameters($params),
            $module ?? PackageConfig::moduleFrontend()
        );
    }

    protected function generateUrlParameters($params = []): array
    {
        return array_merge(
            $params,
            [
                'parent_id' => $this->subject->id,
                'parent_type' => $this->subject->getManager()->getMorphName(),
                'secret' => $this->generateUrlSecret(),
            ],
        );
    }

    protected function generateUrlSecret(): string
    {
        return CreateSecretToken::for($this->subject)->generate();
    }
}