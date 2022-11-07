<?php

namespace Sportic\Waiver\Waivers\Actions\Url;

use Sportic\Waiver\Utility\PackageConfig;
use Sportic\Waiver\Waivers\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;
use Sportic\Waiver\Waivers\Models\Waiver;

class CreateConsentUrl
{
    use HasRepository;

    protected Waiver $waiver;

    public static function for(Waiver $waiver)
    {
        $action = new self();
        $action->waiver = $waiver;
        return $action;
    }

    public function generate($consentType)
    {
        return $this->waiver->compileURL(
            'createConsent',
            $this->generateUrlParameters($consentType),
            PackageConfig::moduleFrontend()
        );
    }

    protected function generateUrlParameters($consentType): array
    {
        return [
            'id' => $this->waiver->getId(),
            'consentType' => $consentType,
            'secret' => CreateSecretToken::for($this->waiver)->generate(),
        ];
    }
}