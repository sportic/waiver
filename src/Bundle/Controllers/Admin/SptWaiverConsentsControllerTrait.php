<?php

namespace Sportic\Waiver\Bundle\Controllers\Admin;

use Nip\Records\Record;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Waivers\Models\Waiver;

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