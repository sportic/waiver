<?php

namespace Sportic\Waiver\Signers\Actions\Validation;

use Sportic\Waiver\Signers\Dto\Validation\ValidationFromSubjectResult;
use Sportic\Waiver\Signers\Models\WaiverSigner;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;

class ValidateFromSubject
{
    protected WaiverSubjectInterface $subject;

    protected WaiverSigner $signer;

    protected ValidationFromSubjectResult $validationResult;

    public static function for($signer, $subject)
    {
        $action = new self();
        $action->signer = $signer;
        $action->subject = $subject;
        $action->validationResult = new ValidationFromSubjectResult();
        $action->doValidation();
        return $action->validationResult;
    }


    protected function doValidation()
    {
        $this->validateFirstName();
        $this->validateLastName();
        $this->validateEmail();
        $this->validateDob();
    }

    protected function validateFirstName(): void
    {
        if ($this->signer->getFirstName() !== $this->subject->getFirstName()) {
            $this->validationResult->addError('first_name');
        }
    }

    protected function validateLastName(): void
    {
        if ($this->signer->getLastName() !== $this->subject->getLastName()) {
            $this->validationResult->addError('last_name');
        }
    }

    protected function validateEmail(): void
    {
        if ($this->signer->getEmail() !== $this->subject->getEmail()) {
            $this->validationResult->addError('email');
        }
    }

    protected function validateDob(): void
    {
        if ($this->signer->getDob() !== $this->subject->getDob()) {
            $this->validationResult->addError('dob');
        }
    }
}
