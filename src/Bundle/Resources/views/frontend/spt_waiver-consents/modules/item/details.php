<?php

use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Utility\WaiverModels;

/** @var WaiverConsent $item */
$item = $item ?? $this->item;
$signerRelation = $item->getSignerRelation();
?>
<table class="table">
    <tr>
        <td>
            <?= WaiverModels::consents()->getLabel('signer_relation') ?>
        </td>
        <td>
            <?= $signerRelation ? $signerRelation->getLabel() : '&mdash;' ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= translator()->trans('date') ?>
        </td>
        <td>
            <?= $item->given_at ?>
        </td>
    </tr>
</table>