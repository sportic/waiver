<?php

namespace Sportic\Waiver\Bundle\Controllers\Frontend;

use Nip\Records\Record;
use Sportic\Waiver\Bundle\Forms\Frontend\Waivers\CreateSignedForm;
use Sportic\Waiver\Consents\Actions\Url\ViewConsentUrl;
use Sportic\Waiver\Consents\Models\Types\SignedConsent;
use Sportic\Waiver\Subjects\Actions\CreateSecretToken as CreateSecretTokenSubject;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Actions\CreateSecretToken;
use Sportic\Waiver\Waivers\Actions\FindOrCreateWaiver;
use Sportic\Waiver\Waivers\Actions\Url\RecordConsentUrl;
use Sportic\Waiver\Waivers\Models\Waiver;

trait SptWaiverWaiversControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\CrudModels;

    public function createForSubject(): void
    {
        $subject = $this->checkForeignModelFromRequest(
            $this->getRequest()->get('parent_type'),
            'parent_id'
        );
        if (false == CreateSecretTokenSubject::for($subject)
                ->assertSame($this->getRequest()->get('secret'))) {
            $this->dispatchAccessDeniedResponse();
        }

        $type = $this->getRequest()->get('consentType', SignedConsent::NAME);

        //SAVE WAIVER
        $waiver = FindOrCreateWaiver::forSubject($subject)
            ->orCreate()
            ->fetch();

        $this->redirect(RecordConsentUrl::for($waiver)->generateFor($type));
    }

    public function recordConsent()
    {
        /** @var Waiver $item */
        $item = $this->getModelFromRequest();
        $consents = $item->getWaiverConsents();

        $consentType = $this->getRequest()->get('consentType');
        foreach ($consents as $consent) {
            if ($consent->getType() == $consentType) {
                $this->flashRedirect(
                    $this->getModelManager()->getMessage('signed'),
                    ViewConsentUrl::for($consent)->generate(),
                );
            }
        }

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