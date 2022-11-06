<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Models\WaiverConsent;

/** @var \Sportic\Waiver\Waivers\Models\Waiver $item */
$subject = $item->getParentRecord();
?>
<tr>
    <td>
        <a href="<?= $subject->getURL(); ?>">
            <?= $subject->getName(); ?>
        </a>
    </td>
    <td>
        <small>
            <?= $item->updated_at; ?><br/>
            <?= $item->created_at; ?>
        </small>
    </td>
    <td style="width: 70px;">
    </td>
</tr>