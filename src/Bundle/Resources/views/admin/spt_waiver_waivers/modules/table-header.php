<?php
 use Sportic\Waiver\Utility\WaiverModels;
?>
<thead>
<tr>
    <th>
        <?= WaiverModels::waivers()->getLabel('subject.singular'); ?>
    </th>
    <th>
        <?= WaiverModels::signatures()->getLabel('title.singular'); ?>
    </th>
    <th>
        <?= translator()->trans('date'); ?>
    </th>
    <th></th>
</tr>
</thead>