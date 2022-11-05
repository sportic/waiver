<?php

namespace Sportic\Waiver\Signatures\Models;

use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordsTrait as HasTypesRecordsTrait;

trait WaiverSignaturesTrait
{
    use TimestampableManagerTrait;
    use HasTypesRecordsTrait;

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::SIGNATURES, WaiverSignatures::TABLE);
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
        return '\Sportic\Waiver\Signatures\Models\Types\\';
    }
}
