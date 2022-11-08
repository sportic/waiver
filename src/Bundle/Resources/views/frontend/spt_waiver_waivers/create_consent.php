<?php

use Sportic\Waiver\Bundle\Forms\Frontend\Waivers\CreateSignedForm;
use Sportic\Waiver\Utility\WaiverModels;

/** @var CreateSignedForm $form */
$form = $this->form;
?>

<div class="registration-form">
    <div class="row justify-content-center">
        <div class="col col-md-12 col-lg-10 col-xl-9 col-xxl-8">
            <div class="d-grid gap-2">
                <h2 class="form-name">
                    <?= WaiverModels::consents()->getLabel('title.form'); ?>
                </h2>

                <?= $this->load('/spt_waiver_waivers/modules/item/details-consent'); ?>

                <?= $form->getRenderer()->renderMessages(); ?>

                <?= $this->load('/spt_waiver_contents/modules/item/consent'); ?>

                <?= $form->render(); ?>
            </div>
        </div>
    </div>
</div>