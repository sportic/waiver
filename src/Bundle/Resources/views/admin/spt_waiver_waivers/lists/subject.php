<?php

use ByTIC\Icons\Icons;
use Sportic\Waiver\Waivers\Models\Waiver;

/** @var Waiver[] $waivers */
$waivers = $waivers ?? $this->waivers;
?>

<table class="table table-bordered table-sm">
    <thead>
    <tr>
        <th><?= translator()->trans('name') ?></th>
        <th><?php echo 'signed' ?></th>
        <th><?php echo 'link' ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($waivers as $waiver) { ?>
        <?php $parentWaiver = $waiver->getParentRecord() ?>
        <tr>
            <td>
                <?= $parentWaiver->getName(); ?>
            </td>
            <td>
                <small>
                    <?php echo $waiver->signature; ?><br/>
                    <?php echo $waiver->dob; ?>
                </small>
            </td>
            <td style="width: 70px;">
                <a href="<?php echo $waiver->getSignatureURL() ?>" target="_blank" class="btn btn-xs btn-info">
                    <i class="fas fa-link"></i>
                </a>
                &nbsp;
                <a href="#" data-href="<?php echo $waiver->compileURL('delete'); ?>"
                   data-message="<?php echo translator()->trans('general.messages.confirm'); ?>"
                   class="btn btn-xs btn-danger jsConfirm">
                    <?= Icons::remove() ?>
                </a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>