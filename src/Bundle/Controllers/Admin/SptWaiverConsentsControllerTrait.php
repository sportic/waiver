<?php

namespace Sportic\Waiver\Bundle\Controllers\Admin;

use Nip\Records\Record;
use Sportic\Waiver\Consents\Models\WaiverConsent;

trait SptWaiverConsentsControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\CrudModels;

    /**
     * @param WaiverConsent $item
     */
    protected function checkItemAccess($item)
    {
        parent:: checkItemAccess($item);
        $this->setAfterUrl('after-delete', $item->getWaiver()->getParentRecord()->getURL());

        $waiver = $item->getWaiver();
        $this->checkAndSetForeignModelInRequest($waiver);
    }

    /**
     * @param Record $record
     * @return void
     */
    protected function checkWaiverParentRecordAccess($record)
    {
        $this->checkAndSetForeignModelInRequest($record);
    }
}