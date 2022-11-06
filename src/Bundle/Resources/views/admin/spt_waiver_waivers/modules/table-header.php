<?php
 use Sportic\Waiver\Utility\WaiverModels;
?>
<thead>
<tr>
    <th>
        <?= WaiverModels::waivers()->getLabel('subject.singular'); ?>
    </th>
    <th>
        <?= WaiverModels::consents()->getLabel('title'); ?>
    </th>
    <th>
        <?= translator()->trans('date'); ?>
    </th>
    <th></th>
</tr>
</thead>