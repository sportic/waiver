<?php

namespace Sportic\Waiver\Bundle\Controllers\Admin;

use Nip\Records\Record;
use Sportic\Waiver\Templates\Actions\Find\FindTemplatesByParent;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Waivers\Models\Filters\TemplateFilter;

trait SptWaiverWaiversControllerTrait
{
    use AbstractControllerTrait;
    use \ByTIC\Controllers\Behaviors\CrudModels;

    public function indexForTemplateParent(Record $parent)
    {
        $templates = $this->getRequest()->get(TemplateFilter::PARAM_NAME);
        if ($templates === null) {
            $templates = FindTemplatesByParent::for($parent)->fetchAll();

            $this->getRequest()->attributes->set(
                TemplateFilter::PARAM_NAME,
                TemplateFilter::encodeValue($templates)
            );
        }
        $this->doModelsListing();
    }

    public function indexForParent($parent, $parent_id)
    {
        $this->getRequest()->attributes->set(
            TemplateFilter::PARAM_NAME,
            TemplateFilter::encodeValue($parent, $parent_id)
        );
        $this->doModelsListing();
    }

    protected function generateModelName()
    {
        return get_class(WaiverModels::waivers());
    }
}