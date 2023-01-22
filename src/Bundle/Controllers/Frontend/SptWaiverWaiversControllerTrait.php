<?php

namespace Sportic\Waiver\Bundle\Controllers\Frontend;

use Sportic\Waiver\Bundle\Forms\Frontend\Waivers\CreateSignedForm;
use Sportic\Waiver\Consents\Actions\Url\ViewConsentUrl;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;
use Sportic\Waiver\Waivers\Models\Waiver;

trait SptWaiverWaiversControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\CrudModels;

    public function createConsent()
    {
        /** @var Waiver $item */
        $item = $this->getModelFromRequest();
        $consentType = $this->getRequest()->get('consentType');

        $consentTypeObject = WaiverModels::consents()->getType($consentType);
        $waiverTemplate = $item->getWaiverTemplate();
        $waiverContent = $waiverTemplate->getContentLast();

        /** @var CreateSignedForm $form */
        $form = $item->getForm('Waiver::Frontend\Create' . ucfirst($consentType) . 'Form');
        $form->setWaiverContent($waiverContent);

        if ($form->execute()) {
            $this->flashRedirect(
                $this->getModelManager()->getMessage('signed'),
                ViewConsentUrl::for($form->getWaiverConsent())->generate(),
            );
        }

        $this->payload()->with(
            [
                'item' => $item,
                'waiver' => $item,
                'waiverParent' => $item->getParentRecord(),
                'waiverContent' => $waiverContent,
                'waiverTemplate' => $waiverTemplate,
                'waiverTemplateParent' => $waiverTemplate->getParentRecord(),
                'form' => $form
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