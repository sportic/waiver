<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasTemplate;

use Sportic\Waiver\Utility\WaiverModels;

trait HasTemplateRepositoryTrait
{
    protected function initRelationsWaiverTemplate(): void
    {
        $this->belongsTo(
            HasTemplateRepositoryInterface::RELATION_WAIVER_TEMPLATE,
            ['fk' => 'template_id', 'with' => WaiverModels::templates()]
        );
    }
}
