<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Waiver;

/** @var \Nip\Records\Record $item */
if ($item instanceof WaiverSubjectInterface) {
    $waivers = $item->getWaivers();
} else {
    $waivers = [];
}

/** @var Waiver[] $waivers */
?>

<div class="spt_waivers">
    <?php foreach ($waivers as $waiver) { ?>
        <?php
        $templateWaiver = $waiver->getWaiverTemplate();
        $parentWaiver = $waiver->getParentRecord();
        $consents = $waiver->getWaiverConsents();
        ?>
        <div>
            <div class="d-flex">
                <h6 class="text-black-50 fw-bold text-uppercase flex-grow-1">
                    WAIVER #<?= $waiver->getId(); ?>
                </h6>
                <div class="actions d-inline-block float-end">
                    <a href="<?php echo $waiver->getSignatureURL() ?>" target="_blank" class="btn btn-xs btn-info btn-outline">
                        <i class="fas fa-link"></i>
                    </a>
                    &nbsp;
                    <a href="#" data-href="<?php echo $waiver->compileURL('delete'); ?>"
                       data-message="<?php echo translator()->trans('general.messages.confirm'); ?>"
                       class="btn btn-xs btn-danger btn-outline jsConfirm">
                        <?= Icons::remove() ?>
                    </a>
                </div>
            </div>
            <div class="row spt_consents">
                <?php foreach ($consents as $consent) : ?>
                    <div class="col">
                        <?= $this->load('/spt_waiver_consents/modules/item/item-summary', ['item' => $consent]); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>
</div>