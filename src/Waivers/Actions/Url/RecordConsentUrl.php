<?php

namespace Sportic\Waiver\Waivers\Actions\Url;

use Sportic\Waiver\Base\Actions\Behaviours\GeneratesRecordUrls;
use Sportic\Waiver\Waivers\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;

class RecordConsentUrl
{
    use HasRepository;
    use GeneratesRecordUrls;

    public function __construct($repository = null)
    {
        $this->initRepository($repository);
        $this->defaultAction = 'recordConsent';
    }

    public function generateFor($consentType, $module = null): string
    {
        return $this->generate(null, ['consentType' => $consentType], $module);
    }

    protected function generateUrlSecret(): string
    {
        return CreateSecretToken::for($this->record)->generate();
    }
}