<?php

use KM42\Register\Models\Competitors\Competitors;

?>
<thead>
<tr>
    <th><?php echo Races::instance()->getLabel('title.singular'); ?></th>
    <th><?php echo Race_Categories::instance()->getLabel('title.singular'); ?></th>
    <th><?php echo Race_Entries::instance()->getLabel('title.singular'); ?></th>
    <th><?php echo Competitors::instance()->getLabel('title.singular'); ?></th>
    <th><?php echo 'signed' ?></th>
    <th><?php echo 'link' ?></th>
</tr>
</thead>