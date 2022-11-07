<?php

use Sportic\Waiver\SubjectGroups\WaiverSubjectGroupInterface;
use Sportic\Waiver\Subjects\WaiverSubjectInterface;

/** @var \Nip\Records\Record $item */
if ($item instanceof WaiverSubjectInterface) {
    $subjects = [$item];
} elseif ($item instanceof WaiverSubjectGroupInterface) {
    $subjects = $item->getWaiverChilds();
} else {
    $waivers = [];
}
?>

<div class="">
    <?php foreach ($subjects as $subject) { ?>
        <div class="bg-light bg-opacity-50 border-bottom my-2">
            <div class="border-bottom p-2 fw-bold text-uppercase">
                <a href="<?= $subject->compileURL('view'); ?>">
                    <?= $subject->getName() ?>
                </a>
            </div>

            <div class="m-2">
                <?= $this->load('/spt_waiver_waivers/modules/lists/subject', ['item' => $subject]); ?>
            </div>
        </div>
    <?php } ?>
</div>