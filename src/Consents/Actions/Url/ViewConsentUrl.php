<?php

namespace Sportic\Waiver\Consents\Actions\Url;

use Sportic\Waiver\Base\Actions\Behaviours\GeneratesRecordUrls;
use Sportic\Waiver\Utility\PackageConfig;
use Sportic\Waiver\Waivers\Actions\Behaviours\HasRepository;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;

class ViewConsentUrl
{
    use HasRepository;
    use GeneratesRecordUrls {
        GeneratesRecordUrls::generateUrlParameters as generateUrlParametersTrait;
    }

    protected function generateUrlSecret(): string
    {
        return CreateSecretToken::for($this->record)->generate();
    }
}