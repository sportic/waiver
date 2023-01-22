<?php

use Sportic\Waiver\Bundle\Forms\Frontend\Waivers\CreateSignedForm;
use Sportic\Waiver\Utility\WaiverModels;

/** @var CreateSignedForm $form */
$form = $this->form;
?>

<div class="registration-form my-7">
    <div class="row justify-content-center">
        <div class="col col-md-13 col-lg-10 col-xl-9 col-xxl-8">
            <div class="d-grid gap-3">
                <h1 class="form-name text-center">
                    <?= WaiverModels::consents()->getLabel('title.form'); ?>
                </h1>

                <?= $this->load('/spt_waiver_waivers/modules/item/details-consent'); ?>

                <?= $form->getRenderer()->renderMessages(); ?>

                <?= $this->load('/spt_waiver_contents/modules/item/content'); ?>

                <?= $form->render(); ?>
            </div>
        </div>
    </div>
</div>