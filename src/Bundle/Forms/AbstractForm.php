<?php

namespace Sportic\Waiver\Bundle\Forms;

abstract class AbstractForm extends \Nip\Form\FormModel
{

    public function initialize()
    {
        parent::initialize();

        $this->setMethod('post');
        $this->addHidden('_trigger', '_trigger');
        $this->getElement('_trigger')->setValue('submit');

        $this->setRendererType('bootstrap5');
        $this->addClass('form-horizontal');
        $this->addClass('row-mb-3');
    }

    /**
     * @inheritDoc
     */
    public function submited(): bool
    {
        if (parent::submited() === false) {
            return false;
        }
        return isset($_REQUEST['_trigger']) && $_REQUEST['_trigger'] == $this->getElement('_trigger')->getValue();
    }
}