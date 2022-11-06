<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;


trait WaiverConsentsTrait
{
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;
    use HasParentRepositoryTrait;
    use Traits\HasSmartProperties\HasSmartPropertiesRepository;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverTemplate();
        $this->initRelationsWaiverSigner();
        $this->initRelationsWaiverDevice();
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::CONSENTS, WaiverConsents::TABLE);
    }

    protected function initRelationsWaiverSigner()
    {
        $this->belongsTo('WaiverSigner', ['class' => get_class(WaiverModels::signers()), 'fk' => 'signer_id']);
    }

    protected function initRelationsWaiverDevice()
    {
        $this->belongsTo('WaiverDevice', ['class' => get_class(WaiverModels::devices()), 'fk' => 'device_id']);
    }
}
