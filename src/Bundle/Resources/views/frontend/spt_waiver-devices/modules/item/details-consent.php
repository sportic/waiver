<?php


use Sportic\Waiver\Devices\Models\WaiverDevice;

/** @var WaiverDevice $item */
$item = $item && $item instanceof WaiverDevice ? $item : $this->waiverDevice;
?>
<table class="table">
    <tr>
        <td>
            IP:
        </td>
        <td>
            <?= $item->ip ?>
        </td>
    </tr>
    <tr>
        <td>
            User Agent:
        </td>
        <td>
            <?= $item->user_agent ?>
        </td>
    </tr>
</table>