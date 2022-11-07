<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Utility\PackageConfig;

/** @var WaiverConsent $item */
$person = $item->getWaiverSigner();
?>
<div class="bg-white my-1 p-2">
    <div class="actions d-inline-block float-end">
        <a href="<?= $item->compileURL('view', [], PackageConfig::moduleFrontend()) ?>" target="_blank" class="btn btn-xs btn-info btn-flat">
            <?= Icons::globe() ?>
        </a>
        &nbsp;
        <a href="#" data-href="<?= $item->compileURL('delete'); ?>"
           data-message="<?= translator()->trans('general.messages.confirm'); ?>"
           class="btn btn-xs btn-danger jsConfirm btn-flat">
            <?= Icons::remove() ?>
        </a>
    </div>
    <?= $item->getType()->getLabelHTML(); ?>
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
    <small class="d-block">
        Date: <?= $item->given_at; ?>
    </small>
</div>