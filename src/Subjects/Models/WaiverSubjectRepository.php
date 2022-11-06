<?php

namespace Sportic\Waiver\Subjects\Models;

use Sportic\Waiver\Utility\WaiverModels;

trait WaiverSubjectRepository
{
    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverWaivers();
    }

    protected function initRelationsWaiverWaivers()
    {
        $this->morphMany(
            'Waivers',
            ['morphPrefix' => 'parent', 'morphTypeField' => 'parent', 'class' => get_class(WaiverModels::waivers())]
        );
    }
}