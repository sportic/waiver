<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasTemplate;

trait HasTemplateRepositoryTrait
{
    protected function initRelationsWaiverTemplate(): void
    {
        $this->belongsTo(
            HasTemplateRepositoryInterface::RELATION_WAIVER_TEMPLATE,
            ['fk' => 'template_id']
        );
    }
}
