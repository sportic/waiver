<?php

namespace Sportic\Waiver\Base\Models\Behaviours\HasParentRecord;

trait HasParentRepositoryTrait
{


    protected function initRelationsWaiverParentRecord(): void
    {
        $this->morphTo(
            HasParentRecordRepositoryInterface::RELATION_PARENT,
            ['morphPrefix' => 'parent', 'morphTypeField' => 'parent']
        );
    }
}
