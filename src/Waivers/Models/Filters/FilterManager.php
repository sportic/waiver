<?php

namespace Sportic\Waiver\Waivers\Models\Filters;

use Nip\Records\Filters\FilterManager as CommonFilterManager;

/**
 * Class FilterManager
 * @package Sportic\Waiver\Waivers\Models\Filters
 */
class FilterManager extends CommonFilterManager
{

    public function init()
    {
        parent::init();

        $this->addFilter((new ParentFilter()));
        $this->addFilter((new TemplateFilter()));
    }

}
