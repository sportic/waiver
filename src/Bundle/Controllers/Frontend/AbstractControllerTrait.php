<?php

namespace Sportic\Waiver\Bundle\Controllers\Frontend;

use Nip\Controllers\Response\ResponsePayload;
use Nip\Controllers\Traits\ErrorHandling;
use Nip\View\View;
use Sportic\Waiver\Bundle\Library\View\ViewUtility;

/**
 * @method ResponsePayload payload()
 */
trait AbstractControllerTrait
{
    use \Nip\Controllers\Traits\AbstractControllerTrait;
    use ErrorHandling;

    public function getModelForm($model, $action = null)
    {
        $class = $this->getModelFormClass($model, $action);
        $form = new $class();
        $form->setModel($model);
        return $form;
    }

    public function registerViewPaths(View $view): void
    {
        parent::registerViewPaths($view);

        ViewUtility::registerViewPaths($view, 'frontend');
    }
}