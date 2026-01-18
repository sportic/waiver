<?php

use ByTIC\Icons\Icons;
use Nip\Records\Record;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Actions\Url\RecordConsentUrl;
use Sportic\Waiver\Waivers\Models\Waiver;

if (!isset($waivers)) {
    /** @var Record $item */
    if ($item instanceof WaiverSubjectInterface) {
        $waivers = $item->getWaivers();
    } else {
        $waivers = [];
    }
}

$consentTypes = WaiverModels::consents()->getTypes();

/** @var Waiver[] $waivers */
?>

<div class="spt_waivers">
    <?php if (count($waivers) === 0) : ?>
        <div class="alert alert-info">
            <?= WaiverModels::waivers()->getMessage('subject.dnx'); ?>
        </div>
    <?php endif; ?>
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
                    <?php foreach ($consentTypes as $type): ?>
                        <?php if ($type->canBeCreated()): ?>
                            <a href="<?= RecordConsentUrl::for($waiver)->generateFor($type->getName()) ?>"
                               target="_blank"
                               class="btn btn-xs btn-<?= $type->getColorClass(); ?> btn-outline">
                                <?= Icons::plus(); ?>
                                <?= $type->getLabel(); ?>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="row spt_consents">
                <?php foreach ($consents as $consent) : ?>
                    <div class="col">
                        <?= $this->load(
                            '/spt_waiver-consents/modules/item/item-summary',
                            ['item' => $consent, 'subject' => $item]
                        ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php } ?>
</div>