<?php

/** @var \Sportic\Waiver\Contents\Models\WaiverContent $item */
$item = $item ?? $this->item;
?>
<div class="waiver-content font-monospace">
    <?= $this->waiverContent->getBody(); ?>
</div>