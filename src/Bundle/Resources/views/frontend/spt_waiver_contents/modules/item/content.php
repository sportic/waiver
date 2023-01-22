<?php

/** @var \Sportic\Waiver\Contents\Models\WaiverContent $item */
$item = $item ?? $this->item;
?>
<div class="waiver-content font-monospace bg-light p-5">
    <?= $this->waiverContent->getBody(); ?>
</div>