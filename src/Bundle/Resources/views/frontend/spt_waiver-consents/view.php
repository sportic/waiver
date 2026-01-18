<?php

use Sportic\Waiver\Utility\WaiverModels;

?>
<div class="registration-form py-6">
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-10 col-xl-9 col-xxl-8">
            <h1 class="form-name">
                <?= WaiverModels::consents()->getLabel('title.form'); ?>
            </h1>

            <?= $this->Messages()->info(WaiverModels::consents()->getMessage('signed')); ?>

            <div class="mb-6">
                <?= $this->load('/spt_waiver-waivers/modules/item/details-consent'); ?>
            </div>

            <?= $this->load('/spt_waiver-contents/modules/item/content'); ?>

            <div class="py-3">
                <i class="far fa-check-square" style="float:left; font-size: 16px;margin-right: 15px"></i>
                <?= WaiverModels::consents()->getMessage('signed.electronic-consent'); ?>
            </div>

            <div class="row">
                <div class="col col-md-6">
                    <?= $this->load('/spt_waiver-signatures/modules/item/view-consent'); ?>
                    <?= $this->load('/spt_waiver-signers/modules/item/details-consent'); ?>
                </div>

                <div class="col col-md-6">
                    <?= $this->load('/spt_waiver-consents/modules/item/details'); ?>
                    <?= $this->load('/spt_waiver-devices/modules/item/details-consent'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
