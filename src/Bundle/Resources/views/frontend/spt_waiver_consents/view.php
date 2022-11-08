<?php

use Sportic\Waiver\Utility\WaiverModels;

?>
<div class="registration-form">

    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-10 col-xl-9 col-xxl-8">
            <h1 class="form-name">
                <?= WaiverModels::consents()->getLabel('title.form'); ?>
            </h1>

            <?= $this->Messages()->info(WaiverModels::consents()->getMessage('signed')); ?>

            <div class="mb-6">
                <?= $this->load('/spt_waiver_waivers/modules/item/details-consent'); ?>
            </div>

            <?= $this->load('/spt_waiver_contents/modules/item/content'); ?>

            <div>
                <i class="far fa-check-square" style="float:left; font-size: 16px;margin-right: 15px"></i>
                <?= WaiverModels::consents()->getMessage('signed.electronic-consent'); ?>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <?= $this->load('/spt_waiver_signatures/modules/item/view-consent'); ?>
                    <?= $this->load('/spt_waiver_signers/modules/item/details-consent'); ?>
                </div>

                <div class="col col-md-6">
                    <?= $this->load('/spt_waiver_consents/modules/item/details'); ?>
                    <?= $this->load('/spt_waiver_devices/modules/item/details-consent'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
