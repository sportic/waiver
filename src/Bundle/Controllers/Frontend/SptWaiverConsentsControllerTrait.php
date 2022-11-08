<?php

namespace Sportic\Waiver\Bundle\Controllers\Frontend;

use ByTIC\Controllers\Behaviors\ReadModels;
use Sportic\Waiver\Consents\Actions\CreateSecretToken;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Waivers\Models\Waiver;

trait SptWaiverConsentsControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\ReadModels {
        ReadModels::view as viewTrait;
    }

    public function view()
    {
        $this->viewTrait();

        /** @var WaiverConsent $item */
        $item = $this->getModelFromRequest();
        $waiver = $item->getWaiver();
        $waiverTemplate = $waiver->getWaiverTemplate();

        $this->payload()->with(
            [
                'waiverParent' => $waiver->getParentRecord(),
                'waiverContent' => $item->getWaiverContent(),
                'waiverDevice' => $item->getWaiverDevice(),
                'waiverSignature' => $item->getWaiverSignature(),
                'waiverSigner' => $item->getWaiverSigner(),
                'waiverTemplate' => $waiverTemplate,
                'waiverTemplateParent' => $waiverTemplate->getParentRecord(),
            ]
        );
    }

    /**
     * @param Waiver $item
     */
    protected function checkItemAccess($item)
    {
        if (false == CreateSecretToken::for($item)->assertSame($this->getRequest()->get('secret'))) {
            return false;
        }
        return parent::checkItemAccess($item);
    }
}