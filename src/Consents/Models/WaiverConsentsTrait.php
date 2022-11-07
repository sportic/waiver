<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Consents\Models\Types\AbstractType;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;


/**
 * @method AbstractType[] getTypes
 */
trait WaiverConsentsTrait
{
    use TimestampableManagerTrait;
    use HasParentRepositoryTrait;
    use Traits\HasSmartProperties\HasSmartPropertiesRepository;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverWaiver();
        $this->initRelationsWaiverSigner();
        $this->initRelationsWaiverDevice();
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::CONSENTS, WaiverConsents::TABLE);
    }

    public function initRelationsWaiverWaiver()
    {
        $this->belongsTo('Waiver', ['class' => get_class(WaiverModels::waivers()), 'fk' => 'waiver_id']);
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
