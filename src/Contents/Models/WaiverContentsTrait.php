<?php

namespace Sportic\Waiver\Contents\Models;

use Sportic\Waiver\Base\Models\Behaviours\HasParentRecord\HasParentRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\HasTemplate\HasTemplateRepositoryTrait;
use Sportic\Waiver\Base\Models\Behaviours\Timestampable\TimestampableManagerTrait;
use Sportic\Waiver\Utility\WaiverModels;
use Sportic\Waiver\Utility\PackageConfig;

trait WaiverContentsTrait
{
    use HasTemplateRepositoryTrait;
    use TimestampableManagerTrait;

    protected function initRelationsWaiver(): void
    {
        $this->initRelationsWaiverTemplate();
    }

    protected function generateTable(): string
    {
        return PackageConfig::tableName(WaiverModels::CONTENTS, WaiverContents::TABLE);
    }
}
