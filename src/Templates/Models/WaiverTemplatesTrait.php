<?php

namespace Sportic\Waiver\Templates\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverTemplatesTrait
{
    use HasParentRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverParentRecord();
    }

    public function generatePrimaryFK()
    {
        return 'template_id';
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::TEMPLATES, WaiverTemplates::TABLE);
    }
}
