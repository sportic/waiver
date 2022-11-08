<?php

use Sportic\Waiver\Signers\Models\WaiverSigner;

/** @var WaiverSigner $item */
$item = $item ?? $this->waiverSigner;
?>
<table class="table">
    <tr>
        <td>
            <?= translator()->trans('name') ?>
        </td>
        <td>
            <?= $item->getFullName() ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= translator()->trans('email') ?>
        </td>
        <td>
            <?= $item->email ?>
        </td>
    </tr>
    <tr>
        <td>
            <?= translator()->trans('dob') ?>
        </td>
        <td>
            <?= $item->dob ?>
        </td>
    </tr>
</table>