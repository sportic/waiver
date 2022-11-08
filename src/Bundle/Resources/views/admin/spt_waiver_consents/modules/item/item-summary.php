<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Actions\Url\ViewConsentUrl;
use Sportic\Waiver\Consents\Models\WaiverConsent;

/** @var WaiverConsent $item */
$person = $item->getWaiverSigner();
$signature = $item->getWaiverSignature();
?>
<div class="bg-white my-1 p-2">
    <div class="d-flex">
        <div class="flex-grow-1 ">
            <?= $item->getType()->getLabelHTML(); ?>
        </div>

        <div class="actions">
            <a href="<?= ViewConsentUrl::for($item)->generate(); ?>" target="_blank"
               class="btn btn-xs btn-info btn-flat">
                <?= Icons::globe() ?>
            </a>
        </div>
    </div>
    <div class="d-flex">
        <div class="date flex-grow-1">
            <small class="opacity-50" style="font-size: 9px">
                <strong>DATE:</strong>
                <span class="fw-lighter"><?= $item->given_at; ?></span>
            </small>
        </div>
        <div class="actions">
            <a href="#" data-href="<?= $item->compileURL('delete'); ?>"
               data-message="<?= translator()->trans('general.messages.confirm'); ?>"
               class="btn btn-xs btn-danger jsConfirm btn-flat">
                <?= Icons::remove() ?>
            </a>
        </div>
    </div>

    <?php if ($person) : ?>
        <div class="my-1">
            <strong>
                <?= $person->getFullName(); ?>
            </strong><br>
            <small>
                <?= $person->getEmail(); ?><br>
                <?= $person->getDob(); ?>
            </small>
        </div>
    <?php endif; ?>

    <div class="bg-light bg-opacity-50 fst-italic p-1">
        <div class="border-bottom">
            <?php if ($signature) : ?>
                <?= $signature->getSignature(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>