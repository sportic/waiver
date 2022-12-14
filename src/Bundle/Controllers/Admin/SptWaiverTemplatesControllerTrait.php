<?php

namespace Sportic\Waiver\Bundle\Controllers\Admin;

use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentLastByTemplate;
use Sportic\Waiver\Contents\Actions\Find\FindWaiverContentLastVersion;
use Sportic\Waiver\Templates\Actions\Find\FindTemplatesByParent;
use Sportic\Waiver\Utility\WaiverModels;

trait SptWaiverTemplatesControllerTrait
{
    use AbstractControllerTrait;

    protected function viewForParent($parent, $parent_id)
    {
        $template = FindTemplatesByParent::for($parent, $parent_id)
            ->orCreate()
            ->fetch();

        $lastContent = FindWaiverContentLastByTemplate::for($template)
            ->orEmpty()
            ->fetch();
        $form = $lastContent->getForm('Admin/BasicForm');

        if ($form->execute()) {
            $this->flashRedirect(
                WaiverModels::contents()->getMessage('update'),
                current_url()
            );
        }

        $this->payload()->with([
            'waiver_template' => $template,
            'waiver_content' => $lastContent,
            'form' => $form,
        ]);
    }

    protected function generateModelName()
    {
        return get_class(WaiverModels::templates());
    }
}
