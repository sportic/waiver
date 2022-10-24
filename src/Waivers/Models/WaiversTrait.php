<?php

namespace Sportic\Waiver\Waivers\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiversTrait
{
    use HasParentRepositoryTrait;
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverParentRecord();
        $this->initRelationsWaiverTemplate();
    }

    public function generatePrimaryFK()
    {
        return 'waiver_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::WAIVERS, Waivers::TABLE);
    }
}
