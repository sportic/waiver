<?php

namespace Sportic\Waiver\Bundle\Forms\Admin\Contents;

use Sportic\Waiver\Bundle\Forms\AbstractForm;
use Sportic\Waiver\Contents\Actions\Create\UpdateOrCreateForTemplate;

class BasicForm extends AbstractForm
{
    public function initialize()
    {
        parent::initialize();

        $this->addTexteditor('body', translator()->trans('content'), false);
        $this->addButton('save', translator()->trans('submit'));
    }

    public function saveModel()
    {
        UpdateOrCreateForTemplate::for(
            $this->getModel()->getWaiverTemplate(),
            $this->getElement('body')->getValue('model')
        )->save();
    }
}
