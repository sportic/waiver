<?php

namespace Sportic\Waiver\Bundle\Forms\Admin\Contents;

class BasicForm extends \Nip\Form\FormModel
{
    public function initialize()
    {
        parent::initialize();

        $this->addTexteditor('content', translator()->trans('content'), false);
        $this->addButton('save', translator()->trans('submit'));
    }
}
