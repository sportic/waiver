<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Consents\Models\WaiverConsent;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;
use Sportic\Waiver\Waivers\Models\Waiver;

/** @var Waiver $item */
$subject = $item->getParentRecord();
$subjectParent = $subject instanceof WaiverSubjectInterface ? $subject->getWaiverGroup() : null;

/** @var WaiverConsent[] $consents */
$consents = $item->getWaiverConsents();
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
        <?php if ($subjectParent) : ?>
            <a href="<?= $subject->getURL(); ?>">
                <?= $subject->getName(); ?>
            </a>
        <?php else : ?>
            ---
        <?php endif; ?>
    </td>
    <td>
        <?php foreach ($consents as $consent) : ?>
            <?= $consent->getType()->getLabelHTML(); ?>
        <?php endforeach; ?>
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