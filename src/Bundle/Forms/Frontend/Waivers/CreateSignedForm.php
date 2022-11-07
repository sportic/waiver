<?php

namespace Sportic\Waiver\Bundle\Forms\Frontend\Waivers;

use Nip_Form_Element_CheckboxGroup;
use Nip_Helper_Date;
use Sportic\Waiver\Bundle\Forms\AbstractForm;
use Sportic\Waiver\Consents\Actions\RecordConsent;
use Sportic\Waiver\Consents\Models\Types\SignedConsent;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Signatures\Actions\RecordSignatures;
use Sportic\Waiver\Signers\Actions\Create\FindOrCreateFromData;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Waiver;

/**
 * @method Waiver getModel()
 */
class CreateSignedForm extends AbstractForm
{
    protected $repositorySigners;
    protected $repositoryConsents;

    protected $waiverContent;

    protected ?WaiverConsent $waiverConsent = null;

    /**
     * @param mixed $waiverContent
     */
    public function setWaiverContent($waiverContent): self
    {
        $this->waiverContent = $waiverContent;
        return $this;
    }

    /**
     * @return WaiverConsent|null
     */
    public function getWaiverConsent(): ?WaiverConsent
    {
        return $this->waiverConsent;
    }

    public function initialize()
    {
        parent::initialize();

        $this->repositorySigners = WaiverModels::signers();
        $this->repositoryConsents = WaiverModels::consents();

        $this->setOption('render_messages', false);
        $this->setOption('renderElementErrors', false);

        $this->initializeTos();

        $this->addInput('email', translator()->trans('email'), true);

        $this->addInput('signature', $this->repositoryConsents->getLabel('signed.signature.label'), true);
        $this->signature->setOption('form-help', $this->repositoryConsents->getMessage('signed.signature.help'));

        $this->addDateselect('dob', translator()->trans('dob'), true);

        $this->addCheckbox('electronic_consent', $this->repositoryConsents->getMessage('signed.electronic-consent'),
            false);
        $this->electronic_consent->setOption('render_label', false);

        $this->addButton('save', $this->repositoryConsents->getLabel('signed.btn'));
    }


    public function processValidation()
    {
        parent::processValidation();

        $inputEmail = $this->getElement('email');
        if (!$inputEmail->isError()) {
            $value = $inputEmail->getValue();
            if (!valid_email($value)) {
                $inputEmail->addError($this->repositorySigners->getMessage('form.email.invalid'));
//            } elseif ($this->getModel()->getCompetitor()->email) {
//                if ($this->getModel()->getCompetitor()->email != $value) {
//                    $inputEmail->addError($this->getModelMessage('email.different'));
//                }
            }
        }

        $inputTOS = $this->getElement('tos');
        if (!$inputTOS->isError()) {
            $value = $inputTOS->getValue();
            if ($value != 'yes') {
                $inputTOS->addError($this->repositoryConsents->getMessage('form.tos.no'));
            }
        }

        $inputConsent = $this->getElement('electronic_consent');
        if (!$inputConsent->isError()) {
            $value = $inputConsent->getValue();
            if ($value != 'on') {
                $inputConsent->addError($this->repositoryConsents->getMessage('form.electronic_consent.notchecked'));
            }
        }

        $this->validateDob();
    }

    /**
     * @inheritdoc
     */
    public function process()
    {
        $this->saveToModel();
        $signer = FindOrCreateFromData::for(
            $this->getModel()->getParentRecord()->first_name,
            $this->getModel()->getParentRecord()->last_name,
            $this->getElement('email')->getValue('model'),
            $this->getElement('dob')->getValue('model'),
        )->save();

        $signature = RecordSignatures
            ::typed($this->getElement('signature')->getValue('model'))
            ->create();

        $this->waiverConsent = RecordConsent::forWaiver($this->getModel())
            ->withRequest(request())
            ->withSigner($signer)
            ->withSignature($signature)
            ->record($this->waiverContent, SignedConsent::NAME);
    }


    protected function initializeTos()
    {
        $this->addRadioGroup('tos', '&nbsp;', false);

        /** @var Nip_Form_Element_CheckboxGroup $tosElement */
        $tosElement = $this->getElement('tos');
        $tosElement->addOption('no', $this->repositoryConsents->getLabel('signed.no'));
        $tosElement->addOption('yes', $this->repositoryConsents->getLabel('signed.yes'));
        $tosElement->getRenderer()->setSeparator('');
    }

    protected function validateDob()
    {
        $inputDOB = $this->getElement('dob');
        if (!$inputDOB->isError()) {
            $value = $inputDOB->getValue('model');
            if (strtotime($value) < time()) {
                [$years, $months, $days] = $this->_calculateAge($value);
                if ($years < 3) {
                    $inputDOB->addError($this->repositorySigners->getMessage('form.dob.zero'));
                }
            } else {
                $inputDOB->addError($this->repositorySigners->getMessage('form.dob.zero'));
            }
        }
    }

    protected function _calculateAge($unix)
    {
        return Nip_Helper_Date::instance()->calculateAge($unix);
    }

}