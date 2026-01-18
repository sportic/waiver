<?php

/** @var \Sportic\Waiver\Consents\Models\WaiverConsent $item */
$item = $item ?? $this->item;
?>
<table class="table">
    <tr>
        <td>
            <?= translator()->trans('date') ?>
        </td>
        <td>
            <?= $item->given_at ?>
        </td>
    </tr>
</table>