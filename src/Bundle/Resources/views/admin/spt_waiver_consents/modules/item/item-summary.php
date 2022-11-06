<?php
/** @var \Sportic\Waiver\Consents\Models\WaiverConsent $item */
$person = $item->getWaiverSigner();
?>
<div class="bg-light my-1">
    <?= $item->getType()->getLabelHTML(); ?>
    <div class="my-1">
        <?= $person->getFullName(); ?><br>
        <?= $person->getEmail(); ?><br>
        <?= $person->getDob(); ?>
    </div>
    <small class="d-block">
        Date: <?= $item->given_at; ?>
    </small>
</div>