<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Actions\Url\ViewConsentUrl;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Signers\Actions\Validation\ValidateFromSubject;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;

/** @var WaiverSubjectInterface $subject */
/** @var WaiverConsent $item */
$person = $item->getWaiverSigner();
$signature = $item->getWaiverSignature();

$validConsent = true;
if ($person) {
    $validationResult = ValidateFromSubject::for($person, $subject);
    $validConsent = $validationResult->isValid();
}
$classesError = 'px-1 border-bottom  border-2 border-danger';
?>
<div class="<?= $validConsent ? 'bg-white' : 'bg-warning' ?> my-1 p-2">
    <div class="d-flex">
        <div class="flex-grow-1 ">
            <?= $item->getType()->getLabelHTML(); ?>
            <small class="opacity-50" style="font-size: 9px">
                <strong>DATE:</strong>
                <span class="fw-lighter"><?= $item->given_at; ?></span>
            </small>
            <?php if ($person) : ?>
                <div class="my-2">
                    <strong class="d-block">
                        <span class="<?= $validationResult->hasError('first_name') ? $classesError : null; ?>">
                            <?= $person->getFirstName(); ?>
                        </span>
                        <span class="<?= $validationResult->hasError('last_name') ? $classesError : null; ?>">
                            <?= $person->getLastName(); ?>
                        </span>
                    </strong>
                    <small>
                        <span class="<?= $validationResult->hasError('email') ? $classesError : null; ?>">
                            <?= $person->getEmail(); ?>
                        </span>
                        &nbsp; | &nbsp;
                        <span class="<?= $validationResult->hasError('dob') ? $classesError : null; ?>">
                            <?= $person->getDob(); ?>
                        </span>
                    </small>
                </div>
            <?php endif; ?>
        </div>

        <div class="actions">
            <div class="d-grid gap-2">
                <a href="<?= ViewConsentUrl::for($item)->generate(); ?>" target="_blank"
                   class="btn btn-xs btn-info btn-flat">
                    <?= Icons::globe() ?>
                </a>
                <a href="#" data-href="<?= $item->compileURL('delete'); ?>"
                   data-message="<?= translator()->trans('general.messages.confirm'); ?>"
                   class="btn btn-xs btn-danger jsConfirm btn-flat">
                    <?= Icons::remove() ?>
                </a>
            </div>
        </div>
    </div>

    <div class="bg-light bg-opacity-50 fst-italic p-1">
        <div class="border-bottom">
            <?php if ($signature) : ?>
                <?= $signature->getSignature(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>