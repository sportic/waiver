<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;
use Sportic\Waiver\Waivers\Models\Waiver;

/** @var Waiver $item */
$subject = $item->getParentRecord();
$subjectParent = $subject instanceof WaiverSubjectInterface::class ? $subject->getWaiverGroup() : null;
?>
<tr>
    <td>
        <?php if ($subjectParent) : ?>
            <strong>

                <a href="<?= $subjectParent->getURL(); ?>">
                    <?= $subjectParent->getName(); ?>
                </a>
            </strong>
            :
            <br/>
        <?php endif; ?>
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