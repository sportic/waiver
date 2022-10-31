<?php

namespace Sportic\Waiver\Templates\Actions\Behaviours;

use Nip\Records\AbstractModels\RecordManager;
use Sportic\Waiver\Utility\WaiverModels;

trait HasRepository
{
    use \Sportic\Waiver\Base\Actions\Behaviours\HasRepository;

    protected function generateRepository(): RecordManager
    {
        return WaiverModels::templates();
    }
}