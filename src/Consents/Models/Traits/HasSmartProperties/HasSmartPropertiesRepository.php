<?php

namespace Sportic\Waiver\Consents\Models\Traits\HasSmartProperties;

use ByTIC\Models\SmartProperties\RecordsTraits\HasTypes\RecordsTrait as HasTypesRecordsTrait;

trait HasSmartPropertiesRepository
{

    use HasTypesRecordsTrait;

    public function registerSmartProperties(): void
    {
        $this->registerSmartPropertyType();
        $this->registerSmartProperty('signerRelation');
    }

    /**
     * @return string
     */
    public function getTypesDirectory()
    {
        return dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'Types';
    }

    /**
     * @return string
     */
    public function getTypeNamespace()
    {
        return '\Sportic\Waiver\Consents\Models\Types\\';
    }


    public function getSignerRelationsItemsDirectory()
    {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . 'SignerRelations';
    }

    /**
     * @return string
     */
    public function getSignerRelationNamespace()
    {
        return '\Sportic\Waiver\Consents\Models\SignerRelations\\';
    }

    public function getSignerRelations()
    {
        return $this->getSmartPropertyItems('SignerRelation');
    }
}
