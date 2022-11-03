<?php

namespace Sportic\Waiver\Consents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordsTrait as HasTypesRecordsTrait;

trait WaiverConsentsTrait
{
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;
    use HasParentRepositoryTrait;
    use HasTypesRecordsTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverTemplate();
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::CONSENTS, WaiverConsents::TABLE);
    }

    /**
     * @return string
     */
    public function getTypesDirectory()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Types';
    }

    /**
     * @return string
     */
    public function getTypeNamespace()
    {
        return '\Sportic\Waiver\Consents\Models\Types\\';
    }
}
